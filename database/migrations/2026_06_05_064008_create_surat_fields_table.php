<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_fields', function (Blueprint $table) {

            $table->id();

            $table->foreignId('jenis_surat_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('label');

            $table->string('name');

            $table->enum('type', [
                'text',
                'textarea',
                'number',
                'date',
                'select',
            ]);

            $table->boolean('is_required')
                ->default(true);

            $table->text('options')
                ->nullable();

            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_fields');
    }
};
