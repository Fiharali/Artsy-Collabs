<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseravtion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        	'description'	,'reservation_date'	,'return_date'	,'is_returned'	,'user_id'	,'book_id'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function book()
    {
        return $this->belongsTo(Book::class);

    }
}
