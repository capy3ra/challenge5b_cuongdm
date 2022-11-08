<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = "assignments";

    protected $fillable = [
        'description',
        'title',
        'path',
    ];

    public function submission(){
        return $this->hasOne('App\Models\Submission', 'assignment_id', 'id');
    }
}
