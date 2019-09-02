<?php

use App\Models\Video;
use Illuminate\Database\Seeder;

class StatisticsVideosSeeder extends Seeder
{
    private $videos = [
        'Ic9IzEURPrk' => 'КВН статистика (экспресс). Первая 1/2 Премьер-лиги 2019',
        '-y8YCBjxjLk' => 'КВН статистика (экспресс). Вторая 1/4 Премьер-лиги 2019',
        '1XKejPGnW9A' => 'КВН статистика (экспресс). Первая 1/4 Премьер-лиги 2019',
        'jLENN1IHfuo' => 'КВН статистика. Итоги этапа 1/8 Премьер-лиги 2019',
        'gTvixJ-fA8A' => 'КВН статистика. Итоги этапа 1/4 Высшей лиги 2019'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->videos as $youtubeId => $title) {
            Video::updateOrCreate([
                'youtube_id' => $youtubeId
            ],
            [
                'title' => $title
            ]);
        }

        $this->command->info('Videos seeded successfully');
    }
}
