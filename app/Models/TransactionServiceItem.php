<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionServiceItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'transaction_id',
        'service_id',
        'qty_service',
    ];

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
}
