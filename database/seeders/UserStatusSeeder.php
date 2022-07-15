<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UMUserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arUserStatus=[
            ["id"=>0,"name"=>"pending"],
            ["id"=>1,"name"=>"active"],
            ["id"=>2,"name"=>"blocked"]
        ];

        foreach ($arUserStatus as $userStatus) {
            UMUserStatus::updateOrCreate([
                'id' => $userStatus['id']
            ],$userStatus);
        }
    }
}
