<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;
use Auth;
use App\Notifications\ResetPassword;
use App\Notifications\SignupNotify;
use Laravel\Cashier\Billable;

use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles, Billable, HasApiTokens;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'type', 'password', 'timezone', 'sbu', 'language', 'encryption', 'license', 'active', 'cdn'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|max:255|email:unique:users',
        'password' => 'required|max:255'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /*public function getTypeAttribute($value)
    {
        if ($value == 1) {
            return "admin";
        } else if ($value == 2) {
            return "manager";
        }else if ($value == 3) {
          return "owner";
        }
        return "customer";
    }*/
  
  /**
   * @return mixed
   */
    public static function getRules()
    {
      return Role::orderBy('first_name')->pluck('first_name', 'id');
    }
    
    public static function rules()
    {
        return [
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|email|unique:users|max:255",
            "type" => "required",
            "password" => "required|max:255|min:6",
            "timezone" => "required|max:255|min:6",
            "sbu" => "required|max:255",
            "language" => "required|max:255",
            "encryption" => "required|max:255",
            "license" => "required|max:255",
            "cdn" => "required|max:255"
        ];
    }

    public static function signup($inputs)
    {
        //try {
            return self::create($inputs);
       /* } catch (\Exception $exp) {
            return false;
        }*/
    }

    public static function loginRules()
    {
        return [
            "email" => "required|email",
            "password" => "required"
        ];
    }

    public static function login($inputs)
    {
        try {
            $remember = false;
            if (isset($inputs["remember_me"]) AND $inputs["remember_me"] == "on") {
                $remember = true;
            }

            if (Auth::attempt(['email' => $inputs['username'], 'password' => $inputs['password'], 'active'=>1], $remember)) {
                return true;
            }
        } catch (\Exception $exp) {
            return false;
        }
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public static function forgotPasswordRules()
    {
        return [
            "email" => "required|email"
        ];
    }

    public static function emailExists($email)
    {
        return self::where("email", $email)->first();
    }

    public static function forgotPasswordNotifi($input)
    {
        try {
            $email = $input["email"];
            $emailExists = self::emailExists($email);
            if ($emailExists->exists) {
                $url = url('/session/passwordreset/') . '/' . encrypt($emailExists->id);
                $notify = ["name" => $emailExists->name, "url" => $url];
                $emailExists->notify(new ResetPassword($notify));
                return true;
            }
            return false;
        } catch (\Exception $exp) {
            return false;
        }
    }

    public static function resetPasswordRules()
    {
        return [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ];
    }

    public static function resetPassword($inputs)
    {
        try {
            $userId = decrypt($inputs["user_id"]);
            $user = self::find($userId);
            if ($user->exists) {
                return $user->update(["password" => $inputs['password']]);
            }
        } catch (\Exception $exp) {
            dd($exp);
            return false;
        }
    }

    public static function signUpNotify($user)
    {
        $url = url('/signup/confirm') . '/' . encrypt($user->id);
        $notify = ["name" => $user->first_name, "url" => $url];
        $user->notify(new SignupNotify($notify));
        return true;
    }

    public function activateAccount()
    {
        return self::update(["active" => 1]);
    }

    
  
  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
    public function booking(){
      return $this->hasMany('App\Models\Booking', 'user_id');
    }
  
  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function refund(){
    return $this->hasMany('App\Models\Refund', 'user_id');
  }
  
  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function chauffeur(){
    return $this->hasOne('App\Models\Chauffeur', 'user_id');
  }
  
  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function fleets(){
    return $this->hasMany('App\Models\Chauffeur', 'fleet_id');
  }
  
  /**
   * @param $userId
   * @param $status
   *
   * @return mixed
   */
  public static function changeStatus($userId, $status)
  {
    return self::where("id", $userId)->update(["active" => $status]);
  }
}
