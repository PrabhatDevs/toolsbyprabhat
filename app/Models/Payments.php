<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [

        'user_id',

        'razorpay_payment_id',
        'razorpay_order_id',
        'razorpay_signature',

        'plan_type',
        'plan_name',

        'credits_added',
        'pdf_added',

        'amount',
        'currency',
        'fee',
        'tax',

        'status',
        'method',
        'upi_transaction_id',
        'international',

        'email',
        'contact',

        'raw_response',
        'payment_date',
    ];

    protected $casts = [
        'raw_response' => 'array',
        'international' => 'boolean',
        'payment_date' => 'datetime',
    ];
}
