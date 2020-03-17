<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $guarded = ['id'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
}
