<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function update(PasswordRequest $request): RedirectResponse
    {
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('changed', __('users.changed'));
    }
}
