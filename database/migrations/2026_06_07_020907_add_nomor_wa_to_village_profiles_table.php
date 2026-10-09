<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'village_profiles',
            function (Blueprint $table) {

                $table->string('nomor_wa')
                    ->nullable()
                    ->after('kode_pos');

            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'village_profiles',
            function (Blueprint $table) {

                $table->dropColumn(
                    'nomor_wa'
                );

            }
        );
    }
};
