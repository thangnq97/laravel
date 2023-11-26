<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'variant_id', 'total_price', 'bill_id'];

    public function variant() {
        return $this->belongsTo(Product_variant::class);
    }

    public function bill() {
        return $this->belongsTo(Bills::class);
    }
}
