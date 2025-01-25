<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ship extends Model
{
    use HasFactory;

    protected $table = 'ships';

    protected $fillable = [
        'title',
        'spec',
        'description',
        'ordering',
        'state',
    ];

    protected $casts = [
        'spec' => 'array',
    ];

    public function cabinCategories(): HasMany
    {
        return $this->hasMany(CabinCategory::class, 'ship_id');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(ShipGallery::class, 'ship_id');
    }
}
