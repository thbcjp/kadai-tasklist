<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // ホワイトリスト
    protected $fillable = [ 'content', 'user_id', 'status' ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
