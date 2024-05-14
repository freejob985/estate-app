<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/properties'; // تحديد الوجهة بعد تسجيل الدخول

//  public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }

   protected function authenticated(Request $request, $user)
    {
        if ($request->wantsJson()) {
            return response()->json(['redirectTo' => $this->redirectTo]);
        }

        return redirect()->intended($this->redirectPath());
    }

 public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/properties');
        }

        return redirect()->back()->withErrors(['username' => 'Invalid credentials']);
    }

 public function destroy(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login'); // Redirects to the login page
}




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
