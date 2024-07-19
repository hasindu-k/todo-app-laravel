<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tag', 'task_id', 'tag_id');
    }
}
