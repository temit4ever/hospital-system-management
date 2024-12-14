<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentAdmin extends Model
{
    use HasFactory, SoftDeletes, Timestamp;
    protected $fillable = [
        'department_id',
        'user_id',
        'status',
        'user_type',
        'address',
        'phone',
        'date_of_birth',
        'last_login',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
