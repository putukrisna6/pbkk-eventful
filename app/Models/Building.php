<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public static $STATUS = [
        'INIT',
        'PENDING',
        'APPROVED',
        'REJECTED',
        'REVISION'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'text',
        'address',
        'phone_number',
        'image',
        'latitude',
        'longitude',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function options() {
        return $this->hasMany(Option::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
