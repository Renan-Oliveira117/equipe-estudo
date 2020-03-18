<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $guarded = ['id'];
        
    public function curso() 
    { 
        return  $this->hasOne(Curso::class); 
    }
}
