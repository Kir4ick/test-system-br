<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('message');
            $table->boolean('is_active');
            $table->foreignId('agency_id')->constrained();

            $table->unique(['agency_id', 'name']);

            $table->timestamps();
        });

        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('condition');
            $table->string('value')->nullable();

            $table->foreignId('rule_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conditions');
        Schema::dropIfExists('rules');
    }
};
