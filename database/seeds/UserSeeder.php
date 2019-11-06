<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

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
        	'role_id'	       => 1,	
        	'email'		       => 'admin@yahoo.com',
        	'password'         => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'        => 3,
            'account_id'       => '2019-A001'
        ]);

            Profile::create([
                'user_id'	    => 1,
                'first_name'	=> 'Admin',
                'middle_name'	=> 'Ako',
                'last_name'	    => 'Ngayon',
                'birth_date'    => '1990-01-01',
                'gender'        => 'Male',
                'contact'       => '09123456789',
                'address'       => '123 Street',
                'city'          => 'Cebu City',
                'province'      => 'Cebu',
            ]);

        User::create([
            'role_id'   => 2,   
            'email'     => 'billing@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
            'account_id'       => '2019-A002'
        ]);

            Profile::create([
                'user_id'	    => 2,
                'first_name'	=> 'Billing',
                'middle_name'	=> 'Ako',
                'last_name'	    => 'Ngayon',
                'birth_date'    => '1990-01-01',
                'gender'        => 'Male',
                'contact'       => '09123456789',
                'address'       => '123 Street',
                'city'          => 'Cebu City',
                'province'      => 'Cebu',
            ]);

        User::create([
            'role_id'   => 3,   
            'email'     => 'cashier@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
            'account_id'       => '2019-A003'
        ]);

            Profile::create([
                'user_id'	    => 3,
                'first_name'	=> 'Cashier',
                'middle_name'	=> 'Ako',
                'last_name'	    => 'Ngayon',
                'birth_date'    => '1990-01-01',
                'gender'        => 'Male',
                'contact'       => '09123456789',
                'address'       => '123 Street',
                'city'          => 'Cebu City',
                'province'      => 'Cebu',
            ]);

        User::create([
            'role_id'   => 4,   
            'email'     => 'client@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
            'account_id'       => '2019-A004'
        ]);

            Profile::create([
                'user_id'	    => 4,
                'first_name'	=> 'Client',
                'middle_name'	=> 'Ako',
                'last_name'	    => 'Ngayon',
                'birth_date'    => '1990-01-01',
                'gender'        => 'Male',
                'contact'       => '09123456789',
                'address'       => '123 Street',
                'city'          => 'Cebu City',
                'province'      => 'Cebu',
            ]);

        User::create([
            'role_id'   => 5,   
            'email'     => 'maintenance@yahoo.com',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status_id'   => 3,
            'account_id'       => '2019-A005'
        ]);

            Profile::create([
                'user_id'	    => 5,
                'first_name'	=> 'Maintenance',
                'middle_name'	=> 'Ako',
                'last_name'	    => 'Ngayon',
                'birth_date'    => '1990-01-01',
                'gender'        => 'Male',
                'contact'       => '09123456789',
                'address'       => '123 Street',
                'city'          => 'Cebu City',
                'province'      => 'Cebu',
            ]);
    }
}
