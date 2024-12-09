<?php

namespace App\Domain\SupportTicketRecord\Models;

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
}
