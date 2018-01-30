<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\ForgotPassword;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPassword;
use App\Models\User;
use App\Repositories\Admin\UserRepository;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Spatie\Permission\Models\Role;

class UserAPIController extends AppBaseController
{
    
    public function getUser( Request $request )
    {
        
        $result = array();
        $data = $request->user();
        
        if ( !empty( $data->id ) ) {
            
            $result = array(
                'status' => true,
                'data' => $data
            );
            
            return $this->sendResponse( $data, 'Login Successfully' );
            exit();
        } else {
            return $this->sendError( 'something wrong' );
        }
        
    }
    
    
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login( Request $request )
    {
        
        $request->request->add( [
            'client_id' => '2',
            'client_secret' => 'm3KtgNAKxq6Cm1WC6cDAXwR0nj3uPMxoRn3Ifr8L',
            //'client_secret' => 'YbZXig9gtBlWpAYv8o75Rb6JxIACqbjO759FyMCr',
            'grant_type' => 'password',
            'username' => $request[ 'email' ],
            'password' => $request[ 'password' ]
        ] );
        $tokenRequest = $request->create( '/oauth/token', 'POST', $request->all() );
        $response = \Route::dispatch( $tokenRequest );
        $json = (array)json_decode( $response->getContent() );
        if ( isset( $json[ 'error' ] ) && $json[ 'error' ] == 'invalid_credentials' ) {
            return $this->sendError( 'The user credentials were incorrect.' );
        }
        Auth::attempt( [ 'email' => $request[ 'email' ], 'password' => $request[ 'password' ] ] );
        $json[ 'user' ] = Auth::user();
        
        return $this->sendResponse( $json, 'User information Successfully return!' );
        
    }
    
    
    public function postLogin( LoginRequest $request )
    {
        
        $inputs = $request->all();
        $login = User::login( $inputs );
        
        if ( $login == false ) {
            return $this->sendError( 'Invalid Username/Password.' );
        }
        
        return $this->sendResponse( $login, 'Login Successfully' );
    }
    
    
    public function postSignup()
    {
        
        $inputs = Input::all();
        $signup = User::signup( $inputs );
        if ( $signup == false ) {
            return $this->sendError( 'Account created faileds.' );
        }
        $role = Role::findByName( getRoles( $inputs[ 'type' ] ) )->first();
        $signup->assignRole( $role ); // you can pass whole object, or just an id
        User::signUpNotify( $signup );
        
        return $this->sendResponse( $signup, 'Account created successfully.' );
        
    }
    
    
    public function logout()
    {
        
        Auth::logout();
        
        return $this->sendResponse( '', 'Sorry you can not access this action!' );
    }
    
    
    public function forgotPassword()
    {
        
        return $this->sendResponse( '', 'Sorry you can not access this action!' );
    }
    
    
    public function postForgotPassword( ForgotPassword $request )
    {
        
        $input = $request->all();
        $forgotPassword = User::forgotPasswordNotifi( $input );
        if ( $forgotPassword == false ) {
            return $this->sendError( 'Reset password failed.' );
        }
        
        return $this->sendResponse( '', 'Password reset link sent to your e-mail.' );
    }
    
    
    public function resetPassword( $token )
    {
        
        $user = User::find( decrypt( $token ) );
        
        return $this->sendResponse( $user, 'Sorry you can not access this action!' );
    }
    
    
    public function postResetPassword( ResetPassword $request )
    {
        
        $inputs = $request->all();
        $resetPassword = User::resetPassword( $inputs );
        
        if ( $resetPassword == false ) {
            return $this->sendError( 'Reset password failed.' );
        }
        
        return $this->sendResponse( $resetPassword, 'Password reset successfully.' );
        
    }
    
    
    public function confirmEmail( $token )
    {
        
        try {
            $user = User::find( decrypt( $token ) );
            if ( $user->exists AND $user->active == 1 ) {
                return $this->sendError( 'Email already confirmed.' );
                
            } else {
                $user->activateAccount();
                Session::flash( "success", "Email confirmed successfully." );
                
                return $this->sendResponse( $user, 'Email confirmed successfully.' );
                
            }
        } catch ( \Exception $exp ) {
            return $this->sendError( 'Invalid token.' );
        }
    }
    
    
    public function getUsers( UserRepository $repository )
    {
        
        $users = $repository->paginate( 20 );
        
        return $this->sendResponse( $users, 'Users return successfully.' );
    }
    
    
    /**
     * @param               $id
     * @param Request       $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( $id, Request $request )
    {
        
        $input = $request->all();
        
        $user = User::where( 'id', $id )->first();
        
        if ( empty( $user ) ) {
            return $this->sendError( 'User not found' );
        }
        
        //$user->removeRole(getRoles($user->type));
        
        $user->first_name = $request->input( 'first_name' );
        $user->last_name = $request->input( 'last_name' );
        //$user->email = $request->input('license');
        $user->sbu = $request->input( 'sbu' );
        //$user->password = $request->input('license');
        $user->type = $request->input( 'type' );
        $user->timezone = $request->input( 'timezone' );
        $user->language = $request->input( 'language' );
        $user->encryption = $request->input( 'encryption' );
        $user->license = $request->input( 'license' );
        $user->cdn = $request->input( 'cdn' );
        if ( !empty( $request->input( 'password' ) ) ) {
            $user->password = $request->input( 'password' );
        }
        $user->save();
        
        
        return $this->sendResponse( $user, 'User updated successfully' );
        
    }
    
    
    /**
     * @param               $id
     * @param Request       $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus( $id, Request $request )
    {
        
        $user = User::where( 'id', $id )->first();
        if ( empty( $user ) ) {
            return $this->sendError( 'User not found' );
        }
        $user->active = $request->input( 'status' );
        $user->save();
        
        return $this->sendResponse( $user, 'User updated successfully' );
        
    }
    
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /*public function users(Request $request)
    {
      $input = $request->all();
      $users = User::paginate($input['limit']);
      return $this->sendResponse($users,'Email confirmed successfully.');
    }*/
    
    /**
     * Remove the specified Transport from storage.
     * DELETE /user/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id )
    {
        
        /** @var Transport $transport */
        $user = User::where( 'id', $id )->first();
        if ( empty( $user ) ) {
            return $this->sendError( 'User not found' );
        }
        
        $user->delete();
        
        return $this->sendResponse( $user, 'User deleted successfully' );
    }
}
