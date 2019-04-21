<?php

namespace App\Http\Controllers;

use Customer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class CustomerLoginController extends Controller
{
	protected $redirectTo = '/customer/home';

	public function __construct()
	{
	    $this->middleware('guest:customer')->except('logout')->except('index');
	}

	public function index(){
	      return view('customer.home');
	}

	public function showLoginForm()
	{
	      return view('customer.auth.login');
	}

	public function showRegisterForm()
	{
	      return view('customer.auth.register');
	}

	public function username()
	{
	        return 'username';
	}

	protected function guard()
	{
	      return Auth::guard('customer');
	}

	public function register(Request $request)
	{
	      $request->validate([
	          'username'      => 'required|string|unique:customers',
	          'email'         => 'required|string|email|unique:customers',
	          'password'      => 'required|string|min:6|confirmed'
	      ]);
	      Customer::create($request->all());
	      return redirect()->route('customer.registerform')->with('success', 'Successfully register!');
	}
}
