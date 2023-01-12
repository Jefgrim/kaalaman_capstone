<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Thread extends Model
{
    use HasFactory;
    protected $table = 'thread';
    protected $primaryKey = 'threadId';
    protected $fillable = ['userId', 'threadpost', 'title', 'category', 'threadId'];

    public function users(){
        return $this->belongsTo("App\Models\User", "userId");
    }
}
