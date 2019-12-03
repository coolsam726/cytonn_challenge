<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersAndTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Generating 20,000 users");
        $products = \App\Product::all('id')->pluck('id')->toArray();
        $types = \App\TransactionType::all('id')->pluck('id')->toArray();
        $existing = User::all()->count();
        if ($existing < 20000) {
            factory(\App\User::class, (20000 - $existing))->create();
        }
        $this->command->comment(number_format(max(0,20000-$existing))." Users have been seeded");
        $this->command->info("Seeding products and transactions for each user");
        $users = User::all();
        foreach ($users as $user) {
            $their_product_indices = array_rand($products,rand(3,7));
            $their_products = [];
            foreach ($their_product_indices as $their_product_index) {
                array_push($their_products,$products[$their_product_index]);
            }
            $user->products()->sync($their_products);
            $this->command->comment("Products have been seeded for $user->id");
            $this->command->info("generating transactions for the products");
            foreach ($user->products as $product) {
                $models = factory(\App\Transaction::class, 30)->make([
                    "product_id" => $product->id,
                    "user_id" => $user->id,
                    "transaction_type_id" => rand(min($types), max($types))
                ]);
                \Illuminate\Support\Facades\DB::table('transactions')->insert($models->toArray());
            }
            $this->command->comment("transactions for $user->name's products have been generated");
        }
        $this->command->comment("Done seeding both users and transactions");
    }
}
