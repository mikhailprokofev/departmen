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
            $table->foreignId('job_titles_id')
                ->constrained()
                    ->nullable();
            
            // Отдел (publicAPI)
            $table->foreignId('departments_id')
                ->constrained()
                    ->nullable();
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
            $table->dropForeign('job_titles_id');
            $table->dropForeign('departments_id');
        });
    }
};
