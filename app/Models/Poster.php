<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    protected $table = 'poster_table';

    public function movie(){
        return $this->belongTo(Movie::class);
        // return $this->belongTo(App\Models\Movie, "id");
    }

}
