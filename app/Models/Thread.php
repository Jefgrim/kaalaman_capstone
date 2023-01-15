<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Thread extends Model
{
    use HasFactory;
    protected $table = 'thread';
    protected $primaryKey = 'id';
    protected $fillable = ['userId', 'threadpost', 'title', 'category', 'id'];

    public function users(){
        return $this->belongsTo("App\Models\User", "userId");
    }
}
