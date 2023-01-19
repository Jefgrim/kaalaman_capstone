<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    use HasFactory;
    protected $table = 'likecomment';
    protected $primaryKey = 'id';
    protected $fillable = ['userId', 'commentId', 'status'];

    public function likeComment(){
        return $this->belongsTo("App\Models\Comment", "commentId");
    }

    public function usersId(){
        return $this->belongsTo("App\Models\User", "userId");
    }
}
