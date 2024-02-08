<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $fillable=[
        'title',
        'description',
        'image',
        'partner_id',
    ];



    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
