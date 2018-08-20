<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $hasher = app()->make('hash');
        $nip = $request->input('nip');
        $password = $request->input('password');
        $login = User::where('nip', $nip)->first();
        
        if (!$login) {
            $res['success'] = false;
            $res['message'] = 'Incorrect NIP';
            
            return response($res);
        }else{
            if ($hasher->check($password, $login->password)) {
                $api_token = sha1(time());
                $create_token = User::where('nip', $login->nip)->update(['api_token' => $api_token]);
                if ($create_token) {
                    $res['success'] = true;
                    $res['message'] = 'Login sucessful';
                    $res['api_token'] = $api_token;
                    $res['data'] = $login;
                    
                    return response($res);
                }
            }else{
                $res['success'] = false;
                $res['message'] = 'Incorrect password';
                
                return response($res);
            }
        }
    }

    public function register(Request $request)
    {
        $hasher = app()->make('hash');
        $params = $request->all();

        $register = User::create([
            'nip' => $params['nip'],
            'email' => $params['email'],
            'password'=> $hasher->make($params['password']),
            'name' => $params['name'],
            'jabatan' => $params['jabatan'],
            'role' => $params['role']
        ]);

        if ($register) {
            $res['status'] = true;
            $res['message'] = 'Success register!';
            return response($res);
        }else{
            $res['status'] = false;
            $res['message'] = 'Failed to register!';
            return response($res);
        }
    }

    public function logout (Request $request)
    {
      $nip = $request->header('nip');
      $login = User::where('nip', $nip)->first();
        
      if (!$login) {
          $res['success'] = false;
          $res['message'] = "User not logged in";
         
          return response($res);
      }else{
        $delete_token = User::where('nip', $login->nip)->update(['api_token' => null]);

        if ($delete_token) {
                  $res['success'] = true;
                  $res['message'] = 'Logout sucessful';
                  
                  return response($res);
              }else{
              $res['success'] = false;
              $res['message'] = 'Failed to delete user token';
              
              return response($res);
          }
      }
    }

    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function get_user(Request $request, $nip)
    {
        $user = User::where('nip', $nip)->get();
        if ($user) {
              $res['success'] = true;
              $res['message'] = $user;
        
              return response($res);
        }else{
          $res['success'] = false;
          $res['message'] = 'Cannot find user!';
        
          return response($res);
        }
    }
}