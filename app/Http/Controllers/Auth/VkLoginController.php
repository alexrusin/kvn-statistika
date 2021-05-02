<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VkLoginController extends Controller
{
    public function login(Request $request)
    {
        //TO DO validate request and hash

        $user = User::where('email', $request->uid . '@vk.com')
            ->first();

        if (!$user) {
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->uid . '@vk.com',
                'password' => 'n/a'
            ]);

            $user->email_verified_at = Carbon::now();
            $user->save();
        }

        Auth::login($user);

        return redirect()->route('index');;
    }
}
