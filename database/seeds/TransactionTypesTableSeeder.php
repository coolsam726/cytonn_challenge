<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypesTableSeeder extends Seeder
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
                "name" => "withdrawal",
                "display_name" => "Withdrawal",
                "description" => "A transaction that withdraws money from a user's account"
            ],
            [
                "name" => "deposit",
                "display_name" => "Deposit",
                "description" => "A transaction that deposits money to a user's account"
            ],

        ];
        DB::transaction(function ()use($types) {
            foreach ($types as $type) {
                $model = \App\TransactionType::firstOrCreate($type);
            }
        });
    }
}
