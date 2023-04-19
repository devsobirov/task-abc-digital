<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot as Model;

class CatalogeCategory extends Model
{
    use HasFactory;

    protected $table = 'catalogue_category';
    protected $guarded = [];
}
