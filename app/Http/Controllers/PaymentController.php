<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->uploadPath = public_path(config('project.image.directory') . "receipts/");
        $this->style = [
            'status' => [
                'pending' => 'warning',
                'paid' => 'success',
                'approved' => 'success',
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $style = $this->style;
        return view('payment.create', compact('order', 'style'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function approve(Payment $payment)
    {
        authorizeRoles(['admin']);

        $payment->approved_at = now();
        $payment->cancelled_at = null;
        $payment->admin_id = request()->user()->id;
        $payment->save();

        $order = $payment->order;
        $order->status = "paid";
        $order->save();

        $courses = $order->courses;
        foreach($courses as $course){
            $course->enroll($order->user_id);
        }

        return redirect()->back()->with("alert-success", "Order #" . $order->invoice_number . " was approved");
    }

    public function cancel(Request $request, Payment $payment)
    {
        authorizeRoles(['admin']);

        $payment->approved_at = null;
        $payment->cancelled_at = now();
        $payment->memo = $request->memo;
        $payment->admin_id = request()->user()->id;
        $payment->save();

        $order = $payment->order;
        $order->status = "cancelled";
        $order->save();

        return redirect()->back()->with("alert-danger", "Order #" . $order->invoice_number . " was cancelled");
    }


    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
