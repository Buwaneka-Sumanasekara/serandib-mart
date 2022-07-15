<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PMPermissions;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ar_permissions=[

            //1000 - 1099 [Customer]
            ["id"=>1000,"parent_id"=>1000,"name"=>"My Orders","display_name"=>"My Orders","description"=>"Order management of user","is_ui"=>1,"url_path"=>"","icon"=>"",'order_no'=>1],
            ["id"=>1001,"parent_id"=>1000,"name"=>"To Dispatch","display_name"=>"To Dispatch","description"=>"Order management of user:To Dispatch","is_ui"=>1,"url_path"=>"","icon"=>"",'order_no'=>1],
            ["id"=>1002,"parent_id"=>1000,"name"=>"To Receive","display_name"=>"To Receive","description"=>"Order management of user","is_ui"=>1,"url_path"=>"","icon"=>"",'order_no'=>2],
            
            //1100 - 1199
            ["id"=>1100,"parent_id"=>1100,"name"=>"My Account","display_name"=>"My Account","description"=>"User information","is_ui"=>1,"url_path"=>"","icon"=>"",'order_no'=>2],
            ["id"=>1101,"parent_id"=>1100,"name"=>"Personal Details","display_name"=>"Personal Details","description"=>"User information","is_ui"=>1,"url_path"=>"","icon"=>"",'order_no'=>1],
            ["id"=>1102,"parent_id"=>1100,"name"=>"Security Details","display_name"=>"Security Details","description"=>"User information","is_ui"=>1,"url_path"=>"","icon"=>"",'order_no'=>2],
            
            
        ];


        foreach ($ar_permissions as $permission) {
            PMPermissions::updateOrCreate([
                'id' => $permission['id']
            ],$permission);
        }
    }
}
