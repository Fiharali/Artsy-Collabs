<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    protected $table = 'project_user';


    const STATUS = [
        '1' => 'accepted',
        '0' => 'refused',
    ];

    protected $fillable = [
        'description'	,'reservation_date'	,'return_date'	,'is_returned'	,'user_id'	,'book_id'
    ];


}
