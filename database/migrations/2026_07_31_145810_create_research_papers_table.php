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
    Schema::create('research_papers', function (Blueprint $table) {

        $table->id();

        $table->string('title');

        $table->text('abstract');

        $table->string('paper_file');

        $table->date('publication_date')
              ->nullable();

        $table->string('category');

        $table->foreignId('author_id')
              ->constrained('users')
              ->onDelete('cascade');

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_papers');
    }
};
