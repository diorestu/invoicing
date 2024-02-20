<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function contract(): HasMany
    {
        return $this->hasMany(Contract::class, 'id_project', 'id');
    }

    public function invoice(): HasManyThrough
    {
        return $this->hasManyThrough(Contract::class, Invoice::class);
    }
    public function idvendor(): HasOne
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor');
    }
}
