<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likethread extends Model
{
    use HasFactory;

    protected $table = 'likethread';
    protected $primaryKey = 'id';
    protected $fillable = ['userId', 'likethreadId', 'threadId' ,'status'];
    
    
    public function likeThread(){
        return $this->belongsTo("App\Models\Thread", "threadId");
    }

    public function userid(){
        return $this->belongsTo("App\Models\User", "userId");
    }

}
