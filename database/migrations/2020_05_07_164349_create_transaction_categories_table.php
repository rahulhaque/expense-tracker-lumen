<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTransactionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name', 100);
            $table->enum('category_type', ['Income', 'Expense'])->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });

        $this->initializeTable('transaction_categories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_categories');
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
            ['category_name' => 'Lent', 'category_type' => 'Expense', 'created_by' => 1],
            ['category_name' => 'Loan Return', 'category_type' => 'Expense', 'created_by' => 1],
            ['category_name' => 'Salary', 'category_type' => 'Income', 'created_by' => 1],
            ['category_name' => 'Loan', 'category_type' => 'Income', 'created_by' => 1],
            ['category_name' => 'Lent Return', 'category_type' => 'Income', 'created_by' => 1]
        ]);
    }
}
