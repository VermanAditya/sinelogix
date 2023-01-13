<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function savedata(Request $req){
        $this->validate($req, [
            'image'=> 'required',
            'name'=> 'required|string|max:225',
            'gender'=> 'required',
            'number'=> 'required',
            'email'=> 'required|string|email|max:225|unique:users',
            'hobby'=> 'required|array',
            'status'=> 'required'
        ]);
        $image = $req->file('image');
        if ($req->hasFile('image')) { 
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        } 
        $user = new User;
        $user->name = $req->name;
        $user->image = $name;
        $user->address = $req->address;
        $user->gender = $req->gender;
        $user->number = $req->number;
        $user->email = $req->email;
        $user->hobby = json_encode($req->hobby) ;
        $user->status = $req->status;

        $user->save();
        // $hobbies['category'] = $req->hobbies('hobby');
        // $image = $req->file('image');
        // if ($req->hasFile('image')) { 
        //     $name = time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/images');
        //     $image->move($destinationPath, $name);
        //     $data = User::create(['name'=>$req->name,
        //                                'address'=>$req->address,
        //                                'gender'=>$req->gender,
        //                                'number'=>$req->number,
        //                                'email'=>$req->email,
        //                                  'hobby'=>$hobbies,
        //                                   'status'=>$req->status,
        //                                   'image'=>$name,
        //                                     ]);
        //  } 

        return back()->with('message', 'User added successfully!!');
    }

    function getdata(){
        $users = User::all();

        return view('userlist',['users'=>$users]);
    }
    
    function editdata($id){
        $data = User::find($id);
        return view('updateuser',['data'=>$data]);
    }
    function updatedata(Request $req){
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->image = $name;
        $data->address = $req->address;
        $data->gender = $req->gender;
        $data->number = $req->number;
        $data->email = $req->email;
        $data->hobby = json_encode($req->hobby) ;
        $data->status = $req->status;

        $data->save();
        
        return redirect('users');
    }

    function deletedata($id){
        $data = User::find($id);
        $data->delete();

        return redirect('users');
    }
}
