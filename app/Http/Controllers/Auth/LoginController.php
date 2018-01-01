<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\AuthenticationProvider;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        // find or create the user in the db
        $user = $this->findOrCreateGithubUser(
            Socialite::driver('github')->user()
        );

        auth()->login($user);

        return redirect(route('home'));
    }

    public function findOrCreateGithubUser($github_user)
    {
        // will attempt to locate a record in the database matching the given attributes
        // if a model is not found, a new model instance will be returned
        // the model returned by firstOrNew has not yet been persisted to the database
        $provider = AuthenticationProvider::firstOrNew([
            'provider_id' => $github_user->id,
        ]);

        if ($provider->exists()) {
            return $provider->user;
        }

        // create the user
        $user = User::create([
            'email' => $github_user->email,
            'photo_path' => $github_user->avatar,
            'first_name' => before_first($github_user->name),
            'last_name' => after_first($github_user->name),
            'authentication_provider_id' => $provider->id,
        ]);

        // update the provider details
        $provider->fill([
            'user_id' => $user->id,
            'provider' => 'github',
        ])->save();

        return $user;
    }
}
