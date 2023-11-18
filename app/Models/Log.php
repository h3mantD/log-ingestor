<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

// use Illuminate\Database\Eloquent\Model;

final class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'message',
        'resourceId',
        'traceId',
        'spanId',
        'commit',
        'metadata',
        'timestamp',
    ];
}
