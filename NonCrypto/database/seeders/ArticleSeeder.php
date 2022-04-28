<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tags;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()
            ->count(10)
            ->state(new Sequence(
                ['name' => 'Doge'],
                ['name' => 'Bit'],
                ['name' => 'Fresh'],
            ))
            ->create();
            // ->hasTag(10)
    }
}
