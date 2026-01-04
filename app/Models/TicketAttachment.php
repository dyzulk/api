<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAttachment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'ticket_reply_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
    ];

    public function reply()
    {
        return $this->belongsTo(TicketReply::class, 'ticket_reply_id');
    }

    protected $appends = ['download_url'];

    public function getDownloadUrlAttribute()
    {
        // Legacy: if it's already a full URL, return it
        if (filter_var($this->file_path, FILTER_VALIDATE_URL)) {
             return $this->file_path;
        }

        // Secure: return the API endpoint
        // Assuming route prefix is /api (standard Laravel)
        return url("/api/support/attachments/{$this->id}");
    }
}
