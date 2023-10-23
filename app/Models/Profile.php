<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Task;

class Profile extends Model
{
    protected $fillable = [
        'phone_number',
        'profile_picture_data',
        'created_by_p'];
    // use HasFactory;
    //if timestamps are not req
    public $timestamps = false;


    public function profileRelationWithUser()
{
    return $this->belongsTo(User::class, 'created_by_p');
    // foreign key column named 'created_by_p' in the tasks table that links to the
    // .. id column in the users table.
}
}
