<?php

namespace App\Domain\CategoryRecord\Actions;

use App\Domain\CategoryRecord\DataTransferObjects\CreateCategoryRecordData;
use App\Domain\CategoryRecord\Models\CategoryRecord;
use App\Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class CreateCategoryRecordAction
{
    public function execute(User $user, CreateCategoryRecordData $data): void
    {
        DB::transaction(function () use ($user, $data) {
            CategoryRecord::create([
                'name' => $data->name,
                'slug' => $data->slug,
                'is_active' => $data->is_active,
            ]);
        });

    }
}
