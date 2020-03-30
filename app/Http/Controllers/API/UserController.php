<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  new UserCollection(User::all());
        return $this->sendResponse($users, 'Users has been retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        if (User::firstWhere('username', $request->username)) {
            return $this->sendError('A user with this username already exists.', [], BaseController::HTTP_CONFLICT);
        }

        $user = new User($validated);
        $user->save();
        $success = new UserResource($user);

        return $this->sendResponse($success, 'User has been created successfully.', BaseController::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if(!$user) {
            return $this->sendError('User no found.', []);
        }

        $user =  new UserResource(User::find($id));

        return $this->sendResponse($user, 'User has been retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();

        $user = User::find($id);

        if(!$user) {
            return $this->sendError('User no found.', []);
        }

        foreach ($validated as $key => $value) {
            $user[$key] = $value;
        }

        $user->save();
        $success = new UserResource($user);

        return $this->sendResponse($success, 'User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return $this->sendError('User no found.', []);
        }

        $user->delete();

        return $this->sendResponse([], 'User has been deleted successfully.');
    }
}
