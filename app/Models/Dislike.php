<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    protected $table = 'dislike';
    protected $primaryKey = 'dislikeId';
    protected $fillable = ['userId', 'dislikeId', 'threadId'];
}
