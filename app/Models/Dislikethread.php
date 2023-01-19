<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislikethread extends Model
{
    use HasFactory;

    protected $table = 'dislikethread';
    protected $primaryKey = 'id';
    protected $fillable = ['userId', 'dislikethreadId', 'threadId' ,'status'];
    
    
    public function dislikelikeThread(){
        return $this->belongsTo("App\Models\Thread", "threadId");
    }

    public function userid(){
        return $this->belongsTo("App\Models\User", "userId");
    }
}
