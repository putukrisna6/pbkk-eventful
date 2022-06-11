<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public static $STATUS = [
        'OPEN',
        'CLOSED'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'building_id',
        'user_id',
        'status'
    ];

    public function building() {
        return $this->belongsTo(Building::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
