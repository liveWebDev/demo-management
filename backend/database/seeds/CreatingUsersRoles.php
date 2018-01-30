<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatingUsersRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = Role::create([
        'name' => 'administrator'
      ]);
  
      $permission = Permission::create(['name' => 'view-user']);
      $permission = Permission::create(['name' => 'add-user']);
      $permission = Permission::create(['name' => 'edit-user']);
      $permission = Permission::create(['name' => 'del-user']);
      $admin->givePermissionTo(['view-user','add-user','edit-user','del-user']);
      
      $transport = Role::create([
        'name' => 'transport-officer',
      ]);

      $transport->givePermissionTo(['view-user']);

      $driver = Role::create([
        'name' => 'forklift-driver',
      ]);
      $driver->givePermissionTo(['view-user']);
      
  
    }
}
