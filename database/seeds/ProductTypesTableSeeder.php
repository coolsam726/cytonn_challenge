<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                "name" => "hys",
                "display_name" => "High Yield Solutions",
                "description" => "The Team’s expertise and market knowledge enable us to offer investors higher yields than the market average. Regular credit analysis, quick dealing capability and the large banking spread in the market allow the team to capitalize on investment opportunities"
            ],
            [
                "name" => "reis",
                "display_name" => "Real Estate Investment Solutions",
                "description" => "Our unique strategic partnerships with Cytonn Real Estate, our development affiliate, enables us to find, evaluate, structure and deliver world class real estate investment products for investors"
            ],
            [
                "name" => "pris",
                "display_name" => "Private Regular Investment Solutions",
                "description" => "We understand that investors have varying financial goals. Our highly customized and simple to understand investment products will enable you to achieve your investment objective"
            ],
            [
                "name" => "pe",
                "display_name" => "Private Equity",
                "description" => "Cytonn seeks to unearth value by identifying potential companies and growing them through capital provision and partnering with their management to drive strategy"
            ]
        ];
        DB::transaction(function ()use($types) {
            foreach ($types as $type) {
                $model = \App\ProductType::firstOrCreate($type);
            }
        });
    }
}
