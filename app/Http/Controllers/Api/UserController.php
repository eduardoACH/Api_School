<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\User;
use App\Models\Students;

class UserController extends Controller
{
    public function index($type)
    {
        $rol = null;
        switch ($type) {
            case 'admin':
                $rol = 'ADMIN';
                break;
            case 'student':
                $rol = 'STUDENT';
                break;
            case 'teacher':
                $rol = 'TEACHER';
                break;
            default:
                return response(['message' => 'Not Found'],400);
                break;
        }
        $user = User::role($rol)->get();
        return UserResource::collection($user);        
    }

    public function registerUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = new User($data);
        $user->save();
        return $user;
    }

    public function registerStudent(RegisterRequest $request)
    {
        $user = $this->registerUser($request->validated());
        $user->assignRole('STUDENT');
        $student = new Students([
            'code' => uniqid(),
            'user_id' => $user->id
        ]);
        $student->save();
        return new UserResource($user);
    }
    
    public function registerTeacher(RegisterRequest $request)
    {
        $user = $this->registerUser($request->validated());
        $user->assignRole('TEACHER');
        return new UserResource($user);
    }

    public function updatePassword(User $user,PasswordRequest $request)
    {
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return new UserResource($user);
    }
    
    public function update(User $user ,UpdateUserRequest $request)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }
}
