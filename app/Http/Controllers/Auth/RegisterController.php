<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\UserDetail;
use App\Models\Facilitator;
use App\Models\FacilitatorTrack;
use App\Models\Role;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    const delivery = 7;
    const dispatcher = 8;

    public static $rolesName = [
        'delivery' => 'delivery_boy',
        'dispatcher' => 'dispatcher'
    ];

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['role'] == self::$rolesName['delivery']){
                $UserData = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password'])
                ]);

        }
        else if($data['role'] == self::$rolesName['dispatcher']){
                $UserData = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'protect' => 1
                ]);

        }
          
         UserDetail::create([
            'user_id' => $UserData->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
        if($data['role'] == self::$rolesName['delivery']){
                \DB::table('role_user')->insert(['user_id' => $UserData->id, 'role_id' => self::delivery]);
                 $facilitatorId = Facilitator::create([
                                    'user_id' => $UserData->id,
                                    'is_engaged' => false,
                                    'available' => false,
                                 ])->id;
                 FacilitatorTrack::create([
                    'facilitator_id' => $facilitatorId,
                    'longitude' => "",
                    'latitude' => "",
                 ]);
        }
        else if($data['role'] == self::$rolesName['dispatcher']){
                \DB::table('role_user')->insert(['user_id' => $UserData->id, 'role_id' => self::dispatcher]);
        }


        return $UserData;
    }
}
