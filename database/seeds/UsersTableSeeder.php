<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



        $data = array(
            [
                'name' => 'Manager',
                'authority'=>'Manager',
                'email' => 'Manager@gmail.com',
                'password' =>  bcrypt('123456'),
                'created_at'=>Carbon::create('2018', '01', '16'),
             //   'remember_token'=>'X2Y/YTontP74TWUC5L6pLlgYQ/HuyPC6OGh4Xx8R2Hc='
            ],
            [
                'name' => 'Reception',
                'authority'=>'Reception',
                'email' => 'Reception@gmail.com',
                'password' =>  bcrypt('123456'),
                'created_at'=>Carbon::create('2018', '01', '16'),
              //  'remember_token'=>'X2Y/YTontP74TWUC5L6pLlgYQ/HuyPC6OGh4Xx8R2Hc='
            ],
            [
                'name' => 'HouseKeeper',
                'authority'=>'HouseKeeper',
                'email' => 'HouseKeeper@gmail.com',
                'password' => bcrypt('123456'),
                'created_at'=>Carbon::create('2018', '01', '16'),
            ],

        );
        DB::table('users')->insert($data);

    }
}
