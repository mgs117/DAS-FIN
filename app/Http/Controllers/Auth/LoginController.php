<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Writer as BaconQrCodeWriter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use Illuminate\Support\Facades\Log;

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

    //Añadimos el segundo paso de autenticación después de la validación del primer paso

    public function login(Request $request)
    {
        $this->validateLogin($request);

        //Control del numero de inicios de sesion fallidos
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            Log::warning('Demasiados intentos de login fallidos');

            return $this->sendLockoutResponse($request);
        }

        $user = Usuario::where($this->username(), '=', $request->email)->first();

        if (password_verify($request->password, optional($user)->password)) {
            $this->clearLoginAttempts($request);

            //token aleatorio de 16 caracteres
            $user->update(['token_login' => (new Google2FA)->generateSecretKey()]);

            $urlQR = $this->createUserUrlQR($user);

            $usuario=$user->email;

            Log::info('El usuario '.$usuario . ' ha introducido su email y password correctamente');
        
            //vista con el codigo QR
            return view("auth.2fa", compact('urlQR', 'user'));
        }
    
        $this->incrementLoginAttempts($request);
    
        return $this->sendFailedLoginResponse($request);
    }

    public function createUserUrlQR($user)
    {
        $bacon = new BaconQrCodeWriter(new ImageRenderer(new RendererStyle(200), new ImagickImageBackEnd()));
 
        //
        $data = $bacon->writeString((new Google2FA)->getQRCodeUrl(config('app.name'),$user->email,$user->token_login), 'utf-8');
 
        return 'data:image/png;base64,' . base64_encode($data);
    }

    //Valida el codigo generado desde el movil comprobando el token almacenado del usuario
    public function login2FA(Request $request, Usuario $user)
    {
        $request->validate(['code_verification' => 'required']);
        $usuario=$user->email;

        if ((new Google2FA())->verifyKey($user->token_login, $request->code_verification)) {
            $request->session()->regenerate();
 
            Auth::login($user);

            Log::info('El usuario '.$usuario . ' ha introducido el código de verificación correctamente');
 
            return redirect()->intended($this->redirectPath());
        }

        Log::info('El usuario '.$usuario . ' ha introducido un código de verificación erróneo');
 
        return redirect()->back()->withErrors(['error'=> 'Código de verificación incorrecto']);
    }
}
