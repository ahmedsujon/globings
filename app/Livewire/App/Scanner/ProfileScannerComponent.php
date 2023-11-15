<?php

namespace App\Livewire\App\Scanner;

use App\Models\BingsHistory;
use App\Models\ScanHistory;
use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class ProfileScannerComponent extends Component
{
    public function scan(Request $request){

        sleep(2);

        $values = explode(',', $request->get('data'));
        $user_id = $values[0];
        $user_name = $values[1];

        $shop = Shop::where('user_id', $user_id)->first();
        $scanned_by = user()->id;

        if($user_id != $scanned_by){
            $scan_status = ScanHistory::where('shop_id', $shop->id)->where('user_id', user()->id)->first();

            if($scan_status){
                return response()->json(['message' => 'second_scan', 'scan_id' => 0]);
            } else {
                if(user()->bings_balance >= 20){
                    $user = User::where('id', user()->id)->first();
                    $user->bings_balance -= 20;
                    $user->save();

                    $shop_user = User::where('id', $user_id)->first();
                    $shop_user->bings_balance += 20;
                    $shop_user->total_bings += 20;
                    $shop_user->save();

                    $history = new ScanHistory();
                    $history->shop_id = $shop->id;
                    $history->user_id = user()->id;
                    $history->discount = 5;
                    $history->bings = 20;
                    $history->status = 1;
                    $history->save();

                    return response()->json(['message' => 'scan_successful', 'scan_id' => $history->id]);
                } else {
                    return response()->json(['message' => 'insufficient_bings', 'scan_id' => 0]);
                }
            }
        } else {
            return response()->json(['message' => 'error_self_scan', 'scan_id' => 0]);
        }
    }

    public function render()
    {
        return view('livewire.app.scanner.profile-scanner-component')->layout('livewire.app.layouts.base');
    }
}
