<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    // definir la relacion entre entry y user va a ser N a 1
    public function user() {
        return $this->belongsTo(User::class);
    }
}
