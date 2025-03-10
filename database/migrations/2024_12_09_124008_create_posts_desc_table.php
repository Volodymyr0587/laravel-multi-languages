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
        Schema::dropColumns('posts', ['title', 'content']);

        Schema::create('posts_desc', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->string('lang');
            $table->string('title');
            $table->text('content');
            $table->primary(['post_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_desc');
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title');
            $table->text('content');
        });
    }
};
