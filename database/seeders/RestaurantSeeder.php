<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rank;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ramenRankId = Rank::where('genre_name', 'ラーメン')->value('rank');
        $insertData = [
            'ramen' => [
                1 => [
                    'rank_id' => $ramenRankId,
                    'name' => 'ラーメン龍の家',
                    'nearest_station' => '西武新宿駅',
                    'prefecture' => '東京都',
                    'city' => '新宿区',
                    'street' => '西新宿７丁目４−５ 富士野ビル1F',
                    'website' => 'https://www.tatsunoya.net/',
                    'file_name' => 'ramen.jpg',
                ],
                2 => [
                    'rank_id' => $ramenRankId,
                    'name' => '麺やいま村',
                    'nearest_station' => '巣鴨駅',
                    'prefecture' => '東京都',
                    'city' => '豊島区',
                    'street' => '巣鴨１丁目１３−３ 福沢ビル',
                    'website' => 'https://menya-imamura.com/',
                    'file_name' => 'ramen.jpg',
                ],
                3 => [
                    'rank_id' => $ramenRankId,
                    'name' => 'すごい煮干ラーメン凪 新宿ゴールデン街店本館',
                    'nearest_station' => '新宿三丁目駅',
                    'prefecture' => '東京都',
                    'city' => '新宿区',
                    'street' => '歌舞伎町１丁目１−１０ 2F',
                    'website' => 'https://n-nagi.com/',
                    'file_name' => 'ramen.jpg',
                ],
                4 => [
                    'rank_id' => $ramenRankId,
                    'name' => '風雲児',
                    'nearest_station' => '新宿駅',
                    'prefecture' => '東京都',
                    'city' => '渋谷区',
                    'street' => '代々木２丁目１４−３ 北斗第一ビル １F',
                    'website' => 'https://www.fu-unji.com/',
                    'file_name' => 'ramen.jpg',
                ],
                5 => [
                    'rank_id' => $ramenRankId,
                    'name' => 'ラーメン二郎 三田本店',
                    'nearest_station' => '田町駅',
                    'prefecture' => '東京都',
                    'city' => '港区',
                    'street' => '三田２丁目１６−４',
                    'website' => null,
                    'file_name' => 'ramen.jpg',
                ],
                6 => [
                    'rank_id' => $ramenRankId,
                    'name' => '青島食堂 秋葉原店',
                    'nearest_station' => '岩本町駅',
                    'prefecture' => '東京都',
                    'city' => '千代田区',
                    'street' => '神田佐久間町３丁目２０−１',
                    'website' => 'http://www.aoshima-ramen.co.jp/',
                    'file_name' => 'ramen.jpg',
                ],
                7 => [
                    'rank_id' => $ramenRankId,
                    'name' => '博多長浜らーめん 田中商店',
                    'nearest_station' => '六町駅',
                    'prefecture' => '東京都',
                    'city' => '足立区',
                    'street' => '一ツ家２丁目１４−６ アンスリューム 1F',
                    'website' => 'https://www.tanaka-shoten.net/',
                    'file_name' => 'ramen.jpg',
                ],
                8 => [
                    'rank_id' => $ramenRankId,
                    'name' => '創作麺工房 鳴龍',
                    'nearest_station' => '新大塚駅',
                    'prefecture' => '東京都',
                    'city' => '豊島区',
                    'street' => '南大塚２丁目３４−４ ＳＫＹ南大塚 １F',
                    'website' => 'https://gf8f400.gorp.jp/',
                    'file_name' => 'ramen.jpg',
                ],
                9 => [
                    'rank_id' => $ramenRankId,
                    'name' => '銀座 篝 本店',
                    'nearest_station' => '銀座駅',
                    'prefecture' => '東京都',
                    'city' => '中央区',
                    'street' => '銀座６丁目４−１２',
                    'website' => 'https://ginzakagari.thebase.in/',
                    'file_name' => 'ramen.jpg',
                ],
                10 => [
                    'rank_id' => $ramenRankId,
                    'name' => 'スパイス・ラー麺 卍力 西葛西本店',
                    'nearest_station' => '西葛西駅',
                    'prefecture' => '東京都',
                    'city' => '江戸川区',
                    'street' => '西葛西３丁目１６−５',
                    'website' => 'https://ramenmanriki.com/',
                    'file_name' => 'ramen.jpg',
                ],
            ]
        ];

        foreach ($insertData as $genreName => $values) {
            foreach ($values as $rank => $value) {
                $restaurant = new Restaurant();
                $insert = array_merge($value, ['rank' => $rank]);
                $restaurant->fill($insert);
                $restaurant->save();
            }
        }
    }
}
