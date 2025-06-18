<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Currencies;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class ProductPrices extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';    
    protected $fillable = ["price" ,"product_id", "currency_id"];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }

    // public function products(): HasMany
    // {
    //     return $this->hasMany(Products::class, 'id', 'product_id');
    // }

    public static function details($id){ 
        return static::where('product_id', $id);
    }
}
