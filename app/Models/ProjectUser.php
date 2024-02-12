<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    protected $table = 'project_user';

    // Define the relationship to access the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to access the project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }



    protected $fillable = [
        'project_id'	,'user_id'
    ];


}
