<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'phone', 'email', 'address', 'total_price', 'user_id', 'voucher_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function voucher() {
        return $this->belongsTo(Vouchers::class);
    }

    public function detail() {
        return $this->hasMany(Bill_detail::class);
    }
}
