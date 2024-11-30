<?php

namespace App\Domain\Role\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\Model;

class Role extends SpatieRole
{
    use HasFactory;

    public const ADMIN_ROLE = 'admin';
    public const EDITOR_ROLE = 'editor';
    public const READER_ROLE = 'reader';
}
