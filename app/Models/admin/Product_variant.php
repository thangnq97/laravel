<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_variant extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'color_id', 'size_id', 'price', 'quantity'];

    public function product() {
        return $this->belongsTo(Products::class);
    }

    public function color() {
        return $this->belongsTo(Colors::class);
    }

    public function size() {
        return $this->belongsTo(Sizes::class);
    }
}
