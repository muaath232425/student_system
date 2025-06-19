<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'subject_id',
        'teacher_id',
    ];

    // 🔗 Relationship to Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // 🔗 Relationship to Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
