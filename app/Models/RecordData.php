<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Mail\Mailables\Content;

class RecordData extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'create_date',
        'reference_code',
        'location_id',
        'content_type_id',
        'media_type_id',
        'carrier_type_id',
        'creator',
        'description',
        'language_id',
        'parent_id',
        'user_id',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function contentType(): BelongsTo
    {
        return $this->BelongsTo(ContentType::class);
    }

    public function mediaType(): BelongsTo
    {
        return $this->BelongsTo(MediaType::class);
    }

    public function carrierType(): BelongsTo
    {
        return $this->BelongsTo(CarrierType::class);
    }

    public function location(): BelongsTo
    {
        return $this->BelongsTo(Location::class);
    }

    public function language(): BelongsTo
    {
        return $this->BelongsTo(Language::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(RecordData::class, 'parent_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function attachments(): HasMany
    // {
    //     return $this->HasMany(Attachment::class);
    // }
}
