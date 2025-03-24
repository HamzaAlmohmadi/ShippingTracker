<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{


        public function register(Request $request)
        {
            try {
                // التحقق من صحة البيانات المدخلة
                    $validated = $request->validate([
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|max:255|unique:users,email',
                        'password' => 'required|string|min:6',
                    ]);
    
                // إنشاء المستخدم
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => bcrypt($validated['password']),
                ]);
    
                // إنشاء رمز الوصول (Access Token)
                $token = $user->createToken('auth_token')->plainTextToken;
    
                // استجابة النجاح
                return response()->json([
                "status" => true,
                "message" => "User registered successfully",
                "data" => [
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]
                ], 201);
                } catch (\Throwable $th) {
                // استجابة الخطأ
                return response()->json([
                    "status" => false,
                    "message" => "Registration failed",
                    "error" => $th->getMessage()
                ], 400);
            }
        }
    
    
    
        public function login(Request $request)
        {
            // التحقق من صحة المدخلات
            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:6',
            ]);
     
            // محاولة المصادقة
            $auth = Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);
     
            if ($auth) {
                // إنشاء رمز الوصول
                $token = $request->user()->createToken('auth_token');
                return response()->json([
                    "status" => true,
                    "message" => "successfully authenticated",
                    "data" => [
                        'access_token' => $token->plainTextToken,
                        'token_type' => 'Bearer',
                    ]
                ]);
            } else {
                // فشل المصادقة
                return response()->json([
                    "status" => false,
                    "message" => "Unauthorized"
                
                ],401);
            }
        }
    
    
    
    
        public function logout(Request $request)
        {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                "status" => true,
                'message' => 'Successfully logged out'
            ]);
        }
}





