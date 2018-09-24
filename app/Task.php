<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // ホワイトリスト
    protected $fillable = [ 'content', 'status', 10 ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
