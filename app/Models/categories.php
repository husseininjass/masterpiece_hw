<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categories extends Model
{
    use HasFactory;
    use softDeletes;
    protected  $primaryKey = 'category_id';
    protected $fillable = [
        'category_id',
        'category_Name',
        'photo'   
    ];
    public function products(): HasMany
    {
        return $this->hasMany(products::class ,'category_id');
    }
}
