<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('ClientTableSeeder');
        $this->call('ProjectTableSeeder');
        $this->call('ProjectNoteTableSeeder');
        $this->call('ProjectTaskTableSeeder');

        Model::reguard();
    }
}
