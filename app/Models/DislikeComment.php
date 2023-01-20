<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DislikeComment extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'dislikecomment';
    protected $primaryKey = 'id';
    protected $fillable = ['userId', 'commentId', 'status'];

    public function dislikeComment(){
        return $this->belongsTo("App\Models\Comment", "commentId");
    }

    public function usersId(){
        return $this->belongsTo("App\Models\User", "userId");
    }
}
