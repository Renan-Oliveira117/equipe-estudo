<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $guarded = ['id'];
    
    public function alunos() 
    { 
        return  $this->belongsToMany(Aluno::class); 
    } 
    
    public function professor() 
    { 
        return  $this->hasOne(Professor::class); 
    }
}
