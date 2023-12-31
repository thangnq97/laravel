<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'categories';

    protected $fillable = ['name'];
    
}
