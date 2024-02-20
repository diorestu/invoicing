<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContractAddendum extends Model
{
    protected $guarded = ['id'];
    protected $table = 'contracts_addendum';

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class, 'id_contract', 'id');
    }
}
