<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
     Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique()->after('title');
        $table->string('image')->nullable(); 
        $table->string('category')->nullable();
        $table->text('description')->nullable();
        $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
        $table->integer('no_of_lectures')->default(0);
        $table->integer('duration')->default(0); 
        $table->timestamps();
        $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('courses');
         Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
