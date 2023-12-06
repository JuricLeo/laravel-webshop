<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $redirectTo = '/customer/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Prikazuje obrazac za registraciju
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Postavljanje registracije
    public function registerCustomer(Request $request)
    {
        $this->validator($request->all())->validate();

        $customer = $this->create($request->all());

        Auth::guard('customer')->login($customer);

        return redirect($this->redirectTo);
    }

    // Prikazuje obrazac za prijavu
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Postavlja prijavu
    public function loginCustomer(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors(['email' => 'Neuspješna prijava. Provjerite svoje podatke.']);
    }

    // Validacija podataka
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'adresa' => 'required|string|max:255',
        ]);
    }

    // Postavljanje straže za korisnike
    protected function guard()
    {
        return Auth::guard('customer');
    }

    // Redirekcija nakon prijave
    protected function redirectTo()
    {
        return '/customer/dashboard';
    }

    // Odjava korisnika
    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect('/');
    }

    // Stvaranje korisnika
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'adresa' => $data['adresa'],
        ]);
    }
}
