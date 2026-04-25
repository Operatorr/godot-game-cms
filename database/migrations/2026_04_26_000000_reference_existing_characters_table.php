<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The game database already owns the characters table.
     *
     * Existing observed shape before this migration:
     * - id: integer primary key, auto-incrementing
     * - user_id: nullable integer
     * - name: string/varchar(50)
     * - created_at: nullable timestamp, default current timestamp
     */
    public function up(): void
    {
        Schema::table('characters', function (Blueprint $table) {
            if (! Schema::hasColumn('characters', 'class')) {
                $table->string('class', 20)->default('Warrior');
            }

            if (! Schema::hasColumn('characters', 'race')) {
                $table->string('race', 20)->default('Human');
            }

            if (! Schema::hasColumn('characters', 'realm')) {
                $table->string('realm', 50)->default('Asia (Singapore)');
            }

            if (! Schema::hasColumn('characters', 'mode')) {
                $table->string('mode', 20)->default('softcore');
            }

            if (! Schema::hasColumn('characters', 'level')) {
                $table->smallInteger('level')->default(1);
            }
        });
    }

    public function down(): void
    {
        Schema::table('characters', function (Blueprint $table) {
            $columns = array_filter(
                ['class', 'race', 'realm', 'mode', 'level'],
                fn (string $column): bool => Schema::hasColumn('characters', $column)
            );

            if ($columns !== []) {
                $table->dropColumn($columns);
            }
        });
    }
};
