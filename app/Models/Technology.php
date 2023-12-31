<?php

namespace App\Models;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{

    use HasFactory;
    protected $guarded=[];

    public function projects(){
        return $this->belongsToMany(Project::class, 'projects_technologies');
    }

}
