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

        $scanned_data = explode(',', $request->get('data'));

        $shop = Shop::where('user_id', $scanned_data[0])->first();
        $user_id = $scanned_data[0];
        $type = $scanned_data[1];
        $scanned_by = user()->id;

        if($shop){
            if($user_id != $scanned_by){
                if($type == 'discount'){
                    $scan_status = ScanHistory::where('shop_id', $shop->id)->where('type', 'discount')->where('user_id', user()->id)->first();
                    if($scan_status){
                        return response()->json(['message' => 'second_scan', 'scan_id' => 0]);
                    } else {
                        $amount = 0;
                        if($shop->bings_discount == 3){
                            $amount = 25;
                        }
                        if($shop->bings_discount == 5){
                            $amount = 50;
                        }
                        if($shop->bings_discount == 7){
                            $amount = 75;
                        }
                        if($shop->bings_discount == 10){
                            $amount = 100;
                        }
                        if($shop->bings_discount == 15){
                            $amount = 150;
                        }
                        if($shop->bings_discount == 20){
                            $amount = 250;
                        }
                        if($shop->bings_discount == 30){
                            $amount = 300;
                        }

                        if(user()->bings_balance >= $amount){
                            $user = User::where('id', user()->id)->first();
                            $user->bings_balance -= $amount;
                            $user->save();

                            $shop_user = User::where('id', $user_id)->first();
                            $shop_user->bings_balance += $amount;
                            $shop_user->total_bings += $amount;
                            $shop_user->save();

                            $history = new ScanHistory();
                            $history->shop_id = $shop->id;
                            $history->user_id = user()->id;
                            $history->discount = $shop->bings_discount;
                            $history->bings = $amount;
                            $history->type = 'discount';
                            $history->status = 1;
                            $history->save();

                            return response()->json(['message' => 'scan_successful', 'scan_id' => $history->id]);
                        } else {
                            return response()->json(['message' => 'insufficient_bings', 'scan_id' => 0]);
                        }
                    }
                } else {
                    $visit_scan_status = ScanHistory::where('shop_id', $shop->id)->where('type', 'visit')->where('user_id', user()->id)->first();

                    if($visit_scan_status){
                        return response()->json(['message' => 'second_scan', 'scan_id' => 0]);
                    } else {
                        $scanned_user = User::find($scanned_by);
                        $scanned_user->bings_balance += 5;
                        $scanned_user->total_bings += 5;
                        $scanned_user->save();

                        $shop->visited += 1;
                        $shop->save();

                        $bings_history = new BingsHistory();
                        $bings_history->user_id = $scanned_by;
                        $bings_history->bings_for = 'Visiting a shop';
                        $bings_history->description = 'You visited a shop';
                        $bings_history->bings = 5;
                        $bings_history->status = 1;
                        $bings_history->save();

                        $history = new ScanHistory();
                        $history->shop_id = $shop->id;
                        $history->user_id = user()->id;
                        $history->discount = 0;
                        $history->bings = 5;
                        $history->type = 'visit';
                        $history->status = 1;
                        $history->save();
                    }
                }

            } else {
                return response()->json(['message' => 'error_self_scan', 'scan_id' => 0]);
            }
        } else {
            return response()->json(['message' => 'invalid_qr_code', 'scan_id' => 0]);
        }


    }

    public function render()
    {
        return view('livewire.app.scanner.profile-scanner-component')->layout('livewire.app.layouts.base');
    }
}
