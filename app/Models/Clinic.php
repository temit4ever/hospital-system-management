<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use HasFactory, SoftDeletes, Timestamp;

    protected $fillable = ['name', 'address', 'phone', 'email'];
    public function clinicAdmins(): HasMany
    {
        return $this->hasMany(ClinicAdmin::class)->chaperone();
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class)->chaperone();
    }
}
