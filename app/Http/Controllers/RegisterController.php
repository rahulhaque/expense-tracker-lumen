<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * @group Auth
 */
class RegisterController extends Controller
{

    /**
     * Register user
     *
     * @bodyParam name string required User name
     * @bodyParam email string required User email
     * @bodyParam password string required User password
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|max:100',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->currency_id = 13;
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('expense_categories')->insert([
            ['category_name' => 'Lent', 'created_by' => $user->id],
            ['category_name' => 'Loan Return', 'created_by' => $user->id]
        ]);

        DB::table('income_categories')->insert([
            ['category_name' => 'Salary', 'created_by' => $user->id],
            ['category_name' => 'Loan', 'created_by' => $user->id],
            ['category_name' => 'Lent Return', 'created_by' => $user->id]
        ]);

        return response(['data' => 'registration_successful'], 201);
    }

}
