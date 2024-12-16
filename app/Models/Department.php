<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{

    use HasFactory, SoftDeletes, Timestamp;
    protected $fillable = [
        'name',
        'clinic_id',
    ];
    public function departmentAdmins(): HasMany
    {
        return $this->hasMany(DepartmentAdmin::class)->chaperone();
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class)->chaperone();
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class)->chaperone();
    }

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
}
