<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'transaction_id',
        'sparepart_id',
        'qty_sparepart',
        'accesorie_id',
        'qty_accesorie',
        'service_id',
        'qty_service',
    ];

    public function sparepart()
    {
        $this->hasOne(Sparepart::class, 'id', 'sparepart_id');
    }
    public function accesorie()
    {
        $this->hasOne(Accesorie::class, 'id', 'accesorie_id');
    }
    public function service()
    {
        $this->hasOne(Service::class, 'id', 'service_id');
    }
}
