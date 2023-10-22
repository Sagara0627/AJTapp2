<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Restaurant;

class UpdateImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:image {rank_id} {rank} {file_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a image for displaying ranking website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info('画像更新 開始');

        try {
            $restaurant = Restaurant::where('rank_id', $this->argument('rank_id'))
                ->where('rank', $this->argument('rank'))
                ->update(['file_name' => $this->argument('file_name')]);

            \Log::info('画像更新 終了', ['restaurant' => $restaurant]);
        } catch (Throwable $e) {
            \Log::error('画像更新 失敗', [
                'message' => $e->getMessage(),
            ]);
        }
    }
}
