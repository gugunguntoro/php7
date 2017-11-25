<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('articles')->insert([
        'user_id' => 1,
        'title' => 'Bumi',
        'Body' => 'Sekar'
      ]);
    }
}
