<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use HasFactory;
    // use softDeletes;
    protected  $primaryKey = 'product_id';
    protected $fillable = [
        'product_id',
        'product_Name',
        'photo',   
        'category_id',   
        'price',   
        'discount',   
        'rating',   
        'description',   
        'stock',   
    ];

    // public function category(): BelongsTo
    // {
    //     return $this->BelongsTo(categories::class);
    // }
    // public function Products(): HasMany
    // {
    //     return $this->hasMany(products::class);
    // }
    public function category(): belongsTo
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
}
