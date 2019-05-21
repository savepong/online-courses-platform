<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'invoice_number', 'total_price', 'discount', 'net_price', 'vat_percent', 'coupon_id', 'billing_to', 'billing_address', 'billing_country', 'status'];

    public function getRouteKeyName()
    {
        return 'invoice_number';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getInvoiceDateAttribute()
    {
        return date_format($this->created_at, 'jS F, Y');
    }

    public function getSubtotalAttribute()
    {
        $beforeVat = $this->net_price / (1 + ($this->vat_percent / 100));
        return number_format($beforeVat, 2);
    }

    public function getVatAttribute()
    {
        $vat = $this->net_price * $this->vat_percent / (100 + $this->vat_percent);
        return number_format($vat, 2);
    }

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['q']) && $q = $filter['q']){
            $query->where(function($qr) use ($q){
                $qr->whereHas('user', function($qrr) use ($q){
                    $qrr->where('name', 'LIKE', "%{$q}%");
                });
                $qr->orWhere('invoice_number', 'LIKE', "%{$q}%");
            });
        }
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }
}
