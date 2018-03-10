<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'type'      =>  'admin',
            'email'     =>  'dangduylong96@gmail.com',
            'password'  =>  Hash::make('bongma00'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
            'status'    =>  1
        ]);
    }
}
