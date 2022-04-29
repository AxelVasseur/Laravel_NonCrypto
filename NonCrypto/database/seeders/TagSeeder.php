<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'free',
        ]);
        DB::table('tags')->insert([
            'name' => 'green',
        ]);
        DB::table('tags')->insert([
            'name' => 'weird',
        ]);
    }
}
