<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('research_projects', function (Blueprint $table) {

            // Rename created_by to user_id
            $table->renameColumn('created_by', 'user_id');

            // Add project deadline
            $table->date('deadline')->after('research_area');

        });
    }

    public function down(): void
    {
        Schema::table('research_projects', function (Blueprint $table) {

            $table->renameColumn('user_id', 'created_by');

            $table->dropColumn('deadline');

        });
    }
};