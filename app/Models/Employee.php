<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\JobTitle;

class Employee extends Model
{
    use HasFactory;

    /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'age',
        'salary',
        'adress',
        'experience',
        'phone',
        'job_title_id',
        'department_id',
    ];

    /**
     * Атрибуты, которые должны быть типизированы.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Атрибуты, которые должны быть типизированы.
     *
     * @var array
     */
    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    /**
     * Атрибуты, которые должны быть типизированы.
     *
     * @var array
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
