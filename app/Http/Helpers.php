<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\CommentReply;
use App\Models\PostLike;
use Illuminate\Support\Facades\Auth;

function admin()
{
    return Auth::guard('admin')->user();
}

function getAdminByID($id)
{
    return Admin::find($id);
}

function vendor()
{
    return Auth::guard('vendor')->user();
}

function user()
{
    return Auth::guard('web')->user();
}

function getCommentUser($id)
{
    return User::select('first_name', 'last_name', 'avatar')->find($id);
}

//Home
function getUserProfileHome($id)
{
    return User::select('avatar')->find($id);
}

function isLiked($post_id)
{
    if(user()){
        return PostLike::select('id')->where('user_id', user()->id)->where('post_id', $post_id)->first();
    } else {
        return false;
    }
}

function total_post_like($post_id)
{
    return PostLike::where('post_id', $post_id)->count();
}

function post_comment_replies_count($comment_id)
{
    return CommentReply::where('comment_id', $comment_id)->count();
}

function post_comment_replies($comment_id)
{
    return CommentReply::where('comment_id', $comment_id)->get();
}



//setting
// function setting()
// {
//     return Setting::find(1);
// }

function adminPermissions()
{
    $permissions = [];
    foreach (admin()->permissions as $permission) {
        $perm = AdminPermission::where('id', $permission)->first()->value;
        $permissions[] = $perm;
    }
    return $permissions;
}

function isAdminPermitted($permission)
{
    $permission = AdminPermission::where('value', $permission)->first();

    if (in_array($permission->id, admin()->permissions)) {
        return true;
    } else {
        return false;
    }
}

function loadingStateSm($key, $title)
{
    $loadingSpinner = '
        <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> loading</div>
        <div wire:loading.remove wire:target="' . $key . '" wire:key="' . $key . '">' . $title . '</div>
    ';

    return $loadingSpinner;
}

function loadingStateXs($key, $title)
{
    $loadingSpinner = '
        <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><span class="spinner-border spinner-border-xs align-middle" role="status" aria-hidden="true"></span></div>
        <div wire:loading.remove>' . $title . '</div>
    ';
    return $loadingSpinner;
}

function loadingStateStatus($key, $title)
{
    $loadingSpinner = '
        <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><span class="spinner-border spinner-border-xs" role="status" aria-hidden="true"></span></div> ' . $title . '
    ';
    return $loadingSpinner;
}

function loadingStateWithText($key, $title)
{
    $loadingSpinner = '
        <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span> </div> ' . $title . '
    ';

    return $loadingSpinner;
}


function loadingStateWithTextApp($key, $title)
{
    $loadingSpinner = '
        ' . $title . ' <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><i class="fa fa-spinner fa-spin" style="margin-left: 5px; position: absolute; margin-top: -4.5px; font-size: 10px;" aria-hidden="true"></i></div>
    ';

    return $loadingSpinner;
}

function showErrorMessage($message, $file, $line){
    if(env('APP_DEBUG') == 'true'){
        $error_array = [
            'Message' => $message,
            'File' => $file,
            'Line No' => $line
        ];
        return dd($error_array);
    }
}
