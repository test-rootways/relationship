<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasHobby extends Model
{
    use HasFactory;
    protected $table = 'user_has_hobbies';
    public $timestamps = false;
    protected $fillable = ['user_id','hobby_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /* public function hobby()
    {
        return $this->belongsToMany(Hobby::class);
    } */
}
