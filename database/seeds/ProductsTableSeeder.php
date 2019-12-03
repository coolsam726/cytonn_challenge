<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::transaction(function () {
                $product_types = \App\ProductType::all('id')->pluck('id')->toArray();
                $products = [
                    [
                        "name" => "product-1",
                        "display_name" => "Product One",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-2",
                        "display_name" => "Product Two",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-3",
                        "display_name" => "Product Three",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-4",
                        "display_name" => "Product Four",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-5",
                        "display_name" => "Product Five",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-6",
                        "display_name" => "Product Six",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-7",
                        "display_name" => "Product Seven",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-8",
                        "display_name" => "Product Eight",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-9",
                        "display_name" => "Product Nine",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ],
                    [
                        "name" => "product-10",
                        "display_name" => "Product Ten",
                        "product_type_id" => rand(min($product_types),max($product_types)),
                        "active" => true
                    ]
                ];

                foreach ($products as $product) {
                    $model = \App\Product::firstOrCreate($product);
                }
            });
            $this->command->comment("Products Seeded successfully");
        } catch (\Illuminate\Database\QueryException $exception) {
            $this->command->error($exception->errorInfo[2]);
        } catch (Throwable $exception) {
            $this->command->error($exception->getMessage());
        }
    }
}
