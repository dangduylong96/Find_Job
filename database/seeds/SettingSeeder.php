<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[];
        DB::table('settings')->insert([
            'name'      =>  'city',
            'key'       =>  1,
            'value'     =>  json_encode($arr)
        ]);
    }
}
