<?php

namespace App\Http\Controllers\Auth;
use Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use DB;
use App\Massage;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
             'address' => 'required',
             'tel' => 'required|max:255|unique:users',
        ]);
    }
public function register(Request $request)
    {
        // Laravel validation
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException($request, $validator);
        }
        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
       // $request->merge(['email_token' => str_random(10),'status'=>0,'role'=>'user']);
     //  print_r( $request->all());
     //  exit;
  
            $user = $this->create($request->all());
            // After creating the user send an email with the random token generated in the create method above
           // $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
         // Mail::to($user->email)->send($email);
        DB::commit();
         $this->guard()->login($user);
              return redirect(route('front.index'));
          
        }
        catch(Exception $e)
        {
            DB::rollback();
          //  return back();
        }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
          'address' => $data['address'],
              'tel' => $data['tel'],
            'email_token' => str_random(10),
            'status'=>1,
           'image'=>'user-profile-avatar.jpg',
            'password' => bcrypt($data['password']),
        ]);
    }
     public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
$uc=User::where('email_token',$token)->count();
if($uc==1){
$us=User::where('email_token',$token)->firstOrFail();
if(!Auth::check()){
     Auth::loginUsingId($us->id);}
        User::where('email_token',$token)->firstOrFail()->verified();
   
$data['msg']='تم تفعيل حسابك بنجاح';
}
else{
$data['msg']='تم تفعيل حسابك مسبقاً';
}
  
$data['pages']= Page::all();
        return view('web.email',$data);
    }
}
