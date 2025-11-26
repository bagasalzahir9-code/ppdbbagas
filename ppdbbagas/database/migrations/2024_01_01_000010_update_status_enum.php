<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update pendaftar table status enum to include all required statuses
        DB::statement("ALTER TABLE pendaftar MODIFY COLUMN status ENUM('SUBMIT', 'ADM_PASS', 'ADM_REJECT', 'PAID', 'LULUS', 'TIDAK_LULUS', 'CADANGAN') NOT NULL");
    }

    public function down(): void
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE pendaftar MODIFY COLUMN status ENUM('SUBMIT', 'ADM_PASS', 'ADM_REJECT', 'PAID') NOT NULL");
    }
};