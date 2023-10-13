<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rank;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            ['寿司' => 'sushi'],
            ['ラーメン' => 'ramen'],
            ['刺身' => 'sashimi'],
            ['天ぷら' => 'tenpura'],
            ['うどん' => 'udon'],
            ['そば' => 'soba'],
            ['お好み焼き' => 'okonomiyaki'],
            ['焼き鳥' => 'yakitori'],
            ['おにぎり' => 'raceBall'],
            ['しゃぶしゃぶ' => 'syabusyabu'],
        ];

        foreach ($names as $i => $array) {
            foreach ($array as $genreName => $fileName) {
                $rank = new Rank();
                $rank->fill([
                    'rank' => $i + 1,
                    'genre_name' => $genreName,
                    'file_name' => "{$fileName}.jpg",
                ]);
                $rank->save();
            }
        }
    }
}
