<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionAccesorieItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'transaction_id',
        'accesorie_id',
        'qty_accesorie',
    ];

    public function accesorie()
    {
        return $this->hasOne(Accesorie::class, 'id', 'accesorie_id');
    }
}
