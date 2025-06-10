<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
                // Cek apakah ini thumbnail atau gambar untuk konten
                if ($request->has('is_thumbnail') && $request->is_thumbnail == true) {
                    // Simpan gambar di folder 'thumbnails' dalam 'public/storage'
                    $path = $request->file('attachment')->store('thumbnails', 'public');
                } else {
                    // Simpan gambar di folder 'images' dalam 'public/storage'
                    $path = $request->file('attachment')->store('images', 'public');
                }

                // Kembalikan URL file yang sudah diupload
                return response()->json(['url' => Storage::url($path)]);
            }

            return response()->json(['error' => 'File not uploaded or invalid'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Upload failed: ' . $e->getMessage()], 500);
        }
    }
}
