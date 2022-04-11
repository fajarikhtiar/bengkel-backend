<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'total_price'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function sparepartItems()
    {
        return $this->hasMany(TransactionSparepartItem::class, 'transaction_id', 'id');
    }

    public function accesorieItems()
    {
        return $this->hasMany(TransactionAccesorieItem::class, 'transaction_id', 'id');
    }

    public function serviceItems()
    {
        return $this->hasMany(TransactionServiceItem::class, 'transaction_id', 'id');
    }
}
