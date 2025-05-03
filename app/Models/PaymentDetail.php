<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_number',
        'bank_name',
        'amount',
        'payment_date',
        'receipt_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

