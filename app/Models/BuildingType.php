<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'building_id',
        'type_id'
    ];

    public function building() {
        return $this->belongsTo(Building::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
