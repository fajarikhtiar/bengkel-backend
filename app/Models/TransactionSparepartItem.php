<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionSparepartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'transaction_id',
        'sparepart_id',
        'qty_sparepart',
    ];

    public function sparepart()
    {
        return $this->hasOne(Sparepart::class, 'id', 'sparepart_id');
    }
}
