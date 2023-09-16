<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'number_plate',
        'phone',
        'rate',
        'rate_one',
        'charge_id',
        'washer_id',
        'washerOne_id',
        'amount',
        'discountAmount',
        'discountAmountOne',
        'totalDiscount',
        'payment_method',
    ];
    public function washer(){
        return $this->hasOne(Washer::class, 'id', 'washer_id');
    }
    public function washerOne(){
        return $this->hasOne(Washer::class, 'id', 'washerOne_id');
    }
    public function charge(){
        return $this->belongsTo(Charge::class);
    }

}
