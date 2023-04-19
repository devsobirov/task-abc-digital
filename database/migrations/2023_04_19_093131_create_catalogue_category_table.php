<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catalogue_category', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('catalogue_id');
            $table->foreign('catalogue_id')
                ->references('id')->on('catalogues')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->cascadeOnDelete();

            $table->unique(['catalogue_id', 'category_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogue_category');
    }
};
