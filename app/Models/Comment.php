<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable = ['userId', 'commentId', 'threadId', 'comment'];

    public function threadcomment(){
        return $this->belongsTo("App\Models\Thread", "threadId");
    }

    public function userscomment(){
        return $this->belongsTo("App\Models\User", "userId");
    }
}
