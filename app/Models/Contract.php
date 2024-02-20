<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    protected $guarded = ['id'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id_project', 'id');
    }

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class, 'id_contract', 'id');
    }
    public function history(): HasMany
    {
        return $this->hasMany(ContractHistory::class, 'id_contract', 'id');
    }
}
