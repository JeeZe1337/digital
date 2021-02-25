<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
      public function people()
      {
          return $this->belongsTo(People::class, 'executor', 'id');
      }
      public function jobs()
      {
          return $this->belongsTo(Jobs::class, 'status', 'id');
      }
}
