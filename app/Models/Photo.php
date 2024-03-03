<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photo';
    protected $primaryKey = 'id_photo';
    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    } 
    public function comment() {
        return $this->hasMany(Comment::class);
    }   
    
}
