<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function subjectChoice(){
        return $this->hasMany(SubjectChoice::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
