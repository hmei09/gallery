<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'like';
    protected $primaryKey = 'id_like';
    protected $guarded = [

    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class, 'id_photo');
    }   

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }   


}
