<?php

use Carbon\Carbon;
use App\Models\Shop;
use App\Models\User;
use App\Models\Admin;
use App\Models\PostLike;
use App\Models\CommentLike;
use App\Models\CommentReply;
use App\Models\ShopBookmark;
use App\Models\AdminPermission;
use App\Models\CommentReplyLike;
use App\Models\ShopReview;
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

function getUserByID($id)
{
    return User::find($id);
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

function getShopProfileHome($id)
{
    return Shop::select('profile_image')->where('user_id', $id)->first();
}

function isLiked($post_id)
{
    if(user()){
        return PostLike::select('id')->where('user_id', user()->id)->where('post_id', $post_id)->first();
    } else {
        return false;
    }
}

function shopIsBookmarked($shop_id)
{
    if (user()) {
        return ShopBookmark::where('shop_id', $shop_id)->where('user_id', user()->id)->first();
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

function isCommentLiked($comment_id)
{
    if(user()){
        return CommentLike::select('id')->where('user_id', user()->id)->where('comment_id', $comment_id)->first();
    } else {
        return false;
    }
}
function isCommentReplyLiked($comment_reply_id)
{
    if(user()){
        return CommentReplyLike::select('id')->where('user_id', user()->id)->where('comment_reply_id', $comment_reply_id)->first();
    } else {
        return false;
    }
}

function userHasActiveSubscription()
{
    $subscription = User::join('user_subscriptions', 'users.id', 'user_subscriptions.user_id')->where('end_date', '>', Carbon::parse(now()))->where('users.id', user()->id)->first();

    if($subscription){
        return true;
    } else {
        return false;
    }
}

function shop_total_review($id)
{
    $reviews = ShopReview::where('shop_id', $id)->count();
    return $reviews;
}

function star_review($star)
{
    $avg_star = $star;

    $rem_star = (5 - $avg_star);

    $active_star = '<li><img src="'.asset('assets/app/icons/star_fill.svg').'" alt="star icon" /></li>';
    $inactive_star = '<li><img src="'.asset('assets/app/icons/star_blank.svg').'" alt="star icon" /></li>';

    $html = str_repeat($active_star, $avg_star);
    $html .= str_repeat($inactive_star, $rem_star);

    return $html;
}

function shop_star_review($shop_id)
{
    $reviews = ShopReview::where('shop_id', $shop_id)->get();

    $total_star = $reviews->sum('rating');
    $total_review = $reviews->count() > 0 ? $reviews->count() : 1;
    $avg_star = round(($total_star / $total_review), 1);

    $rem_star = (5 - $avg_star);

    $active_star = '<li><img src="'.asset('assets/app/icons/star_fill.svg').'" alt="star icon" /></li>';
    $inactive_star = '<li><img src="'.asset('assets/app/icons/star_blank.svg').'" alt="star icon" /></li>';

    $html = str_repeat($active_star, $avg_star);
    $html .= str_repeat($inactive_star, $rem_star);

    return $html;
}

function avgShopReview($shop_id)
{
    $reviews = ShopReview::where('shop_id', $shop_id)->get();

    $total_star = $reviews->sum('rating');
    $total_review = $reviews->count() > 0 ? $reviews->count() : 1;

    $avg_star = round(($total_star / $total_review), 1);

    return $avg_star;
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

function tagify_array( $value ) {

    // Because the $value is an array of json objects
    // we need this helper function.

    // First check if is not empty
    if( empty( $value ) ) {

        return $output = array();

    } else {

        // Remove squarebrackets
        $value = str_replace( array('[',']') , '' , $value );

        // Fix escaped double quotes
        $value = str_replace( '\"', "\"" , $value );

        // Create an array of json objects
        $value = explode(',', $value);

        // Let's transform into an array of inputed values
        // Create an array
        $value_array = array();

        // Check if is array and not empty
        if ( is_array($value) && 0 !== count($value) ) {

            foreach ($value as $value_inner) {
                $value_array[] = json_decode( $value_inner );
            }

            // Convert object to array
            // Note: function (array) not working.
            // This is the trick: create a json of the values
            // and then transform back to an array
            $value_array = json_decode(json_encode($value_array), true);

            // Create an array only with the values of the child array
            $output = array();

            foreach($value_array as $value_array_inner) {
                foreach ($value_array_inner as $key=>$val) {
                    $output[] = $val;
                }
            }

        }

        return $output;

    }

}
