<?php

namespace App\Domain\ProcessingStatuses\Models;

use App\Domain\SupportTicketRecord\Models\SupportTicketRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingStatuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'name',
        'slug',
    ];

    public function supportTicketRecord(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SupportTicketRecord::class);
    }

}
