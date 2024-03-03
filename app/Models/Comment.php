<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $primaryKey = 'id_comment';
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
