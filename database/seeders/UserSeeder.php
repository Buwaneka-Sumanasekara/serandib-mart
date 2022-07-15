<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

use App\Models\UMUser;
use App\Models\UMUserLogin;
use App\Models\CMCustomer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ar_users=[
            ["id"=>0,"first_name"=>"Super","mid_name"=>"","last_name"=>"Admin","um_user_status_id"=>config("global.user_status_active"),"um_user_role_id"=>config("global.user_role_super_admin"),"email"=>"buwanekasumanasekara@gmail.com","is_verified"=>1],
            ["id"=>1,"first_name"=>"Sahan","mid_name"=>"","last_name"=>"Wijesekara","um_user_status_id"=>config("global.user_status_active"),"um_user_role_id"=>config("global.user_role_admin"),"email"=>"buwaneka@interlective.com","is_verified"=>1],
            
        ];


        if (App::environment('local')) {
            array_push($ar_users, ["id"=>1,"first_name"=>"Test","mid_name"=>"Customer","last_name"=>"Name","um_user_status_id"=>config("global.user_status_active"),"um_user_role_id"=>config("global.user_role_customer"),"email"=>"buwaneka@interlective.com","is_verified"=>1],
        );
        }

        foreach ($ar_users as $user) {
            UMUser::updateOrCreate([
                'id' => $user['id']
            ],$user);

            $username=$user["email"];
            if($user['id']==0){
                $username="admin";
            }
            $user_login=[
                "id"=>$user['id'],
                "username"=>$username,
                "password"=>Hash::make('123'),
                "um_user_id"=>$user['id']
            ];
            UMUserLogin::updateOrCreate([
                'id' => $user_login['id']
            ],$user_login);

            if($user['um_user_role_id']===config("global.user_role_customer")){
                $customer=[
                    "id"=>$user['id'],
                    "no_of_orders"=>0,
                    "total_order_value"=>0,
                    "um_user_id"=>$user['id']
                ];
                CMCustomer::updateOrCreate([
                    'id' => $customer['id']
                ],$customer);
            }
        }
    }
}
