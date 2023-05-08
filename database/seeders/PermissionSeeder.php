<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[
            \Spatie\Permission\PermissionRegistrar::class
        ]->forgetCachedPermissions();

        // create permissions
        $arrayOfPermissionNames = [
            // order
            "access order",
            "create order",
            "update order",
            "delete order",
            // Users
            "access users",
            "create users",
            "update users",
            "delete users",
            // Bons livraision
            "access livraision",
            "create livraision",
            "update livraision",
            "delete livraision",
            // facture 
            "access facture",
            "create facture",
            "update facture",
            "delete facture",
            // regelement 
            "access regelement",
            "create regelement",
            "update regelement",
            "delete regelement",
            // journaux 
            "access journaux",
            "create journaux",
            "update journaux",
            "delete journaux",

        ];
        $permissions = collect($arrayOfPermissionNames)->map(function (
            $permission
        ) {
            return ["name" => $permission, "guard_name" => "exemple"];
        });

        Permission::insert($permissions->toArray());

        // create role & give it permissions
        // Role::create(["name" => "admin"])->givePermissionTo(Permission::all());
    //     Role::create(["name" => "directeur Usine"])->givePermissionTo([
    //     "access order",
    //     "create order",
    //     "update order",
    //     "delete order",
    // ]);
        Role::create(["name" => "directeur DAV"])->givePermissionTo([ "access facture",
        "create facture",
        "update facture",
        "delete facture",]);
        Role::create(["name" => "directeur Finance"])->givePermissionTo([ "access regelement",
        "create regelement",
        "update regelement",
        "delete regelement",]);
        // Assign roles to users (in this case for user id -> 1 & 2)
        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('directeur Usine');
    }
}
