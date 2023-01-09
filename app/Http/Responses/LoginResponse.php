<?php

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        $home = tenancy()->initialized ? route('tenant.dashboard') : route('dashboard');

        return redirect()->intended($home);
    }
}
