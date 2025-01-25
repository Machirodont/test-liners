<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property array $spec
 * @property string $description
 * @property int $ordering
 * @property bool $state
 *
 * @property CabinCategory[] $cabinCategories
 * @property ShipGallery[] $gallery
 */
class Ship extends Model
{
    use HasFactory;

    protected $table = 'ships';

    public $timestamps = false;

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
