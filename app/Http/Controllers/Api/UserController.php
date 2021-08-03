<?php

namespace App\Http\Controllers\Api;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Illuminate\Validation\Rule;
use Hash;
class UserController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'confirm_password' => 'required|same:password',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // $input = $request->all();
        // dd($input);
        // $input['password']=Hash::make($input['password']);
        $user = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'company_name'=>$request->company_name,
            'password'=>Hash::make($request->password),
        ]);
        $success = $user;
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        return $this->sendResponse($success, 'User registered successfully.');
    }

    public function login (Request $request) {
        $user = User::where('email', $request->email)->first();
        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                $success = $user;
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                 $user->api_token=$success['token'];
                 $user->save();
                return $this->sendResponse($success, 'User has been logged in successfully.');
            } else {
                return $this->sendError('Invalid Password!');
            }
        } else {
            return $this->sendError('Invalid Email.');
        }
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $success = [];
        return $this->sendResponse($success, 'You has been successfully logged out.');
    }

    public function getUser (Request $request){
        $success =  $request->user();
       
        return $this->sendResponse($success, 'User Access successfully.');
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $banner='';
        if($request->hasFile('image'))
        {
         $banner_image=$request->image;
         $banner_name= time().$banner_image->getClientOriginalName();
         $banner_image->move('uploads/userimage',$banner_name);
         $banner = 'uploads/userimage/'.$banner_name;
        }

        $userData=$request->user();
        $updateUser = $userData->update([
         'first_name'=>$request->first_name,
         'last_name'=>$request->last_name,
         'mobile'=>$request->mobile,
         'email'=>$request->email,
         'company_name'=>$request->company_name,
         'job_title'=>$request->job_title,
         'city'=>$request->city,
         'address'=>$request->address,
        'image'=>$banner,
        ]);

        return $this->sendResponse($userData, 'Profile update successfully.');
    }

    public function checkMobileNumberExits(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric|unique:users'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        return $this->sendResponse(array(), 'Mobile number is not exists.');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->update(['password' => Hash::make($request->password)]);
        }else{
            return $this->sendError('Validation Error.', '', "The current password is not match with old password.");
        }
        return $this->sendResponse(array(), 'Password updated successfully');

    }

    public function forgotPassword(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required', Rule::exists('users')->where(function ($query) {
                        $query->where('email', $request->email);
                        }), 
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::where("email", $request->email)->first();
        if ($user) {
            $password=Hash::make($request->password);
            $user->update(['password' => $password]);
        }else{
            return $this->sendError('Validation Error.', '', "Given Email Not Exists!");
        }
        return $this->sendResponse(array(), 'Password successfully updated');

    } 

}