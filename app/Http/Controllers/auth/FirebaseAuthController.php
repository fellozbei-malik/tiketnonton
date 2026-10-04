<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Kreait\Firebase\JWT\IdTokenVerifier;

class FirebaseAuthController extends Controller
{
    public function callback(Request $request)
    {
        $idTokenString = $request->input('id_token');
        
        // Verifikasi token menggunakan Firebase Project ID
        $verifier = IdTokenVerifier::createWithProjectId(env('FIREBASE_PROJECT_ID'));
        
        try {
            $token = $verifier->verifyIdToken($idTokenString);
            $payload = $token->payload();
            $email = $payload['email'];
            $name = $payload['name'] ?? 'Google User';

            // Cari atau buat user baru
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => bcrypt(Str::random(24)) // Password acak yang kuat
                ]
            );

            Auth::login($user, true); // Login dengan "Remember Me"
            
            return response()->json(['success' => true, 'redirect' => route('home')]);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 401);
        }
    }
}
