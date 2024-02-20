<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $guarded = ['id'];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class, 'id_contract', 'id');
    }

    public function detail(): BelongsTo
    {
        return $this->belongsTo(InvoicePrint::class, 'id_contract', 'id');
    }
}
