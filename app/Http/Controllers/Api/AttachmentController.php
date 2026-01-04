<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TicketAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    /**
     * Download a private attachment.
     */
    public function download(Request $request, TicketAttachment $attachment)
    {
        $user = $request->user();

        // 1. Authorization Logic
        // Load relationships needed for checking
        $attachment->load(['reply.ticket']);
        $ticket = $attachment->reply->ticket;

        // Check if user is owner of the ticket OR is Admin/Owner
        if ($ticket->user_id !== $user->id && !$user->isAdminOrOwner()) {
            abort(403, 'Unauthorized access to this attachment.');
        }

        // 2. Fetch File from Private R2 Bucket
        // We assume new uploads store 'relative/path.ext' in DB
        // But legacy uploads stored 'https://cdn...'
        
        $path = $attachment->file_path;
        $disk = 'r2-private';

        // Detect if it's a full public URL (Legacy) or Relative Path (New)
        if (filter_var($path, FILTER_VALIDATE_URL)) {
             // It's a URL. It might be on the Public Bucket (old uploads).
             // Strategy: Redirect to public URL? Or try to serve it?
             // Since legacy files are on Public Bucket, we can just redirect or return URL.
             // But if specific requirement is "Attachment Private", we should ideally migrate them.
             // For now, if it's a URL, we assume it's public and redirect.
             return redirect($path);
        }

        // It is a relative path intended for Private Bucket
        if (!Storage::disk($disk)->exists($path)) {
            abort(404, 'File not found on secure storage.');
        }

        return Storage::disk($disk)->download($path, $attachment->file_name);
    }
}
