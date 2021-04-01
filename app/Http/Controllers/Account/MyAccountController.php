<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\MyAccountUpdateRequest as Request;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function index()
    {
        return view('auth.my-account')
            ->withAccount(
                Auth::user()
            );
    }

    public function update(Request $request)
    {
        $account = Auth::user();

        $data = $request->validated();

        try {
            $data['password'] = isset($data['new-password']) ? Hash::make($data['new-password']) : $account->password;
            $account->update($data);

            return response()->json(
                [
                    'redirect' => route('account.index')
                ],
                201
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                    'path' => route('account.update'),
                    'timespan' => Carbon::now()->toDateTimeLocalString()
                ],
                500
            );
        }
    }
}
