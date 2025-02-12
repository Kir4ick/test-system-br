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
        Schema::create('companies', function (Blueprint $table) {
            $table->id()->comment('ID компании');
            $table->string('name')->comment('Название компании');
            $table->timestamps();
        });

        Schema::create('agencies', function (Blueprint $table) {
            $table->id()->comment('ID агентства');
            $table->string('name')->comment('Название агентства');
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->id()->comment('ID страны');
            $table->string('name')->comment('Название страны');
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id()->comment('ID города');
            $table->string('name')->comment('Название города');
            $table->foreignId('country_id')->constrained('countries')->comment('ID страны');
            $table->timestamps();
        });

        Schema::create('hotels', function (Blueprint $table) {
            $table->id()->comment('ID отеля');
            $table->string('name')->comment('Название отеля');
            $table->unsignedTinyInteger('stars')->comment('Звездность');
            $table->foreignId('city_id')->constrained('cities')->comment('ID города');
            $table->timestamps();
        });

        Schema::create('agency_hotel_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hotels')->comment('ID отеля');
            $table->foreignId('agency_id')->constrained('agencies')->comment('ID агентства');
            $table->integer('percent')->default(0)->comment('Процент');
            $table->boolean('is_black')->default(0)->comment('Отель в черном списке');
            $table->boolean('is_recomend')->default(0)->comment('Рекомендованный отель');
            $table->boolean('is_white')->default(0)->comment('Отель в белом списке');
            $table->timestamps();
        });

        Schema::create('hotel_agreements', function (Blueprint $table) {
            $table->id()->comment('ID договора');
            $table->foreignId('hotel_id')->constrained('hotels')->comment('ID отеля');
            $table->integer('discount_percent')->default(0)->comment('Процент скидки');
            $table->integer('comission_percent')->default(0)->comment('Процент комиссии');
            $table->boolean('is_default')->default(0)->comment('Договор по умолчанию');
            $table->integer('vat_percent')->default(0)->comment('Процент НДС');
            $table->integer('vat1_percent')->default(0)->comment('Процент НДС1');
            $table->integer('vat1_value')->default(0)->comment('НДС значение');
            $table->foreignId('company_id')->constrained('companies')->comment('ID компании');
            $table->dateTime('date_from')->nullable()->comment('Дата начала действия договора');
            $table->dateTime('date_to')->nullable()->comment('Дата окончания действия договора');
            $table->boolean('is_cash_payment')->default(0)->comment('Возможность наличной оплаты');
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
        Schema::dropIfExists('hotel_agreements');
        Schema::dropIfExists('agency_hotel_options');
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('agencies');
        Schema::dropIfExists('companies');
    }
};
