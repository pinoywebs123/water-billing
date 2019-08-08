<?php

use Illuminate\Database\Seeder;
use App\Model\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name'=> 'Pending']);

        Status::create(['name'=> 'Approved']);

        Status::create(['name'=> 'Working']);

        Status::create(['name'=> 'Finished']);
    }
}
