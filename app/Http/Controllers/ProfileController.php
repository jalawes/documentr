<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $profile)
    {
        return view('profiles.index', [
            'profile_user' => $profile,
            'activities'   => Activity::feed($profile),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\User                 $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        $this->validate($request, [
            'first_name' => 'string',
            'last_name'  => 'string',
        ]);

        $profile->update([
            'first_name' => request('first_name'),
            'last_name'  => request('last_name'),
        ]);

        return back()->with('flash', 'Your profile has been updated.');
    }
}
