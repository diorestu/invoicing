<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoicePrint extends Model
{
    protected $guarded = ['id'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'id_invoice', 'id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(InvoicePrintDetail::class, 'id_invoice', 'id');
    }
}
