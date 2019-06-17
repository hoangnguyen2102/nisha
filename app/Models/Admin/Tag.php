<?php

namespace App\Models\Admin;

use App\Observers\TagObserver;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'deteled',
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
        Tag::observe(new TagObserver);
    }
    /* END FUNCTION */

    /* RELATIONS */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'tag_article', 'tag_id', 'article_id');
    }
    /* END RELATIONS */

    /* STATIC FUNCTION */
    public static function allForIndex()
    {
        $self = new self();
        return $self::orderBy('created_at', 'DESC')->get();
    }

    public static function createRecord($data)
    {
        $self = new self();

        $result = $self::create($data);

        if ($result) {
            return $result->id;
        }

        return false;
    }

    public static function updateRecord($data, $id)
    {
        $self = new self();

        $current = $self::find($id);

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
            $record->delete();
            return true;
        }

        return false;
    }

    public static function checkExists($name)
    {
        $self = new self();
        $result = $self::where('name', $name)->first();

        if ($result) {
            return $result->id;
        }

        return false;
    }
    /* END STATIC FUNCTION */
}
