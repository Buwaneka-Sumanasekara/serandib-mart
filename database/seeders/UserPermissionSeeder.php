<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PMPermissions;
use App\Models\UMUserRoleHasPermissions;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //all permissions to super admin
        $ar_all_permissions=PMPermissions::get();
        foreach ($ar_all_permissions as $permission) {
            $data=["pm_permissions_id"=>$permission->id,"um_user_role_id"=>config("global.user_role_super_admin")];
            UMUserRoleHasPermissions::updateOrCreate([
                'um_user_role_id' => $data["um_user_role_id"],
                'pm_permissions_id' =>$data["pm_permissions_id"]
            ],$data);
        }


        //admin permissions
        $ar_admin_permissions=['1100','1101','1102'];
        foreach ($ar_admin_permissions as $permission) {
            $data=["pm_permissions_id"=>$permission,"um_user_role_id"=>config("global.user_role_admin")];
            UMUserRoleHasPermissions::updateOrCreate([
                'um_user_role_id' => $data["um_user_role_id"],
                'pm_permissions_id' =>$data["pm_permissions_id"]
            ],$data);
        }


        //customer permissions
        $ar_customer_permissions=['1000','1001','1002','1100','1101','1102'];
        foreach ($ar_customer_permissions as $permission) {
            $data=["pm_permissions_id"=>$permission,"um_user_role_id"=>config("global.user_role_customer")];
            UMUserRoleHasPermissions::updateOrCreate([
                'um_user_role_id' => $data["um_user_role_id"],
                'pm_permissions_id' =>$data["pm_permissions_id"]
            ],$data);
        }
    }
}
