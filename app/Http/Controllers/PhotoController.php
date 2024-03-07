<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Photo;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{

    public function index() {
        $photo = Photo::latest()->get();

        return view('frontend.home-page', compact('photo'));
    }

    public function index2() {
         // Ambil ID pengguna yang sedang diautorisasi
    $userId = auth()->id();
    
    // Ambil foto-foto yang dimiliki oleh pengguna yang sedang diautorisasi
    $myphoto = Photo::where('id', $userId)->latest()->get();

        return view('frontend.myphoto-page', compact('myphoto'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $hashedName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
        
        $request->file('photo')->move('images', $hashedName);
        
        $photo = Photo::create([
            'id' => $request->id_user,
            'photo' => $hashedName,
            'judul' => $request->title,
            'desk' => $request->description,
        ]);
    
        return redirect()->route('photo.detail', ['id_photo' => $photo->id_photo])->with('success', 'Photo has been uploaded successfully.');
    }

    function detail($id_photo){
        $photo = Photo::find($id_photo);
        $comments = Comment::where('id_photo', $id_photo)->get();
        $likeCount = Like::where('id_photo', $id_photo)->count();
        return view('frontend.photo-page', compact('photo', 'comments', 'likeCount'));
    }

    public function edit($id_photo)
    {
        $photo = Photo::find($id_photo);
        return view('frontend.photo-edit-page', compact('photo',));
    }

    public function update($id_photo, Request $request)
    {
        $photo = Photo::find($id_photo);

        if (!$photo) {
            return response()->json(['message' => 'Photo not found.'], 404);
        }

        // Validasi data yang diterima dari formulir
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $isChanged = false;

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($photo->photo) {
                $fotoPath = public_path('images/' . $photo->photo);
                if (File::exists($fotoPath)) {
                    File::delete($fotoPath);
                }
            }

            // Simpan foto baru
            $photoFile = $request->file('photo');
            $fotoName = time() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('images/'), $fotoName);
            $photo->photo = $fotoName;
            $isChanged = true;
        }

        // Update data foto
        $photo->judul = $request->input('title');
        $photo->desk = $request->input('description');

        // Simpan perubahan pada foto
        $photo->save();

        // Redirect dengan pesan sukses jika berhasil diubah
        return redirect()->route('photo.detail', ['id_photo' => $photo->id_photo])->with('success', 'Photo updated successfully.');
    }

    function destroy(Request $request, $id_photo) {
        Comment::where('id_photo', $id_photo)->delete();
        
        $data = Photo::find($id_photo);
        $photo = $data->photo;
        if ($photo) {
            $path = public_path('images/' . $photo);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $data->delete();

        return redirect()->route('photo.index2')->with('success', 'Data Berhasil Di Hapus');
    }
}


