<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'product_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Products::class);
    }
}
