<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    protected $table = 'todo_status';

    public function todo()
    {
        return $this->hasMany(Todo::class);
    }
}
