<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use App\Models\Department;
use App\Models\Employee;

class JobTitle extends Model
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
        'job_description',
        'base_salary',
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
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Атрибуты, которые должны быть типизированы.
     *
     * @var string
     */
    public function departmentTitle()
    {
        return DB::table('departments')
            ->where('id', '=', $this->department_id)
                ->get('title');
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
