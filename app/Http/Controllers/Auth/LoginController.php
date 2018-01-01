<?php

namespace App\Http\Controllers\Auth;

use App\AuthenticationProvider;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param  mixed                   $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $request->session()->flash('flash', "Welcome back, {$user->first_name}!");
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = $this->findOrCreateGithubUser(
            Socialite::driver('github')->user()
        );

        auth()->login($user);

        return redirect(route('home'));
    }

    public function findOrCreateGithubUser($github_user)
    {
        $provider = AuthenticationProvider::firstOrNew([
            'provider_id' => $github_user->id,
            'type'        => 'github',
        ]);

        if ($provider->exists()) {
            return $provider->user;
        }

        $user = User::create([
            'email'      => $github_user->email,
            'avatar'     => $github_user->avatar,
            'first_name' => before_first($github_user->name),
        ]);

        $provider->user_id = $user->id;
        $provider->save();

        return $user;
    }
}
