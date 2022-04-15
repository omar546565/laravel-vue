<?php

namespace App\Http\Controllers;

use App\Events\AlertEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

      $user = auth('api')->user();

     return   response()->json([
            'success' => 1,
            'message' => 'تم تسجيل الدخول بنجاح',
            'token' => $token,
            'user' => $user
        ],200);
    }
    public function register(Request $request)
    {

         $request->validate([
             'name'=>['required','string','max:255'],
             'email'=>['required','string','email','max:255','unique:users'],
             'password'=>['required','string','min:8','confirmed'],
         ]);
          User::create([
              'name'=> $request->name,
              'email'=>$request->email,
              'image'=>'tabyan6.png',
              'password'=> Hash::make($request->password)  ,
          ]);
          if (! $token = auth('api')->attempt(['email'=>$request->email,'password'=> $request->password])) {
                    return response()->json(['error' => 'Unauthorized'], 401);
           }

            $user = auth('api')->user();

                 return   response()->json([
                        'success' => 1,
                        'message' => 'تم تسجيل الدخول بنجاح',
                        'token' => $token,
                        'user' => $user
                    ],200);
    }
    public function users()
    {
         $user = auth('api')->user();
         return  response()->json([
             'success' => 1,
             'user' => $user
         ],200);

    }
 public function updateuser(Request $request)
    {

        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','string','email','max:255','unique:users'],
            'mobile'=>['required','string','max:25','unique:users'],

        ]);

         User::where('id',$request->id)->update([
             'name'=>$request->name,
             'gender'=>$request->gender,
             'mobile'=>$request->mobile,
             'email'=>$request->email,
         ]);
         return  response()->json([
             'success' => 1,

         ],200);

    }
 public function updateuserimage(Request $request)
    {
         if ($request->image != ''){
             $User=User::find($request->id);
             if ($User->image != ''){
                 unlink('image/'.$User->image);
             }
             $data = $request->image;
             $array1 = explode(";",$data);
             $array2 = explode(",",$array1[1]);
             $data = base64_decode($array2[1]);
             $imagename = time().'.png';
             file_put_contents('image/'.$imagename,$data);

             User::where('id',$request->id)->update([
                 'image'=>$imagename,

             ]);
             return  response()->json([
                 'success' => 1,

             ],200);

         }



    }
 public function updatepass(Request $request)
    {

        $request->validate([
            'password'=>['required','string','min:8','confirmed'],

        ]);

         User::where('id',$request->id)->update([
             'password'=> Hash::make($request->password)  ,
         ]);
         return  response()->json([
             'success' => 1,

         ],200);

    }

    public function pusher(Request $request)
    {
        $message = $request->all();

        event(new AlertEvent($message));


         return  response()->json([
             'success' => 1,

         ],200);

    }
    public function userremove(Request $request)
    {
         $user = $request->user();
         $user->tokens()->delete();
         return  response()->json([
             'success' => 0,

         ],200);

    }
}
