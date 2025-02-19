<?php

namespace App\Domain\SupportTicketRecord\Models;

use App\Domain\CategoryRecord\Models\CategoryRecord;
use App\Domain\ProcessingStatuses\Models\ProcessingStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'email',
        'message',
        'category_record_id',
        'processing_statuses_id',
    ];

    public function categoryRecord(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategoryRecord::class);
    }

    public function processingStatuses(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProcessingStatuses::class);
    }
}
