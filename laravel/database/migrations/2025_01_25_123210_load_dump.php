<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sqlFile = base_path('database/migrations/pac-dump.sql');

        if (File::exists($sqlFile)) {
            $sql = File::get($sqlFile);
            DB::unprepared($sql);
        } else {
            throw new Exception("SQL file not found: $sqlFile");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
