<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    // definir la relacion entre entry y user va a ser N a 1
    public function user() {
        return $this->belongsTo(User::class);
    }

    // crear un mutator para el slug
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // para q el controller busque por ese campo en vez de por el id
    public function getRouteKeyName() {
         return 'slug';
    }

    // esto es para q desde las views sea más cómodo y no haya q escribir tanto
    public function getUrl() {
        return url('entries/'.$this->slug.'-'.$this->id);
    }
}
