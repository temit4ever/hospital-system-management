<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{

    use HasFactory, SoftDeletes, Timestamp;
    protected $fillable = [
        'team_member_id',
        'department_id',
        'date',
        'start_time',
        'end_time',
    ];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function teamMember(): BelongsTo
    {
        return $this->belongsTo(TeamMember::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class)->chaperone();
    }
}
