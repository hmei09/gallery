<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $photoId = $request->input('id_photo');
        $userId = auth()->id();
    
        // Cek apakah user sudah pernah like sebelumnya
        $existingLike = Like::where('id_photo', $photoId)
                            ->where('id', $userId)
                            ->first();
    
        if (!$existingLike) {
            // Jika belum, tambahkan like ke database
            Like::create([
                'id_photo' => $photoId,
                'id' => $userId
            ]);
        } else {
            // Jika sudah, maka unlike
            $existingLike->delete();
        }
    
        return redirect()->back(); // Redirect kembali ke halaman sebelumnya
    }

}
