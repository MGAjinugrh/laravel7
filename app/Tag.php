<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    public function posts() //belakangnya pake s soalnya relasinya many to many
    {
        return $this->BelongsToMany(Post::class);
    }
}
