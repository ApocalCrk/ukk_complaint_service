<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    protected $table = 'chat';
    protected $fillable = ['id_send', 'id_reci', 'message'];


    public function user(){
        return $this->BelongsTo('App\User', 'id_reci', 'id');
    }
}
