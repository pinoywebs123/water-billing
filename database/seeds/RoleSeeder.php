<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::create([
        	'name'	=> 'Admin'
        ]);
        Role::create([
        	'name'	=> 'Billing'
        ]);
        Role::create([
        	'name'	=> 'Cashier'
        ]);
        Role::create([
        	'name'	=> 'Client'
        ]);
        Role::create([
        	'name'	=> 'Maintenance'
        ]);
    }
}
