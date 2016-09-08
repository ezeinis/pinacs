<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attachment;
use App\Http\Requests;

class DownloadsController extends Controller
{
    public function downloadFile($attachment_id)
    {
        $attachment = Attachment::find($attachment_id);
        $path = public_path($attachment->file_path);

        return response()->download($path);
    }
}
