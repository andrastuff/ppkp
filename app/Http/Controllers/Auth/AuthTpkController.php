<?php

namespace App\Http\Controllers\Auth;

use App\Models\Tbl_user_tpk as User;
use App\Models\Tbl_wilayah as Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Api as Controller;

class AuthTpkController extends Controller
{
   
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required|min:6'
        ]);
		
		if ($validator->fails()) {
            return $this->sendResponseError(json_encode($validator->errors()), $validator->errors());
        }
		
		if(is_numeric($request->email)){
			$credentials = [
            'no_telp'     => $request->email,
            'password'  => $request->password
			];
			if (!Auth::guard('tpk')->attempt($credentials)) {
            return response()->json(['message' => 'Login Faileds!'], 401);
			}
			$user = User::where('no_telp', $request->email)->first();
		}else{
			$credentials = [
            'email'     => $request->email,
            'password'  => $request->password
			];
			  
			if (!Auth::guard('tpk')->attempt($credentials)) {
            return response()->json(['message' => 'Login Faileds!'], 401);
			}
			$user = User::where('email', $request->email)->first();
		}
         
		  
        $token = $user->createToken('auth_token', ['tpk'])->plainTextToken;
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
	
	public function forgot_password(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $token = sha1(rand());

        

        if (!empty($user)) {
            $data = [
				'email' => $user->email,
				'token' => $token,
				'to_url' => 'http://localhost/ppkb/public/password-reset',
			];
			if($user->banned == 0 ){
				return response()->json(['message' => 'Akun anda belum diaktifkan, hubungi kami di administrator terkait masalah ini.'], 203);
			}
			if(Mail::to($user->email)->send(new ResetPasswordMail($data))){
			$user->update([
                'token_reset'    => $token
            ]);	
            return $this->sendResponseCustom('Kami telah mengirimkan link untuk reset password ke email Anda. Cek folder inbox atau spam untuk menemukannya.', false);
			
			}
        }
        return $this->sendResponseError('Upps. Email tidak di temukan!', null);
    }

    public function reset_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required|confirmed|min:6',
            'token'     => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendResponseError(json_encode($validator->errors()), $validator->errors());
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->token_reset !== $request->token) {
                return $this->sendResponseError('Upps token reset password salah!');
            } else {
                $user->update([
                    'password'  => Hash::make($request->password),
                    'token_reset'    => sha1(rand()),
                ]);
                return $this->sendResponseCustom('Password berhasil di ubah', true);
            }
        }
        return $this->sendResponseError('Upps. Email tidak di temukan!');
    }

	public function User(Request $request)
    {
        
		$user = $request->user();
		
		if ($user->tokenCan('administrator')) {
			$user->role = 'administrator';
			 
		}elseif($user->tokenCan('tpk')){
			 
			$user->role = 'tpk';
			 
			$user->wilayah = Wilayah::find($user->wilayah_id)->nama;
		}
		
		return $user;
    }
	 
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
		return $this->sendResponseOk(null);
        
    }
}
