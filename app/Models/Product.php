<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name', 'slug',
        'price', 'price_discount', 'stock',
        'description', 'size', 'facts', 'howtouse', 'ingredients',
        'img', 'type',
        'bundle', 'bundle_start', 'bundle_end'
    ];

    protected $casts = [
        'facts' => 'array',
        'size' => 'array',
        'howtouse' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function bundles() {
        return $this->hasMany(Bundle::class, 'bundle_id', 'id');
    }
}
