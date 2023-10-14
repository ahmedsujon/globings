<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $table = 'comment_replies';

    public function getShortTimeAgo($carbonObject) {
        return str_ireplace(
            [' seconds ago', ' second ago', ' minutes ago', ' minute ago', ' hours ago', ' hour ago', ' days ago', ' day ago', ' weeks ago', ' week ago'],
            ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'],
            $carbonObject->diffForHumans()
        );
    }
}
