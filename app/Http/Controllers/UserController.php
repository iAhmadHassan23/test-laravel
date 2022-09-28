<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignUp;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view_list(){
        $user = Users::all();
        return view('list', ['user'=>$user]);
    }
    public function trashed(){
        $user = Users::onlyTrashed()->get();
        return view('trashed', ['user'=>$user]);
    }

    public function view_user($id){
        $user = Users::find($id);
        if($user){
            return view('view', ['user'=>$user]);
        }
    }

    public function add_user(){
        return view('add');
    }
    
    public function edit_user($id){
        $user = Users::find($id);
        return view('edit', ['user'=>$user]);
    }

    public function create_user(Request $request){
        $user = new Users;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->hasFile('image')) {
			$logo_imagePic = time().'.'.$request->image->extension();  
            $request->image->move(public_path('image'), $logo_imagePic);
            $user->image = $logo_imagePic;
        }
        $user->save();
        return redirect('/');
    }

    public function update_user($id, Request $request){
        $user = Users::find($id);
        if($user){
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if ($request->hasFile('image')) {
                $logo_imagePic = time().'.'.$request->image->extension();  
                $request->image->move(public_path('image'), $logo_imagePic);
                $user->image = $logo_imagePic;
            }
            $user->save();
            return redirect('/');
        }
    }

    public function delete_user($id){
        $user = Users::find($id);
        if($user){
            $user->delete();
        }
        return redirect('/');
    }
    public function restore_user($id){
        $user = Users::withTrashed()->find($id);
        if($user){
            $user->restore();
        }
        return redirect('/');
    }
    public function permanent_delete_user($id){
        $user = Users::withTrashed()->find($id);
        if($user){
            $user->forceDelete();
        }
        return redirect('/');
    }


    // api controllers
    public function get_list(){
        $user = Users::all();
        return response()->json(['users'=>$user]);
    }

    public function add_new_user(Request $request){
        $user = new Users;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->hasFile('image')) {
			$logo_imagePic = time().'.'.$request->image->extension();  
            $request->image->move(public_path('image'), $logo_imagePic);
            $user->image = $logo_imagePic;
        }
        $user->save();
        return response()->json(['message'=>'User Add Successfully']);
    }
    public function delete_api_user($id){

        $user = Users::find($id);
        if($user){
            $user->delete();
            $name = "Your User Has Been Deleted";
            Mail::to('ahmadhassanqaiser@gmail.com')->send(new SignUp($name));
        }
        return response()->json(['message'=>'User Deleted Successfully']);
    }
    public function update_api_user($id, Request $request){
        $user = Users::find($id);
        if($user){
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if ($request->hasFile('image')) {
                $logo_imagePic = time().'.'.$request->image->extension();  
                $request->image->move(public_path('image'), $logo_imagePic);
                $user->image = $logo_imagePic;
            }
            $user->save();
            $name = "Your User Has Been Updated";
            Mail::to('ahmadhassanqaiser@gmail.com')->send(new SignUp($name));
            return response()->json(['message'=>'User Updated Successfully']);
        }
        else{
            return response()->json(['message'=>'Error Occurs']);
        }
    }

}
