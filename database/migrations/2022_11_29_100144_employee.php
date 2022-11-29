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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // Имя (publicAPI)
            $table->string('name');
            // Почта (publicAPI)
            $table->string('email')->unique();
            
            // Возраст (privateAPI)
            $table->tinyInteger('age');
            // Оклад (privateAPI)
            $table->integer('salary');
            // Адресс (privateAPI)
            $table->string('adress');
            // Стаж (privateAPI)
            $table->string('experience');
            // Телефон (privateAPI)
            $table->string('phone');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
};
