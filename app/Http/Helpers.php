<?php

use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Category;
use App\Models\CommentLike;
use App\Models\CommentReply;
use App\Models\CommentReplyLike;
use App\Models\FcmToken;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\Shop;
use App\Models\ShopBookmark;
use App\Models\ShopReview;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function admin()
{
    return Auth::guard('admin')->user();
}

function getAdminByID($id)
{
    return Admin::find($id);
}

function getCategoryID($id)
{
    return Category::find($id);
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
    return Shop::select('profile_image', 'name')->where('user_id', $id)->first();
}

function isLiked($post_id)
{
    if (user()) {
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
    if (user()) {
        return CommentLike::select('id')->where('user_id', user()->id)->where('comment_id', $comment_id)->first();
    } else {
        return false;
    }
}
function isCommentReplyLiked($comment_reply_id)
{
    if (user()) {
        return CommentReplyLike::select('id')->where('user_id', user()->id)->where('comment_reply_id', $comment_reply_id)->first();
    } else {
        return false;
    }
}

function userHasActiveSubscription()
{
    $subscription = User::join('user_subscriptions', 'users.id', 'user_subscriptions.user_id')->where('end_date', '>', Carbon::parse(now()))->where('users.id', user()->id)->orderBy('user_subscriptions.created_at', 'DESC')->first();

    if ($subscription) {
        return true;
    } else {
        return false;
    }
}

function postLimit()
{
    $total_posts = Post::where('user_id', user()->id)->count();

    $subscription = User::join('user_subscriptions', 'users.id', 'user_subscriptions.user_id')->where('end_date', '>', Carbon::parse(now()))->where('users.id', user()->id)->orderBy('user_subscriptions.created_at', 'DESC')->first();

    $value = '';

    if ($subscription->package_id == 1) {
        if ($total_posts >= 2) {
            $value = true;
        } else {
            $value = false;
        }
    } else if ($subscription->package_id == 2) {
        if ($total_posts >= 4) {
            $value = true;
        } else {
            $value = false;
        }
    } else if ($subscription->package_id == 3) {
        if ($total_posts >= 8) {
            $value = true;
        } else {
            $value = false;
        }
    }

    return $value;
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

    $active_star = '<li><img src="' . asset('assets/app/icons/star_fill.svg') . '" alt="star icon" /></li>';
    $inactive_star = '<li><img src="' . asset('assets/app/icons/star_blank.svg') . '" alt="star icon" /></li>';

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

    $active_star = '<li><img src="' . asset('assets/app/icons/star_fill.svg') . '" alt="star icon" /></li>';
    $inactive_star = '<li><img src="' . asset('assets/app/icons/star_blank.svg') . '" alt="star icon" /></li>';

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

function category_total_shop($category_id)
{
    return DB::table('shops')->where('category_id', $category_id)->count();
}

function sub_category_total_shop($category_id)
{
    return DB::table('shops')->where('sub_category_id', $category_id)->count();
}

function sub_sub_category_total_shop($category_name)
{
    return DB::table('shops')->where('sub_sub_category', 'LIKE', '%"' . $category_name . '"%')->count();
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

function showErrorMessage($message, $file, $line)
{
    if (env('APP_DEBUG') == 'true') {
        $error_array = [
            'Message' => $message,
            'File' => $file,
            'Line No' => $line,
        ];
        return dd($error_array);
    }
}

function tagify_array($value)
{

    // Because the $value is an array of json objects
    // we need this helper function.

    // First check if is not empty
    if (empty($value)) {

        return $output = array();

    } else {

        // Remove squarebrackets
        $value = str_replace(array('[', ']'), '', $value);

        // Fix escaped double quotes
        $value = str_replace('\"', "\"", $value);

        // Create an array of json objects
        $value = explode(',', $value);

        // Let's transform into an array of inputed values
        // Create an array
        $value_array = array();

        // Check if is array and not empty
        if (is_array($value) && 0 !== count($value)) {

            foreach ($value as $value_inner) {
                $value_array[] = json_decode($value_inner);
            }

            // Convert object to array
            // Note: function (array) not working.
            // This is the trick: create a json of the values
            // and then transform back to an array
            $value_array = json_decode(json_encode($value_array), true);

            // Create an array only with the values of the child array
            $output = array();

            foreach ($value_array as $value_array_inner) {
                foreach ($value_array_inner as $key => $val) {
                    $output[] = $val;
                }
            }

        }

        return $output;

    }

}

// function pushNotification($title, $body)
// {
//     $serverKey = env('FIREBASE_SERVER_KEY');

//     // Replace with the FCM registration token of the device you want to send the notification to
//     $registrationToken = FcmToken::where('status', 1)->pluck('token')->all();

//     // URL for FCM endpoint
//     $endpoint = 'https://fcm.googleapis.com/v1/projects/globingsapp/messages:send';

//     // Create the notification payload
//     $message = [
//         'message' => [
//             'token' => $registrationToken,
//             'notification' => [
//                 "title" => $title,
//                 "body" => $body,
//             ],
//         ],
//     ];

//     // Convert the payload to JSON
//     $jsonMessage = json_encode($message);

//     // Set up the HTTP headers
//     $headers = [
//         'Authorization: Bearer ' . $serverKey,
//         'Content-Type: application/json',
//     ];

//     // Initialize cURL session
//     $ch = curl_init($endpoint);

//     // Set cURL options
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonMessage);

//     // Execute cURL session and get the result
//     $response = curl_exec($ch);

//     // Check for cURL errors
//     if (curl_errno($ch)) {
//         echo 'Error during cURL request: ' . curl_error($ch);
//     }

//     // Close cURL session
//     curl_close($ch);

//     // Output the FCM response
//     // echo 'FCM Response: ' . $response;
// }

function pushNotification($title, $body)
{
    $url = 'https://fcm.googleapis.com/fcm/send';

    $FcmToken = FcmToken::where('status', 1)->pluck('token')->all();

    $serverKey = env('FIREBASE_SERVER_KEY'); // ADD SERVER KEY HERE PROVIDED BY FCM

    $data = [
        "registration_ids" => $FcmToken,
        "notification" => [
            "title" => $title,
            "body" => $body,
        ],
    ];
    $encodedData = json_encode($data);

    $headers = [
        'Authorization:key=' . $serverKey,
        'Content-Type: application/json',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
    // Execute post
    $result = curl_exec($ch);
    if ($result === false) {
        die('Curl failed: ' . curl_error($ch));
    }
    // Close connection
    curl_close($ch);
}
