<?php

namespace App\Models;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
 protected $fillable = [
  'comment_id', 'reply'
 ];

 public function comment()
 {
  return $this->belongsTo(Comment::class);
 }
}