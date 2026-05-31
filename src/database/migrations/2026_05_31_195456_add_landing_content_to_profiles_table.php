<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('profiles', 'landing_content')) {
            Schema::table('profiles', function (Blueprint $table) {
                $table->json('landing_content')->nullable()->after('stack');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('profiles', 'landing_content')) {
            Schema::table('profiles', function (Blueprint $table) {
                $table->dropColumn('landing_content');
            });
        }
    }
};