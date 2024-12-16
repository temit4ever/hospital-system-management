<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes, Timestamp;
    protected $fillable = [
        'schedule_id',
        'patient_id',
        'reason',
        'booked_by',
        'date',
        'status',
        'start_time',
        'end_time',
        'diagnose',
        'prescription',
    ];
    public function schedule(): BelongsTo
    {
        $superAdminRole = Role::create(['name' => 'super-admin']);

        $superAdminRole->givePermissionTo(['manage clinics', 'manage departments', 'manage schedules', 'manage appointments']);

        return $this->belongsTo(Schedule::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
