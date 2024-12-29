<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuperAdmin extends Model
{
    use HasFactory, SoftDeletes, Timestamp;
    protected $fillable = [
        'user_id',
        'user_type',
        'address',
        'phone',
        'date_of_birth',
        'last_login',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
