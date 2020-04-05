<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name', 100);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
        $this->initializeTable('income_categories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_categories');
    }

    /**
     * Initialize table with some data
     *
     * @param $table
     */
    public function initializeTable($table)
    {
        DB::table($table)->truncate();
        DB::table($table)->insert([
            ['category_name' => 'Salary', 'created_by' => 1],
            ['category_name' => 'Loan', 'created_by' => 1],
            ['category_name' => 'Lent Return', 'created_by' => 1]
        ]);
    }
}
