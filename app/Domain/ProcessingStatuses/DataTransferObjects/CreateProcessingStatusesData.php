<?php

namespace App\Domain\ProcessingStatuses\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class CreateProcessingStatusesData extends Data
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
