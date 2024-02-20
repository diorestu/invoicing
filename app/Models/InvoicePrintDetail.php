<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoicePrintDetail extends Model
{
    protected $guarded = ['id'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(InvoicePrint::class, 'id_invoice', 'id');
    }
}
