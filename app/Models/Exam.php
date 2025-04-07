<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "date",
        "course_id",
    ];

    // La relation 'belongsTo' pour relier un examen à un cours
    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }
}
