<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductPrices;
use App\Models\Currencies;

class Products extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';    
    protected $fillable = ["description","name","price" ,"tax_cost","manufacturing_cost", "currency_id"];

    // protected $table = 'products';    

    public function currency()
    {
        return $this->belongsTo(Currencies::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrices::class);
    }
}
