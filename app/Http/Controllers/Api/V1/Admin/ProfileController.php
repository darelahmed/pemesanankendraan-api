<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.all', ["profile" => User::find($user->id)]);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function detail()
    {
        $user = Auth::user();
        return view('admin.profile.update', ["profile" => User::find($user->id)]);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,$user->id",
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            DB::table('users')->where('id', $user->id)->update([
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => Hash::make($request->password),
            ]);

            DB::commit();

            // Fetch the updated user
            $updatedUser = User::find($user->id);

            return redirect()->route('profile.page')->with('success', 'Profile successfully updated');
            return response()->json([
                'status' => 'success',
                'message' => 'User successfully updated',
                'data' => $updatedUser,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update user',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
