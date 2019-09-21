<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'		=> 'Admin Ako',
        	'role_id'	=> 1,	
        	'email'		=> 'admin@yahoo.com',
        	'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
        ]);

        User::create([
            'name'      => 'Billing Ako',
            'role_id'   => 2,   
            'email'     => 'billing@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
        ]);

        User::create([
            'name'      => 'Cashier Ako',
            'role_id'   => 3,   
            'email'     => 'cashier@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
        ]);

        User::create([
            'name'      => 'Client Ako',
            'role_id'   => 4,   
            'email'     => 'client@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
        ]);

        User::create([
            'name'      => 'Maintenance Ako',
            'role_id'   => 5,   
            'email'     => 'maintenance@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
        ]);
    }
}
