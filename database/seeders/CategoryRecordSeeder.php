<?php

namespace Database\Seeders;

use App\Domain\CategoryRecord\Models\CategoryRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryMiddle= CategoryRecord::where('slug', 'middle')->first();
        if(!$categoryMiddle) {
            $categoryMiddle = CategoryRecord::create([
                'name' => 'Средний',
                'slug' => 'middle',
            ]);
        }

        $categoryHigh= CategoryRecord::where('slug', 'high')->first();
        if(!$categoryHigh) {
            $categoryHigh = CategoryRecord::create([
                'name' => 'Высокий',
                'slug' => 'high',
            ]);
        }
    }
}
