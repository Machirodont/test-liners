<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipGallery extends Model
{
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
