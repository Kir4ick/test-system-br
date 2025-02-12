<?php

namespace Database\Seeders;

use App\Checkers\CheckBlocks\BlackListCheckBlock;
use App\Checkers\CheckBlocks\CityCheckBlock;
use App\Checkers\CheckBlocks\ComissionCheckBlock;
use App\Checkers\CheckBlocks\CountryCheckBlock;
use App\Checkers\CheckBlocks\RecommendationCheckBlock;
use App\Checkers\CheckBlocks\StarsCheckBlock;
use App\Checkers\CheckBlocks\WhiteListCheckBlock;
use App\Models\Agency;
use App\Models\AgencyHotelOption;
use App\Models\City;
use App\Models\Company;
use App\Models\Condition;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\HotelAgreement;
use App\Models\Rule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::query()->insert([
            ['name' => 'A@A'],
        ]);

        Agency::query()->insert([
            ['name' => 'ООО "Рога и копыта"'],
            ['name' => 'ООО "Наследие"'],
        ]);

        Country::query()->insert([
            ['name' => 'Россия'],
            ['name' => 'Беларусь'],
            ['name' => 'Казахстан'],
        ]);

        City::query()->insert([
            ['name' => 'Москва', 'country_id' => 1],
            ['name' => 'Санкт Петербург', 'country_id' => 1],
        ]);

        Hotel::query()->insert([
            ['name' => 'Балчуг Кемпински Москва', 'city_id' => 1, 'stars' => 5],
            ['name' => 'Измайлово Альфа', 'city_id' => 1, 'stars' => 4],
            ['name' => 'Золотое кольцо', 'city_id' => 1, 'stars' => 5],
            ['name' => 'Плаза Гарден Москва Центр Международной Торговли', 'city_id' => 1, 'stars' => 5],
            ['name' => 'Измайлово Гамма', 'city_id' => 1, 'stars' => 3],
            ['name' => 'Нептун', 'city_id' => 2, 'stars' => 4],
            ['name' => 'Ладога-отель', 'city_id' => 2, 'stars' => 3],
            ['name' => 'Питер Академия', 'city_id' => 2, 'stars' => 3],
            ['name' => 'Марко Поло', 'city_id' => 2, 'stars' => 4],
            [ 'name' => 'Герцен-Хаус', 'city_id' => 2, 'stars' => 1],
        ]);

        HotelAgreement::query()->insert([
            ['hotel_id' => 1, 'discount_percent' => 10, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 0],
            ['hotel_id' => 2, 'discount_percent' => 12, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 0],
            ['hotel_id' => 3, 'discount_percent' => 0, 'comission_percent' => 15, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 1],
        ]);

        AgencyHotelOption::query()->insert([
            ['hotel_id' => 1, 'agency_id' => 1, 'percent' => 10, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['hotel_id' => 2, 'agency_id' => 1, 'percent' => 5, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['hotel_id' => 3, 'agency_id' => 1, 'percent' => 8, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0],
        ]);

        Rule::query()->insert([
            ['name' => 'Правило 1', 'message' => 'Сработало правило 1', 'is_active' => true, 'agency_id' => 1],
            ['name' => 'Правило 2', 'message' => 'Сработало правило 2', 'is_active' => true, 'agency_id' => 1],
            ['name' => 'Правило 3', 'message' => 'Сработало правило 3', 'is_active' => true, 'agency_id' => 1],

            ['name' => 'Правило 1', 'message' => 'Сработало правило 1', 'is_active' => true, 'agency_id' => 2],
            ['name' => 'Правило 2', 'message' => 'Сработало правило 2', 'is_active' => false, 'agency_id' => 2],
        ]);

        Condition::query()->insert(values: [
            ['name' => BlackListCheckBlock::getSystemName(), 'condition' => '=', 'value' => true, 'rule_id' => 1],
            ['name' => CityCheckBlock::getSystemName(), 'condition' => '=', 'value' => 1, 'rule_id' => 1],

            ['name' => StarsCheckBlock::getSystemName(), 'condition' => '!=', 'value' => 5, 'rule_id' => 2],
            ['name' => StarsCheckBlock::getSystemName(), 'condition' => '=', 'value' => 3, 'rule_id' => 2],

            ['name' => RecommendationCheckBlock::getSystemName(), 'condition' => '=', 'value' => true, 'rule_id' => 3],
            ['name' => WhiteListCheckBlock::getSystemName(), 'condition' => '=', 'value' => true, 'rule_id' => 3],

            ['name' => ComissionCheckBlock::getSystemName(), 'condition' => '>', 'value' => 1000, 'rule_id' => 4],
            ['name' => ComissionCheckBlock::getSystemName(), 'condition' => '<', 'value' => 15000, 'rule_id' => 4],

            ['name' => CountryCheckBlock::getSystemName(), 'condition' => '=', 'value' => 3, 'rule_id' => 5],
            ['name' => CountryCheckBlock::getSystemName(), 'condition' => '=', 'value' => 3, 'rule_id' => 5],
        ]);
    }

}
