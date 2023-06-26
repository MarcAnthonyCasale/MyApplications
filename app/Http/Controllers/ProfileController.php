<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'          => 'required|regex:/^[a-zA-Z ]*$/',
            'email'         => 'required|email',
            'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'age'       => 'required',
            'gender'       => 'required',
            'birthday'       => 'required',
            'address'       => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('information')
                        ->withErrors($validator)
                        ->withInput();
        }
       else {
            $model = new Profile();
        
            $model->name = $request->name;
            $model->email = $request->email;
            $model->age  = $request->age ;
            $model->gender = $request->gender ;
            $model->address = $request->address ;
            $model->birthday = $request->birthday ;
            $model->phone = $request->phone ;
            $model->save();

        return response()->json(['success'=>'Successfully']);

       }
      
    }
    
  

}