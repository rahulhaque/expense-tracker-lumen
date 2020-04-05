<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name', 100);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
        $this->initializeTable('expense_categories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_categories');
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
            ['category_name' => 'Lent', 'created_by' => 1],
            ['category_name' => 'Loan Return', 'created_by' => 1]
        ]);
    }
}
