<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->is_admin || Auth::id() == $id) {
            return response()->json(User::with('currency')->find($id));
        }

        return response()->json(['error' => 'unauthorised'], 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('users')->ignore($id)
            ],
            'currency_id' => 'required',
        ]);

        $userById = User::find($id);
        $userById->name = $request->name;
        $userById->email = $request->email;
        $userById->currency_id = $request->currency_id;
        $userById->save();

        return response()->json(['data' => 'user_updated', 'request' => $request->all()], 200);
    }

    /**
     * Update logged in user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('users')->ignore(Auth::id())
            ],
            'currency_id' => 'required',
        ]);

        $userById = User::find(Auth::id());
        $userById->name = $request->name;
        $userById->email = $request->email;
        $userById->currency_id = $request->currency_id;
        $userById->save();

        return response()->json(['data' => 'user_updated', 'request' => $request->all()], 200);
    }

    /**
     * Update user password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|min:6|max:100',
            'new_password' => 'required|min:6|max:100|same:confirm_password',
            'confirm_password' => 'required|min:6|max:100',
        ]);

        $old_password = Auth::user()->password;

        if (Hash::check($request->old_password, $old_password)) {
            if (Hash::check($request->new_password, $old_password)) {
                return response()->json(['data' => 'old_password'], 422);
            } else {
                $authUser = Auth::user();
                $authUser->password = Hash::make($request->new_password);
                $authUser->save();

                return response()->json(['data' => 'password_changed'], 200);
            }
        } else {
            return response()->json(['data' => 'password_mismatch'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
