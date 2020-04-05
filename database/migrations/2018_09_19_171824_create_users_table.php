<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->integer('currency_id')->default('18');
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });
        $this->initializeTable('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

    /**
     * Initialize table with some data
     *
     * @param $table
     */
    public function initializeTable($table)
    {
        DB::table($table)->truncate();
        DB::table($table)->insert([[
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin@email.com'),
            'currency_id' => 13,
            'is_admin' => true,
        ]]);
    }
}
