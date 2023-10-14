<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'post_comments';

    public function getShortTimeAgo($carbonObject) {
        return str_ireplace(
            [' seconds ago', ' second ago', ' minutes ago', ' minute ago', ' hours ago', ' hour ago', ' days ago', ' day ago', ' weeks ago', ' week ago'],
            ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'],
            $carbonObject->diffForHumans()
        );
    }
}
