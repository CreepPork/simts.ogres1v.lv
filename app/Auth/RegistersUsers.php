<?php

namespace App\Auth;

use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use \Illuminate\Foundation\Auth\RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return redirect('login');
    }

    /**
     * Handle a registration request for the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return redirect('login');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @return void
     */
    protected function registered()
    {
        //
    }
}
