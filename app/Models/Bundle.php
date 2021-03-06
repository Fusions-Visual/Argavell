<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bundle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'bundle_id', 'product_id', 'size', 'key'
    ];
    public function bundle() {
        return $this->belongsTo(Product::class, 'bundle_id', 'id');
    }
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
