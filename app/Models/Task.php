<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    protected $fillable = [
    'name', 
    'description',
    'created_by',
    'created_at',
    'updated_at'];

/////////////////////////////////////////////////////////////

//in tasks model we wrote the relation,
public function userRelation()
{
    return $this->belongsTo(User::class, 'created_by');
}

}