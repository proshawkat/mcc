<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'from', 'to', 'like_dislike', 'status'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'from')->selectRaw('id, name');
    }
}
