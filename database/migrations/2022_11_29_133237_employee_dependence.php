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
        Schema::table('employees', function (Blueprint $table) {
            // Должность (publicAPI)
            $table->foreignId('job_title_id')
                ->nullable(true)
                    ->constrained();
            
            // Отдел (publicAPI)
            $table->foreignId('department_id')
                ->nullable(true)
                    ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('job_title_id');
            $table->dropForeign('department_id');
        });
    }
};
