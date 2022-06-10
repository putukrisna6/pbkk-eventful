<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static $STATUS = [
        'INIT',
        'PENDING',
        'COMPLETED',
        'CANCELED',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'building_id',
        'user_id',
        'total_price',
        'status',
        'proof_of_payment'
    ];

    public function building() {
        return $this->belongsTo(Building::class);
    }
}
