<?php

namespace App\Models\Admin;

use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Model;
use UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Article extends Model
{
    use Sluggable, SluggableScopeHelpers;

    //
    protected $table = 'articles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'image',
        'description',
        'contents',
        'slug',
        'deleted'
    ];

    /* FUNCTION */
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        Article::observe(new ArticleObserver);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /* END FUNCTION */

    /* RELATIONS */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_article', 'article_id', 'tag_id');
    }
    /* END RELATIONS */

    /* STATIC FUNCTION */
    public static function allForIndex()
    {
        $self = new self();
        return $self::where('deleted', 0)->orderBy('created_at', 'DESC')->get();
    }

    public function checkAndCreateTagFromArticle($string)
    {
        $result = [];

        $tags = explode(',', $string);
        foreach ($tags as $key => $tag) {
            $state = Tag::checkExists($tag);
            if (!$state) {
                $result[] = Tag::createRecord([
                    'name'       => $tag,
                ]);
            } else {
                $result[] = $state;
            }
        }

        return $result;
    }

    public static function createRecord($data)
    {
        $self = new self();

        // Check exists and create tag
        $tags = [];
        if (isset($data['tag'])) {
            $tags = $self->checkAndCreateTagFromArticle($data['tag']);
        }
        unset($data['tag']);

        // Insert
        $result = $self::create($data);

        // Sync tags
        $sync = $self::find($result->id)->tags()->sync($tags);

        // Store image
        $path = '';
        if ($result) {
            $path = $self::uploadImage($data['image'], $result->id);
        }

        // Update path image
        $result = $self::updateImagePath($path, $result->id);

        if ($result) {
            return $result;
        }

        return false;
    }

    public static function updateImagePath($path, $id)
    {
        // Find record
        $self = new self();
        $current = $self::find($id);

        $result = $current->update([
            'image' => $path
        ]);

        if ($result) {
            return true;
        }

        return false;
    }

    public static function updateRecord($data, $id)
    {
       // Find record
        $self = new self();
        $current = $self::find($id);

        // Check exists and create tag
        $tags = [];
        if (isset($data['tag'])) {
            $tags = $self->checkAndCreateTagFromArticle($data['tag']);
        }
        unset($data['tag']);

        // Sync tags
        $sync = $current->tags()->sync($tags);

        // Check image & update

        if (isset($data['image'])) {
            $data['image'] = $self::uploadImage($data['image'], $id);
        }

        $result = $current->update($data);

        if ($result) {
            return true;
        }

        return false;
    }

    public static function deleteRecord($id)
    {
        $self = new self();
        $record = $self::find($id);

        if ($record) {
            // Remove Image
            $remove = UploadImage::remove($record->image);

            if ($remove) {
                $record->delete();
                return true;
            }

            return false;
        }

        return false;
    }

    public static function uploadImage($image, $id)
    {
        // Get extension
        $extension = $image->getClientOriginalExtension();

        // Generate name
        $name = 'article_'.$id.'.'.$extension;

        // Path
        $path = 'articles';

        $result = UploadImage::upload($image, $name, $path);

        // Return result
        return $result;
    }

    public static function getArticleForHome()
    {
        $self = new self();

        $result = $self::where('deleted', 0)->inRandomOrder()->take(30)->get();

        return $result;
    }

    public static function getNewArticle()
    {
        $self = new self();

        $result = $self::where('deleted', 0)->orderBy('id', 'DESC')->take(3)->get();

        return $result;
    }

    public static function getAll()
    {
        $self = new self();

        $result = $self::where('deleted', 0)->orderBy('id', 'DESC')->paginate(5);

        return $result;
    }

    public static function getOtherNews()
    {
        $self = new self();

        $result = $self::where('deleted', 0)->inRandomOrder()->take(6)->get();
        return $result;
    }
    /* END STATIC FUNCTION */
}
