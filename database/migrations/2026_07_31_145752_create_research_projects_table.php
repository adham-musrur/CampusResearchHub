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
    Schema::create('research_projects', function (Blueprint $table) {
        $table->id();

        $table->string('title');

        $table->text('description');

        $table->string('research_area');

        $table->string('department');

        $table->foreignId('created_by')
              ->constrained('users')
              ->onDelete('cascade');

        $table->enum('status', [
            'pending',
            'approved',
            'completed'
        ])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_projects');
    }
};
