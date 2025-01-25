<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
