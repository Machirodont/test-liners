<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 * @property int $id
 * @property int $ship_id
 * @property string $vendor_code
 * @property string $title
 * @property string|null $type
 * @property string $description
 * @property array|null $photos
 * @property int $ordering
 * @property bool $state
 *
 * @property-read \App\Models\Ship $ship
 */
class CabinCategory extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'cabin_categories';

    protected $fillable = [
        'ship_id',
        'vendor_code',
        'title',
        'type',
        'description',
        'photos',
        'ordering',
        'state',
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    public function ship(): BelongsTo
    {
        return $this->belongsTo(Ship::class, 'ship_id');
    }
}
