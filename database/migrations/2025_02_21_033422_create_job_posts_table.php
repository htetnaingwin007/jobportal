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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('job_region_id');
            $table->foreign('job_region_id')->references('id')->on('regions')->onDelete('cascade');
            
            
            $table->string('job_type');
            $table->string('job_location');
            $table->string('vacancy');
            $table->string('experience');
            $table->string('salary');
            $table->string('gender');
            $table->string('application_deadline');
            $table->string('job_description');
            $table->string('responsibilities');
            $table->string('education_requirements');
            $table->string('other_benefits');
            $table->string('image');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
