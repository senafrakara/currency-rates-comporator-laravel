<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class CurrencyRate extends Model
{
    use HasFactory;
    protected $fillable = ['shortCode', 'symbol', 'price', 'name'];
    
    public function scopeLowestPrice($query){

        return $query->selectRaw(('*, MIN(price) as price'))
        ->groupBy('shortCode');
    }
}
