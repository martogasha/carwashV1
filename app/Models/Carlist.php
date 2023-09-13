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
        'charge_id',
        'washer_id',
        'amount',
        'payment_method',
    ];
    public function washer(){
        return $this->belongsTo(Washer::class);
    }
    public function charge(){
        return $this->belongsTo(Charge::class);
    }

}
