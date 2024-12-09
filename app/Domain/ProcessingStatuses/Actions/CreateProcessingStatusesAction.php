<?php

namespace App\Domain\ProcessingStatuses\Actions;

use App\Domain\ProcessingStatuses\DataTransferObjects\CreateProcessingStatusesData;
use App\Domain\ProcessingStatuses\Models\ProcessingStatuses;
use App\Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class CreateProcessingStatusesAction
{
    public function execute(User $user, CreateProcessingStatusesData $data): void
    {
        DB::transaction(function () use ($user, $data) {
            ProcessingStatuses::create([
                'name' => $data->name,
                'slug' => $data->slug,
                'is_active' => $data->is_active,
            ]);
        });

    }
}
