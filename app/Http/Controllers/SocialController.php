<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Modules\Customer\Entities\Customers;

class SocialController extends Controller
{


    public function redirect($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider){


        $userSocial     =   Socialite::driver($provider)->stateless()->user();
        dd($userSocial);
        
        $users          =   User::where(['email' => $userSocial->getEmail()])->first();

        if($users){
            Auth::login($users);
            return redirect('/');
        }else{

            try {

                DB::beginTransaction();
    
                    $user = User::create([
                        'name'      => $userSocial->getName(),
                        'user_name' => $userSocial->getEmail(),
                        'email'     => $userSocial->getEmail(),
                        'password'  => '',
                        'user_type'  => 4,
                    ]);
                    
                    $data['user_id']        = $user->id;
                    $data['code'] = uniqueId('customers','CUS');
                    $data['name']        = $userSocial->getName();
                    $data['email']          = $userSocial->getEmail();
    
                    Customers::create($data);
    
    
                DB::commit();
    
                return sendSuccessResponse('Registration Successfull !',$user,200);
    
            } catch( \Exception $e){
                DB::rollback();
                return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
            }
           
        }






        
    }


    public function TwitterCallback()
    {
        $twitterSocial =   Socialite::driver('twitter')->user();
        $users       =   User::where(['email' => $twitterSocial->getEmail()])->first();
        
        if($users){
            Auth::login($users);
            return redirect('/home');
        }else{

            $user = User::firstOrCreate([
                'name'          => $twitterSocial->getName(),
                'email'         => $twitterSocial->getEmail(),
                'image'         => $twitterSocial->getAvatar(),
                'provider_id'   => $twitterSocial->getId(),
                'provider'      => 'twitter',
            ]);
            return redirect()->route('home');

        }
    }


  
}
