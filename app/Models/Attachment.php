<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'filetype',
        'size',
        'record_data_id'
    ];

    // public function recordData(): BelongsTo
    // {
    //     return $this->BelongsTo(RecordData::class);
    // }
}
