<?php

namespace App\Domain\CategoryRecord\Actions;

use App\Domain\CategoryRecord\Models\CategoryRecord;
use App\Domain\CategoryRecord\DataTransferObjects\UpdateCategoryRecordData;
use Spatie\LaravelData\Optional;
use Illuminate\Support\Carbon;

class UpdateCategoryRecordAction
{
    public function execute(CategoryRecord $categoryRecord, UpdateCategoryRecordData $data): CategoryRecord
    {
        $categoryRecord->update([
            'name' => $data->name,
            'slug' => $data->slug,
            'is_active' => $data->is_active,
        ]);

        return $categoryRecord;
    }
}
