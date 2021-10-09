<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "todos";
    protected $fillable = [
        'id', 'startdate', 'deadline', 'todo',
        'subtitle', 'created_at', 'updated_at',
        'deleted_at'
    ];
}
