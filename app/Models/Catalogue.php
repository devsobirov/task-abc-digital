<?php

namespace App\Models;

use App\Models\Pivots\CatalogeCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Catalogue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            CatalogeCategory::class, // or 'catalogue_category'
            'catalogue_id',
            'category_id'
        );
    }

    /**
     * Will be executed:
     *  "select * from "products"
     *      inner join "catalogue_category" on "catalogue_category"."category_id" = "products"."category_id"
     *      where "catalogue_category"."catalogue_id" = {$this->id}"
     */
    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(
            Product::class,
            CatalogeCategory::class,
            'catalogue_category.catalogue_id',
            'products.category_id', // Catalogue-id
            'id', // Catalog_id
            'catalogue_category.category_id',
        );
    }
}
