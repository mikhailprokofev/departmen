<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobTitle;
use App\Models\Employee;

class Department extends Model
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
        'title',
        'description',
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
        return $this->hasMany(JobTitle::class);
    }

    /**
     * Атрибуты, которые должны быть типизированы.
     *
     * @var array
     */
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
