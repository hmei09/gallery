public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Mendapatkan pengguna dari permintaan
        $user = $request->user();
    
        // Mengisi atribut pengguna dengan data yang valid dari permintaan
        $user->fill($request->validated());
    
        // Mengecek apakah email berubah, dan jika ya, mengatur ulang verifikasi email
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
                
        $request->user()->deskripsi = $request->deskripsi;        
        
        if ($request->hasFile('photo_profile')) {
            
            // Mengambil file foto dari permintaan
            $photo = $request->file('photo_profile');
    
            // Menghasilkan nama unik untuk file foto
            $photoName = time() . '_' . $photo->getClientOriginalName();
    
            // Menyimpan file foto ke dalam path public/images dengan nama yang unik
            $photo->move(public_path('images'), $photoName);

            if ($user->photo_profile) {
                $oldPhotoPath = public_path('images/' . $user->photo_profile);
                if (File::exists($oldPhotoPath)) {
                    File::delete($oldPhotoPath);
                }
            }
    
            // Menyimpan nama file foto ke dalam atribut photo_profile pengguna
            $user->photo_profile = $photoName;
        }

        // Menyimpan perubahan ke dalam database
        $user->save();
    
        // Mengembalikan respons dengan pengalihan ke halaman edit profil
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
