<?php

namespace App\Http\Controllers\Admin;

use App\{Group, User};
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest as Request;
use Illuminate\Support\Facades\Hash;
use Throwable;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index')
            ->withUsers(
                User::getAll()
            );
    }

    public function edit(User $user)
    {
        return view('admin.user.update')
            ->withUser(
                $user
            )->withGroups(
                Group::getAll()
            );
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validated();

        try {
            $data['password'] = isset($data['password']) ? Hash::make($data['password']) : $user->password;

            $user->update([
                'password' => $data['password'],
                'bday' => $data['bday'],
                'firstname' => $data['firstname'],
                'surname' => $data['surname'],
                'group_id' => $data['group_id'],
                'role' => $data['role'],
            ]);

            return response()->json(
                [
                    'redirect' => route('user.index')
                ],
                200
            );
        } catch (Throwable $e) {
            throw $e;
            return response()->json(
                [
                    'message' => $e->getMessage(),
                    'path' => route('user.update', $user->id),
                    'timespan' => Carbon::now()->toDateTimeLocalString()
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (
            $user->id === Auth::user()->id
        ) {
            return response()->json(
                [
                    'message' => "You can not delete your account!",
                    'path' => route('user.destroy', $user->id),
                    'timespan' => Carbon::now()->toDateTimeLocalString()
                ],
                403
            );
        }

        try {
            $user->update([
                "is_active" => false
            ]);

            return response()->json([
                'message' => "User was deleted!",
                'item-id'    => $user->id 
            ], 200);
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                    'path' => route('user.destroy', $user->id),
                    'timespan' => Carbon::now()->toDateTimeLocalString()
                ],
                500
            );
        }
    }
}
