<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Rules\Password;
use Modules\Expert\Entities\Expert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Expert\Entities\ExpertJob;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\Customer\Entities\Customers;
use Illuminate\Support\Facades\Validator;
use Modules\Expert\Entities\ExpertDocument;
use Modules\Expert\Entities\ExpertEducations;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use Common;

    public function __construct()
    {
        // $this->middleware('jwt_auth', ['except' => ['login','register']]);
    }

    public function index(Request $request, )
    {
        $data =[
            'token_type'    => 'bearer',
        ];
        return sendSuccessResponse('Testting Okay',$data,200);
    }



    public function login(Request $request)
    {

        $request->validate([
            'email'     => 'required|string|email',
            'password'  => 'required|string',
        ]);
        $request['user_type'] = 3;

        $credentials = $request->only('email', 'password','user_type');

        $token = auth()->guard('jwt_auth')->attempt($credentials);

        if (!$token) {
            $data='';
            return sendErrorResponse('Check Your Email Or Password',$data=null,401);
        }

        if(@$request->device_token){
            $data['device_token'] = @$request->device_token;
            User::where('id',auth('jwt_auth')->user()->id)->update($data);
        }

        $id = auth('jwt_auth')->user()->id;
        $user =  $this->expertinfo($id);
        
        
        $data =[
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->guard('jwt_auth'),
            'user_type'     => auth('jwt_auth')->user()->user_type,
            'profile'       => $user
        ];
        return sendSuccessResponse('Login Successfull!',$data,200);

    }

    public function customerLogin(Request $request)
    {

        $request->validate([
            'email'     => 'required|string|email',
            'password'  => 'required|string',
        ]);

        $request['user_type'] = 4;

        $credentials = $request->only('email', 'password','user_type');
        $token = auth()->guard('jwt_auth')->attempt($credentials);

        if (!$token) {
            $data='';
            return sendErrorResponse('Check Your Email Or Password',$data=null,401);
        }

        if(@$request->device_token){
            $data['device_token'] = @$request->device_token;
            User::where('id',auth('jwt_auth')->user()->id)->update($data);
        }

        $id = auth('jwt_auth')->user()->id;

        $user =  $this->customerinfo($id);
        
        $data =[
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->guard('jwt_auth'),
            'user_type'     => auth('jwt_auth')->user()->user_type,
            'profile'       => $user
        ];
        return sendSuccessResponse('Login Successfull!',$data,200);

    }



    public function profile()
    {
        $id = auth('jwt_auth')->user()->id;
        try {
            if(auth('jwt_auth')->user()->user_type==3){
                $user =  $this->expertinfo($id);
            }else{
                $user =  $this->customerinfo($id);
            }
            return sendSuccessResponse('Data Retrive Successfull !',$user,200);
        } catch(\Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }
        
    }

    protected function respondWithToken($token)
    {
        $data =[
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->guard('jwt_auth')
        ];
        return sendSuccessResponse('Login Successfull!',$data,200);
    }

    //expert registration
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'user_name'     => 'required|string|unique:users',
            'category_id' => 'required',
            'email'     => 'required|string|email|max:100|unique:users',
            'password'  => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        
        try {

            DB::beginTransaction();

                $user = User::create([
                    'name'      => $request->user_name,
                    'user_name' => $request->user_name,
                    'email'     => $request->email,
                    'password'  => Hash::make($request->password),
                    'user_type'  => 3,
                ]);
                
                $data['code']               = uniqueId('experts','EXP');
                $data['user_id']            = $user->id;
                $data['category_id']        = $request->category_id;
                $data['email']              = $request->email;
                $data['display_name']       = $request->user_name;
                $data['full_name']          = $request->user_name;
                $data['first_name']          = $request->user_name;

                Expert::create($data);


            DB::commit();

            return sendSuccessResponse('Registration Successfull !',$user,200);

        } catch( Exception $e){
            return sendErrorResponse('Something Went Wrong!','Something Went Wrong!',500);
        }


    }
    
    //Customer registration
    public function customer_register(Request $request){


        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|email|max:100|unique:users',
            'password'  => ['required', 'string', new Password, 'confirmed'],
        ]);

        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->first(), $validator->errors(), 400);
        }

    
        try {

            DB::beginTransaction();

                $name = explode("@",$request->email);

                $user = User::create([
                    'name'          => @$name[0]??'.',
                    'user_name'     => $request->email,
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password),
                    'user_type'     => 4,
                ]);

                $data['user_id']        = $user->id;
                $data['code']           = uniqueId('customers','CUS');
                $data['name']           = @$name[0]??'.';
                $data['email']          = $request->email;

                Customers::create($data);

                if(@$request->bypass_status){

                    Mail::send('emailtemplate.registration',array(
                        'username'      => $data['name'],
                        'user_email'    => $data['email'],
                        'password'      => $request->password,
                    ), function($message) use ($data){
                        $message->to($data['email']);
                        $message->subject('Registration Successfull');
                    });
                }
                


            DB::commit();

            return sendSuccessResponse('Registration Successfull !',$user,200);

        } catch( Exception $e){
            DB::rollback();
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }


    }

    public function updateCustomerProfile(Request $request){

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'name' => 'required',
            'country_id' => 'required',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        try {
            
            DB::beginTransaction();

            $data['name']           = $request->name;
            $data['phone']          = $request->phone;
            $data['email']          = $request->email;
            $data['address']        = $request->address;
            $data['country_id']    = $request->country_id;
            $data['dob']            = $request->dob;

            if(!empty(@$request->image)){
                //Upload File
                $destinationPath = 'uploads/';
                $image_parts = explode(";base64,", @$request->image);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName =  uniqid().'.'.$image_type;
                Storage::put($destinationPath.$fileName, $image_base64);
                $data['image'] = $destinationPath.$fileName;
            }

            Customers::where('user_id',auth('jwt_auth')->user()->id)->update($data);
            
            DB::commit();
            return sendSuccessResponse('Update Successfull !','',200);


        } catch( Exception $e){
            DB::rollback();
            return sendErrorResponse('Something Went Wrong!','Something Went Wrong!',500);
        }

    }

    

    public function update_profile(Request $request){


        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'dob'           => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'display_name'  => 'required',
            'expert_job'    => 'required|array',
            'expert_educations' => 'required|array',
            'expert_document' => 'required|array',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $jsonData = json_encode($request->all());
        $arrayData = json_decode($jsonData,true);




        try {
            
            DB::beginTransaction();

            
            if(!empty(@$request->profile_photo_url)){
                //Upload File
                $destinationPath = 'uploads/';
                $image_parts = explode(";base64,", @$request->profile_photo_url);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName =  uniqid().'.'.$image_type;

               Storage::put($destinationPath.$fileName, $image_base64);
                // $filePath = $file->storeAs($destinationPath, $fileName, 'public');
                $expert['profile_photo_url'] = $destinationPath.$fileName;
                // Delete image file from storage folder
                $request->profile_photo_url_old ? Storage::delete($request->profile_photo_url_old) : null;
               
            }


            $expert['category_id']      = $request->category_id;
            $expert['sub_category_id']  = $request->sub_category_id;
            $expert['email']            = $request->email;
            $expert['full_name']        = $request->first_name.' '.$request->last_name;
            $expert['first_name']       = $request->first_name;
            $expert['last_name']        = $request->last_name;
            $expert['display_name']     = $request->display_name;
            $expert['dob']              = $request->dob;
            $expert['expert_in_bio']    = $request->expert_in_bio;
            $expert['phone']            = $request->phone;
            $expert['country_id']      = $request->country_id;

            $user =  $this->expertinfo(auth('jwt_auth')->user()->id);
            $expert_id = $user->expert->id;

            Expert::where('id',$expert_id)->update($expert);

            
            DB::commit();
            return sendSuccessResponse('Update Successfull !','',200);


        } catch( Exception $e){
            return sendErrorResponse('Something Went Wrong!','Something Went Wrong!',500);
        }

    }



    public function reset_pasword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->first(), '', 400);
        }

        try {
            
            // Delete all old code that user send before.
            DB::table('password_resets')->where('email', $request->email)->delete();
            // Generate random code
            $data['token'] = mt_rand(100000, 999999);
            $data['email'] = $request->email;
            $data['created_at'] = date('Y-m-d h:i:s');
            // Create a new code
            DB::table('password_resets')->insert($data);
            // Send email to user
            Mail::send('emailtemplate.resetemail',array('token' => $data['token']), function($message) use ($data){
                $message->to($data['email']);
                $message->subject('Password Reset Mail');
            });
            return sendSuccessResponse('Send a email please check your mail !','',200);
            
        } catch(\Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }

        

    }


    
    public function set_new_pasword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);
        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $user = auth('jwt_auth')->user();
        if (! isset($request->current_password) || ! Hash::check($request->current_password, $user->password)) {
            return sendErrorResponse('The provided password does not match your current password.', '', 400);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return sendSuccessResponse('Successfully Updated User Password.',[],200);


    }


    public function forgot_password(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'token'             => 'required',
            'email'             => 'required|string',
            'password_confirmation'  => ['required', 'string'],
            'password'          => ['required', 'string', new Password, 'confirmed'],
        ]);

       
        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $data = DB::table('password_resets')
        ->where('token',$request->token)
        ->where('email', $request->email)->first();

        
        if ($data) {
            User::where('email',$data->email)->update([
                'password' => Hash::make($request->password)
            ]);
            return sendSuccessResponse('Password reset successfull, Now Login','',200);
        }else{
            return sendErrorResponse('Invalid code, Please check your mail', '', 400);
        }
        
    }


    public function update_password(Request $request)
    {
        
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);
        $user = auth('jwt_auth')->user();
        if (! isset($request->current_password) || ! Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'The provided password does not match your current password.']);
        }
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        $data =[
            'access_token'  => auth('jwt_auth')->refresh(),
            'token_type'    => 'bearer',
            'expires_in'    => auth()->guard('jwt_auth')
        ];

        return sendSuccessResponse('Successfully Updated user Password.',$data,200);
    }



    public function logout()
    {
      
        auth('jwt_auth')->logout();
        return sendSuccessResponse('Successfully logged out','',200);

    }


    public function refresh()
    {
        $data =[
            'access_token'  => auth('jwt_auth')->refresh(),
            'token_type'    => 'bearer',
            'expires_in'    => auth()->guard('jwt_auth')
        ];
        return sendSuccessResponse('Refresh Token Successfull!',$data,200);
        
    }
}
