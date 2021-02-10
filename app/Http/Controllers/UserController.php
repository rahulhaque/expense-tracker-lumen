<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

/**
 * @group User
 * @authenticated
 */
class UserController extends Controller
{
    /**
     * Get users
     *
     * @url /api/v1/user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Show a user
     *
     * @urlParam id required User id to show Example: 1
     *
     * @url /api/v1/user/{id}
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
     * Update user
     *
     * @urlParam id required User id to update Example: 1
     * @bodyParam name string required User name Example: Ciri
     * @bodyParam email string required User email Example: cir@email.com
     * @bodyParam currency_id int required User currency id Example: 1
     *
     * @url /api/v1/user/{id}
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
     * @bodyParam name string required User name Example: Triss
     * @bodyParam email string required User email Example: tiss@email.com
     * @bodyParam currency_id int required User currency id Example: 13
     *
     * @url /api/v1/user/update
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
     * Update password
     *
     * @bodyParam old_password string required Old password Example: 123456
     * @bodyParam new_password string required New password Example: 234567
     * @bodyParam confirm_password string required Confirm password Example: 234567
     *
     * @url /api/v1/user/password
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
