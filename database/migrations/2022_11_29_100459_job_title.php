<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Сотрудники
        Schema::create('job_titles', function (Blueprint $table) {
            $table->id();
            // Название (publicAPI)
            $table->string('title')->unique();
            // Описание (publicAPI)
            $table->string('description');
            
            // Инструкция (privateAPI)
            $table->string('job_description')->nullable();
            // Базовый оклад (privateAPI)
            $table->string('base_salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_titles');
    }
};
