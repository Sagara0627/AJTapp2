<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\File;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fileNames = [
            'sushi',
            'ramen',
            'sashimi',
            'tenpura',
            'udon',
            'soba',
            'okonomiyaki',
            'yakitori',
            'raceBall',
            'syabusyabu',
        ];

        // ジャンル別ランキングサイトに表示する画像を登録
        foreach ($fileNames as $i => $fileName) {
            $file = new File();
            $file->fill([
                'genre' => $fileName,
                'genre_rank' => $i + 1,
                'file_path' => "{$fileName}.jpg",
                'file_type' => File::OUTSIDE_GENRE,
                'rank' => $i + 1,
            ]);
            $file->save();
        }

        // ジャンル内ランキングサイトに表示する画像を登録
        foreach ($fileNames as $i => $fileName) {
            for ($rank = 1; $rank <= 10; $rank++) {
                $file = new File();
                $file->fill([
                    'genre' => $fileName,
                    'genre_rank' => $i + 1,
                    'file_path' => "{$fileName}.jpg",
                    'file_type' => File::WITHIN_GENRE,
                    'rank' => $rank,
                ]);
                $file->save();
            }
        }
    }
}
