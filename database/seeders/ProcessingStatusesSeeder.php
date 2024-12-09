<?php

namespace Database\Seeders;

use App\Domain\ProcessingStatuses\Models\ProcessingStatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessingStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processingStatusesNew= ProcessingStatuses::where('slug', 'new')->first();
        if(!$processingStatusesNew) {
            $processingStatusesNew = ProcessingStatuses::create([
                'name' => 'Новый',
                'slug' => 'new',
            ]);
        }

        $processingStatusesAnswered= ProcessingStatuses::where('slug', 'answered')->first();
        if(!$processingStatusesAnswered) {
            $processingStatusesAnswered = ProcessingStatuses::create([
                'name' => 'Отвечен',
                'slug' => 'answered',
            ]);
        }
    }
}
