<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function savedata(Request $req){
        $this->validate($req, [
            'image'=> 'required|max:2048|mimes:jpeg,png,jpg',
            'name'=> 'required|string|max:50|alpha_spaces',
            'gender'=> 'required',
            'number'=> 'required|unique:users',
            'email'=> 'required|string|email|max:100|unique:users',
            'hobby'=> 'required|array',
            'status'=> 'required'
        ]);
        $hobbies->hobby = json_encode($req->hobby);
        $image = $req->file('image');
        if ($req->hasFile('image')) { 
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data = User::create(['name'=>$req->name,
                                       'address'=>$req->address,
                                       'gender'=>$req->gender,
                                       'number'=>$req->number,
                                       'email'=>$req->email,
                                         'hobby'=>$hobbies,
                                          'status'=>$req->status,
                                          'image'=>$name,
                                            ]);
         } 

        return back()->with('message', 'User added successfully!!');
    }

    function getdata(){
        $users = User::all();

        return view('userlist',['users'=>$users]);
    }
    
    function editdata($id){
        $data = User::find($id);
        return view('updateuser',['data'=>$data,'hobbies' => explode(',', implode($data->hobby))]);
    }
    function updatedata(Request $req){
        $data = User::find($req->id);
        $data->update($req->all());
        
        return redirect('users');
    }

    function deletedata($id){
        $data = User::find($id);
        $data->delete();

        return redirect('users');
    }
}
