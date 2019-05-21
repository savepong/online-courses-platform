<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Coupon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCouponDiscount($sale_price)
    {
        $discount = 0;
        
        $couponCode = request('coupon');
        if($couponCode){
            
            $coupon = Coupon::where('code', $couponCode)->first();
            if($coupon){
                if(empty($coupon->expire_date) || $coupon->expire_date >= now()){
                    if(!$coupon->users()->where('user_id', request()->user()->id)->exists()){
                        if($coupon->type == 'price'){
                            $discount = $coupon->discount;
                        }elseif($coupon->type == 'percent'){
                            $discount = $sale_price * ($coupon->discount / 100);
                        }
                    }else{
                        request()->session()->flash('alert-warning', 'This coupon code "<strong>' . strtoupper($coupon->code) . '</strong>" is already used');
                    }
                    
                }else{
                    request()->session()->flash('alert-danger', 'This coupon code "<strong>' . strtoupper($coupon->code) . '</strong>" is expired');
                }
            }else{
                request()->session()->flash('alert-warning', 'This coupon code "<strong>' . strtoupper($couponCode) . '</strong>" is not exists');
            }
        }

        return $discount;
    }
}
