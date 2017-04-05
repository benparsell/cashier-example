<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
        
		return view('home');
    }
	
	public function subscribe(Request $request)
	{
		 
        // grab the user
        $user = $request->user();
        // if there is no user, we have to create one
        
        // create the users subscription
        // grab the credit card token
        $ccToken = $request->input('cc_token');
        $plan = $request->input('plan');
        // create the subscription
        try {
            $user->newSubscription('main', $plan)->create($ccToken, [
                'email' => $user->email
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription.']);
        }
        
        return view('home');
    
	}
}
