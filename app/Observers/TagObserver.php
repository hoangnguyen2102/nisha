<?php

namespace App\Observers;

use App\Models\Admin\Tag;

class TagObserver
{
    //
    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\Admin\Tag  $tag
     * @return void
     */
    public function deleted(Tag $tag)
    {
        $tag->articles()->detach();
    }
}
