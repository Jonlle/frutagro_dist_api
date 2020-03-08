<?php

namespace App\Http\Controllers\API;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;


class AuthController extends BaseController
{

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'username' => 'required',
        'doct_type_id' => 'required',
        'rol_id' => 'required',
        'status_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'document' => 'required',
        'password' => 'required',
    ]);

    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors(), 422);
    }

    $data = $request->all();
    $data['password'] = bcrypt($data['password']);
    $user = User::create($data);
    $success['token'] = $user->createToken('Frutagro_dist')->accessToken;
    $success['username'] =  $user->username;

    return $this->sendResponse($success, 'User register successfully.');
  }

  public function login(Request $request)
  {
    $credentials = [
        'username' => $request->username,
        'password' => $request->password
    ];

    if (auth()->attempt($credentials)) {
      $user = Auth::user();
      $success['token'] = $user->createToken('Frutagro_dist')->accessToken;
      $success['username'] =  $user->username;

      return $this->sendResponse($success, 'User login successfully.');
    }
    else {
        return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 401);
    }
  }

  public function get_user_details_info()
  {

    $user = Auth::user();

    return $this->sendResponse($user, 'success');
  }

}
