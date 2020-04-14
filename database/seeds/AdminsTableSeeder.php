<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
          'name'              => 'admin',
          'gender'            => '男性',
          'birthday'          => '1994-01-19',

          'email'             => 'admin@example.com',
          'password'          => Hash::make('12345678'),

          'company_name'      => 'admin株式会社',
          'tel'               => '0312345678',
          'address_number'    => '9200933',
          'address_ken'       => '石川県',
          'address_city'      => '金沢市',
          'web'               => 'https://kbsboxing.site',

          'remember_token'    => Str::random(10),
      ]);
    }
}
