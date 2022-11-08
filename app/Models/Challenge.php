<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $table = "challenges";

    protected $fillable = [
        'title',
        'hint',
        'path'
    ];

    // public function submission(){
    //     return $this->hasOne('App\Models\Submission', 'assignment_id', 'id');
    // }
}
