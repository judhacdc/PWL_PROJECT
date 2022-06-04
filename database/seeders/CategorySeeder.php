<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['nama' => 'obat',],
            ['nama' => 'perlengkapan kesehatan',],
        ];

        DB::table('category')->insert($category);
    }
}
