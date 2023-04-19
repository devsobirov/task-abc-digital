<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function catalogues(): BelongsToMany
    {
        return $this->belongsToMany(
            Catalogue::class,
            'catalogue_category',
            'category_id',
            'catalogue_id'
        );
    }
}
