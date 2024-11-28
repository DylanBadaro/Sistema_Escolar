<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'course_id']; // Asegúrate de incluir 'course_id' aquí

    // Relación con los cursos
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function courseStudents()
{
    return $this->hasMany(CourseStudent::class);
}
}