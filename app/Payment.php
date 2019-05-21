<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'method', 'amount', 'date', 'time', 'receipt', 'memo', 'admin_id', 'approved_at', 'cancelled_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getDatetimeAttribute()
    {
        return date_format($this->created_at, 'jS F, Y');
    }

    public function getReceiptUrlAttribute()
    {
        $imageUrl = "";

        if( ! is_null($this->receipt)){
            $directory = config('project.image.directory') . "receipts/";
            $imagePath = public_path() . "/" . $directory . $this->receipt;
            if(file_exists($imagePath)) $imageUrl = asset($directory . $this->receipt);
        }
         
        return $imageUrl;
    }

    public function getStatusAttribute()
    {
        $status = "pending";

        if($this->approved_at != ''){
            $status = "approved";
        }elseif($this->cancelled_at != ''){
            $status = "cancelled";
        }

        return $status;
    }

}
