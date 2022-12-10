<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'hobbies';
    public $timestamps = false;
    /* public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userhashobby()
    {
        return $this->belongsToMany(UserHasHobby::class);
    } */
}
