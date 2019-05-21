<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Course;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CouponMail;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        authorizeRoles('admin');
        $coupon = new Coupon();

        return view("coupon.create", compact('coupon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CouponRequest $request)
    {
        authorizeRoles('admin');

        Coupon::create($request->all());

        return redirect(route('admin.coupons'))->with("alert-success", "New Coupon code was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        authorizeRoles('admin');
        $coupon = Coupon::findOrFail($id);
        
        return view("coupon.edit", compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CouponRequest $request, $id)
    {
        authorizeRoles('admin');

        Coupon::findOrFail($id)->update($request->all());

        return redirect(route('admin.coupons'))->with("alert-success", "Coupon was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        authorizeRoles('admin');

        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect(route('admin.coupons'))->with("alert-warning", "Coupon was deleted successfully!");
    }



    public function generate()
    {
        $user = request()->user();
        $course_id = request('course_id');
        $email = request('email');

        $course = Course::findOrFail($course_id);

        $coupon = Coupon::create([
            'code' => strtoupper(str_random(8)),
            'type' => 'percent',
            'discount' => '100',
            'repeatable' => false,
            'course_id' => $course_id
        ]);

        Mail::to($email)->send(new CouponMail($coupon, $course));
        return redirect(route('profile'))->with('alert-success', 'คุณได้ครับคูปองพิเศษแล้ว กรุณาตรวจสอบอีเมลของคุณ.');
    }
}
