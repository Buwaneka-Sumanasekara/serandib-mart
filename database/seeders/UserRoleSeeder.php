<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UMUserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arUserRole=[
            ["id"=>0,"name"=>"super admin"],//default role
            ["id"=>1,"name"=>"admin"],
            ["id"=>2,"name"=>"customer"],
        ];

        foreach ($arUserRole as $userRole) {
            UMUserRole::updateOrCreate([
                'id' => $userRole['id']
            ],$userRole);
        }
    }
}
