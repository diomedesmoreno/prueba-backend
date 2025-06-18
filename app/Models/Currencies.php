<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Currencies extends Model
{
    protected $table = 'currencies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'symbol',
        'exchange_rate',
    ];
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
