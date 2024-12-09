<?php

namespace App\Domain\ProcessingStatuses\Actions;

use App\Domain\ProcessingStatuses\Models\ProcessingStatuses;
use App\Domain\ProcessingStatuses\DataTransferObjects\UpdateProcessingStatusesData;
use Spatie\LaravelData\Optional;
use Illuminate\Support\Carbon;

class UpdateProcessingStatusesAction
{
    public function execute(ProcessingStatuses $processingStatuses, UpdateProcessingStatusesData $data): ProcessingStatuses
    {
        $processingStatuses->update([
            'name' => $data->name,
            'slug' => $data->slug,
            'is_active' => $data->is_active,
        ]);

        return $processingStatuses;
    }
}
