<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ShipGallery
 *
 * @property int $id
 * @property int $ship_id
 * @property string $title
 * @property string $url
 * @property int $ordering
 *
 * @property-read \App\Models\Ship $ship
 */
class ShipGallery extends Model
{
    public const NO_IMG_PLACEHOLDER = '/img/No_Image_Available.jpg';

    use HasFactory;

    public $timestamps = false;

    protected $table = 'ships_gallery';

    protected $fillable = [
        'ship_id',
        'title',
        'url',
        'ordering',
    ];

    public function ship(): BelongsTo
    {
        return $this->belongsTo(Ship::class, 'ship_id');
    }
}
