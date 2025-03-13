<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            return response()->json(['url' => Storage::url($path)]);
        }
        return response()->json(['error' => 'File not uploaded'], 400);
    }
}

