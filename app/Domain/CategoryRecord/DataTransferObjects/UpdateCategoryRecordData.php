<?php

namespace App\Domain\CategoryRecord\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateCategoryRecordData extends Data
{
    public function __construct(
        readonly ?string $name,
        readonly ?string $slug,
        readonly bool $is_active = true,
    ) {
    }

    public static function rules(): array
    {
        return [

        ];
    }
}
