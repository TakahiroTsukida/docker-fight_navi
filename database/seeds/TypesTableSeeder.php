<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $type = new \App\Admin\Type([
      'name' => 'ボクシング',
      ]);
      $type->save();

      // 2レコード
      $type = new \App\Admin\Type([
      'name' => 'キックボクシング',
      ]);
      $type->save();


      $type = new \App\Admin\Type([
      'name' => '総合格闘技',
      ]);
      $type->save();


      $type = new \App\Admin\Type([
      'name' => 'パーソナルトレーニング',
      ]);
      $type->save();


    }
}
