<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Helpers\ProductHelper;

use App\Models\SMProductGroup1;
use App\Models\SMProductGroup2;
use App\Models\SMProductGroup3;
use App\Models\SMProductGroupLink;
use App\Models\SMProduct;
use App\Models\SMStock;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $group1Items = [
            ["id" => 1, "name" => "Food cupboard"],
            ["id" => 2, "name" => "Fruits & Vegetables"],
            ["id" => 3, "name" => "Beverages"],
        ];

        foreach ($group1Items as $group) {
            SMProductGroup1::updateOrCreate([
                'id' => $group['id']
            ], $group);
        }

        $group2Items = [
            ["id" => 1, "name" => "Honey,Jams & Spreads"], //1,1
            ["id" => 2, "name" => "Biscuits & crackers"], //1,2
            ["id" => 3, "name" => "Fruit"], //2,3
            ["id" => 4, "name" => "Vegetable"], //2,4
            ["id" => 5, "name" => "Salad & Herbs"], //2,5
            ["id" => 6, "name" => "Tea"], //3,6
            ["id" => 7, "name" => "Coffee"], //3,7
        ];

        foreach ($group2Items as $group) {
            SMProductGroup2::updateOrCreate([
                'id' => $group['id']
            ], $group);
        }

        $group3Items = [
            ["id" => 1, "name" => "Jam"], //1,1,1
            ["id" => 2, "name" => "Honey"], //1,1,2
            ["id" => 3, "name" => "Spreads"], //1,1,3
            ["id" => 4, "name" => "Cookies"], //1,2,4
            ["id" => 5, "name" => "Biscuits"], //1,2,5
            ["id" => 6, "name" => "Crackers"], //1,2,6
            ["id" => 7, "name" => "Banana"], //2,3,7
            ["id" => 8, "name" => "Apple"], //2,3,8
            ["id" => 9, "name" => "Onions & Potatoes"], //2,4,9
            ["id" => 10, "name" => "Cucumbers"], //2,5,10
            ["id" => 11, "name" => "Tomatoes"], //2,5,11
            ["id" => 12, "name" => "Green Tea"], //3,6,12
            ["id" => 13, "name" => "Special Tea"], //3,6,13
            ["id" => 14, "name" => "Whole Beans Coffee"], //3,7,14
            ["id" => 15, "name" => "Instant Coffee"], //3,7,15
        ];

        foreach ($group3Items as $group) {
            SMProductGroup3::updateOrCreate([
                'id' => $group['id']
            ], $group);
        }

        $groupLinks = [
            ["sm_product_group1_id" => 1, "sm_product_group2_id" => 1, "sm_product_group3_id" => 1, "active" => 1],
            ["sm_product_group1_id" => 1, "sm_product_group2_id" => 1, "sm_product_group3_id" => 2, "active" => 1],
            ["sm_product_group1_id" => 1, "sm_product_group2_id" => 1, "sm_product_group3_id" => 3, "active" => 1],
            ["sm_product_group1_id" => 1, "sm_product_group2_id" => 2, "sm_product_group3_id" => 4, "active" => 1],
            ["sm_product_group1_id" => 1, "sm_product_group2_id" => 2, "sm_product_group3_id" => 5, "active" => 1],
            ["sm_product_group1_id" => 1, "sm_product_group2_id" => 2, "sm_product_group3_id" => 6, "active" => 1],
            ["sm_product_group1_id" => 2, "sm_product_group2_id" => 3, "sm_product_group3_id" => 7, "active" => 1],
            ["sm_product_group1_id" => 2, "sm_product_group2_id" => 3, "sm_product_group3_id" => 8, "active" => 1],
            ["sm_product_group1_id" => 2, "sm_product_group2_id" => 4, "sm_product_group3_id" => 9, "active" => 1],
            ["sm_product_group1_id" => 2, "sm_product_group2_id" => 5, "sm_product_group3_id" => 10, "active" => 1],
            ["sm_product_group1_id" => 2, "sm_product_group2_id" => 5, "sm_product_group3_id" => 11, "active" => 1],
            ["sm_product_group1_id" => 3, "sm_product_group2_id" => 6, "sm_product_group3_id" => 12, "active" => 1],
            ["sm_product_group1_id" => 3, "sm_product_group2_id" => 6, "sm_product_group3_id" => 13, "active" => 1],
            ["sm_product_group1_id" => 3, "sm_product_group2_id" => 7, "sm_product_group3_id" => 14, "active" => 1],
            ["sm_product_group1_id" => 2, "sm_product_group2_id" => 4, "sm_product_group3_id" => 15, "active" => 1],
        ];

        foreach ($groupLinks as $groupLink) {
            SMProductGroupLink::updateOrCreate([
                'sm_product_group1_id' => $groupLink['sm_product_group1_id'],
                'sm_product_group2_id' => $groupLink['sm_product_group2_id'],
                'sm_product_group3_id' => $groupLink['sm_product_group3_id'],
            ], $groupLink);
        }


        $crBy = 0;
        $products = [
            [
                //"id"=>ProductHelper::getNextProductId(),
                "name" => "Diamond Mixed Fruit Jam 454g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 1,
                "sm_product_group2_id" => 1,
                "sm_product_group3_id" => 1
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Hilltop Honey organic multiflower honey 370g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 1,
                "sm_product_group2_id" => 1,
                "sm_product_group3_id" => 2
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Whole Earth smooth peanut butter 340g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 1,
                "sm_product_group2_id" => 1,
                "sm_product_group3_id" => 3
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Lovemore choc chip cookies 150g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 1,
                "sm_product_group2_id" => 2,
                "sm_product_group3_id" => 4
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "McVitie's Digestive biscuits 400g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 1,
                "sm_product_group2_id" => 2,
                "sm_product_group3_id" => 5
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Ritz crackers 300g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 1,
                "sm_product_group2_id" => 2,
                "sm_product_group3_id" => 6
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Chiquita Banana Ecuador", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 0,
                "has_batch" => 0,
                "sm_product_group1_id" => 2,
                "sm_product_group2_id" => 3,
                "sm_product_group3_id" => 7
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Jazz apples New Zealand 1kg", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 0,
                "has_batch" => 0,
                "sm_product_group1_id" => 2,
                "sm_product_group2_id" => 3,
                "sm_product_group3_id" => 8
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Red onion India 1Kg", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 0,
                "has_batch" => 0,
                "sm_product_group1_id" => 2,
                "sm_product_group2_id" => 4,
                "sm_product_group3_id" => 9
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Cucumber UAE 1Kg", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 0,
                "has_batch" => 0,
                "sm_product_group1_id" => 2,
                "sm_product_group2_id" => 5,
                "sm_product_group3_id" => 10
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Plum Tomatoes Intense UAE 1Kg", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 0,
                "has_batch" => 0,
                "sm_product_group1_id" => 2,
                "sm_product_group2_id" => 5,
                "sm_product_group3_id" => 11
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Lipton green tea bags 100s 150g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 3,
                "sm_product_group2_id" => 6,
                "sm_product_group3_id" => 12
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "SpinneysFOOD pure chamomile infusion tea", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 3,
                "sm_product_group2_id" => 6,
                "sm_product_group3_id" => 13
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "SpinneysFOOD Colombian red honey coffee beans 250g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 3,
                "sm_product_group2_id" => 7,
                "sm_product_group3_id" => 14
            ],
            [
                // "id"=>ProductHelper::getNextProductId(),
                "name" => "Nescafé gold instant coffee 200g", "description" => "This is description",
                "image_url" => "",
                "active" => 1,
                "cr_by" => $crBy,
                "updated_by" => $crBy,
                "has_expire_date" => 1,
                "has_batch" => 1,
                "sm_product_group1_id" => 3,
                "sm_product_group2_id" => 7,
                "sm_product_group3_id" => 15
            ],
        ];


        Storage::deleteDirectory("upload_files");





        foreach ($products as $product) {
            $pid = ProductHelper::getNextProductId();
            $product['id'] = $pid;


            $image = fake()->imageUrl(640, 480, 'food', true);

            //$filename = $pid.'.jpg';
            // $tempImage = tempnam(sys_get_temp_dir(), $filename);
            // copy($image, $tempImage);


            //Storage::disk('public')->putFile('upload_files', $tempImage);

            $product['image_url'] = $image;

            $prod = SMProduct::updateOrCreate([
                'id' => $product['id'],
            ], $product);

            $stocks = array();
            //stock
            $loop = ($prod->has_batch ? 3 : 1);
            for ($i = 0; $i < $loop; $i++) {
                $start = Carbon::now();
                $end = Carbon::parse($start)->addDays(1 + ($i * 20));



                $costPrice = fake()->randomFloat(1, 1, 20);
                $sellPrice = $costPrice + $costPrice * 0.02;

                $stock = [
                    "sm_product_id" => $prod->id,
                    "cost_price" => $costPrice,
                    "sell_price" => $sellPrice,
                    "active" => 1,
                    "stock_in_hand" => fake()->numberBetween(0, 20),
                    "exp_date" => ($prod->has_expire_date ? $end->format('Y-m-d 00:00:00') : $start->format('Y-m-d 00:00:00')),
                ];
                array_push($stocks, $stock);
            }



            foreach ($stocks as $stock) {
                $batch = ProductHelper::getNextStockBatchId($prod);
                $id = ProductHelper::getStockId($prod, $batch);

                $uniqueName = ProductHelper::getUniqueName($prod, $batch);

                $stock['id'] = $id;
                $stock['batch'] = $batch;
                $stock['unique_name'] = $uniqueName;
                $stock['barcode'] = $id;

                SMStock::updateOrCreate([
                    'id' => $stock['id'],
                ], $stock);
            }
        }
    }
}
