<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public function tasks()
    {
        return $this->belongsTo(People::class, 'executor', 'id');
    }
   
    public function getPeopleTask(){
        if ( $this->tasks !== null ) {
            return $this->tasks->title;
        } else {
            return 'Нету исполнителя';
        }
    }
}
