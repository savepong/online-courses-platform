<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\Course;
use App\Coupon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->uploadPath = public_path(config('project.image.directory') . "receipts/");
        $this->style = [
            'status' => [
                'pending' => 'warning',
                'paid' => 'success',
                'cancelled' => 'danger',
            ]
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();

        $orders = $user->orders()->latest()->get();
        $style = $this->style;

        return view('order.index', compact('orders', 'style'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function checkout(Requests\OrderPaymentRequest $request)
    {
        $vat = 7;
        $data = $request->all();
        $user = $request->user();

        $course = Course::findOrFail($data['course_id']);
        
        $totalPrice = $course->price;
        $discount = $this->getCouponDiscount($course->sale_price);
        $netPrice = $course->sale_price - $discount;

        /** Claim Coupong */
        if($discount > 0){
            $coupon = Coupon::where('code', request('coupon'))->firstOrFail();
            $coupon->users()->attach($user);
            $couponId = $coupon->id;
        }else{
            $couponId = null;
        }

        if($request->hasFile('receipt')){
            $data['receipt'] = $this->uploadReceipt($request->file('receipt'));
        }

        $order = $user->orders()->create([
            'invoice_number' => date('ymdHis') . rand(10, 99),
            'coupon_id' => $couponId,
            'total_price' => $totalPrice,
            'discount' => $totalPrice - $netPrice,
            'net_price' => $netPrice,
            'vat_percent' => $vat,
            'billing_to' => $user->billing_to,
            'billing_address' => $user->billing_address,
            'billing_country' => $user->billing_country,
            'status' => 'pending'
        ]);

        $order->courses()->attach($course);
        $payment = $order->payments()->create($data);

        return redirect(route('order.index'))->with('alert-info', "Confirm payment success.");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $style = $this->style;
        return view('order.invoice', compact('order', 'style'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function uploadReceipt($file)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid() . "." . $extension;
        $destination = $this->uploadPath;

        if($file->move($destination, $fileName)){
            return $fileName;
        }
    }


    // public function getCouponDiscount($sale_price)
    // {
    //     $couponCode = request('coupon');
    //     if($couponCode){
            
    //         $coupon = Coupon::where('code', $couponCode)->first();
    //         if($coupon){
    //             if(empty($coupon->expire_date) || $coupon->expire_date >= now()){
    //                 if($coupon->type == 'price'){
    //                     $discount = $coupon->discount;
    //                 }elseif($coupon->type == 'percent'){
    //                     $discount = $sale_price * ($coupon->discount / 100);
    //                 }
    //             }else{
    //                 return redirect()->back()->with('alert-danger', 'This coupon is expired');
    //             }
    //         }else{
    //             return redirect()->back()->with('alert-warning', 'This coupon is not exists');
    //         }
    //     }else{
    //         $discount = 0;
    //     }

    //     return $discount;
    // }
}
