<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImagesController
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image']
        ]);

        if ($request->oldImageLink) {
            if (substr($request->oldImageLink, 0, 7) != "http://" || substr($request->oldImageLink, 0, 8) != "https://") {
                try {
                    Storage::delete($request->oldImageLink);
                } catch (Exception $e) {
                    Log::error($e->getMessage());
                }
                
            }
        }
       
        $path = $request->image->store('images', [
                'visibility' => 'public',
            ]
        );

        return response($path, 200);
    }
}