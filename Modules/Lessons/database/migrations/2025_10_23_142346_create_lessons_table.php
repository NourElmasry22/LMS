<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Courses\Models\Course;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('lessons', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
        $table->boolean('is_free_preview')->default(false);
        $table->string('title');
        $table->text('content')->nullable();
        $table->string('video_url')->nullable();
        $table->integer('order')->default(0);
        $table->integer('duration')->nullable(); 
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
