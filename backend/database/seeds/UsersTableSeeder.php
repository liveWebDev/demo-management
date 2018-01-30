<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // 1. query the Roles by the slug
    $adminRole = Role::findByName('administrator')->first();
    $managerRole = Role::findByName('transport-officer')->first();
    $ownerRole = Role::findByName('forklift-driver')->first();
  
    $admin = User::create([
      'first_name' => 'admin',
      'last_name' => 'last',
      'email' => 'admin@erbium.ch',
      'password' => 'pass22',
      'type' => 1,
    ]);
    
    $admin->assignRole($adminRole);
  
    $manager = User::create([
      'first_name' => 'transport',
      'last_name' => 'officer',
      'email' => 'transport@erbium.ch',
      'password' => 'pass22',
      'type' => 2
    ]);
    $manager->assignRole($managerRole);
  
    $owner = User::create([
      'first_name' => 'forklift',
      'last_name' => 'driver',
      'email' => 'forklift@erbium.ch',
      'password' => 'pass22'
    ]);
    $owner->assignRole($ownerRole);
  
    //factory(User::class, 50)->create()->attachRole($customerRole);
  }
}
