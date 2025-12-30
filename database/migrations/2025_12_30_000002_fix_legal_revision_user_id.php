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
        // Fix column type mismatch for created_by (Int -> UUID)
        if (Schema::hasColumn('legal_page_revisions', 'created_by')) {
            Schema::table('legal_page_revisions', function (Blueprint $table) {
                $table->dropColumn('created_by');
            });
        }

        Schema::table('legal_page_revisions', function (Blueprint $table) {
            $table->uuid('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('legal_page_revisions', 'created_by')) {
             Schema::table('legal_page_revisions', function (Blueprint $table) {
                $table->dropColumn('created_by');
            });
        }
        
        Schema::table('legal_page_revisions', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
        });
    }
};
