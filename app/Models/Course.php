<?php

namespace App\Models;

use App\Models\User;
use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
        'user_id',
        'end_date'
    ];

    public function curriculums() {
        return $this->hasMany(Curriculum::class);
    }

    public function teachers(){
        return $this->belongsToMany(User::class,'course_teacher','course_id','user_id');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
