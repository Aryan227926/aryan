<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class Userscontroller extends Controller
{

  public function demo(){
    return "amit";
  }
    public function index(){
         $users = User::all();
         return view('users.index', compact('users'));
    }


     //..................Create..................//

    public function create(){
         return view('users.create');
    }

       //..................Store.................//

    public function store( Request $request){
      $image='';
      if($request->image && $request->hasfile('image'))
      {
        $file = $request->image;
        $filename = time().'-'.rand(1000,100000).'-'.$file->getClientOriginalName();
        $path = public_path().'/uploads';
        $file ->move($path , $filename);
        $image = $filename;
      }



     $data = [
       'name' => $request->get('name'),
       'email' => $request->get('email'),
       'password' => $request->get('password'),
       'image' => $image
     ];
     User::insert($data);
     return redirect()->route('users.index');
    }


      //......................Delete...............//

    public function delete($id){
     if(!$id){
          return redirect()->back();
     }
     $users = user::find($id);

     if($users){
          $users->delete();
          return redirect()->back();
     }
     
    }
      //.......................Edit...................//

    public function edit($id){
        if(!$id){
          return redirect()->back();
        }

        $users= user::find($id);
        if($users){
          return view('users.edit', compact('users'));
        }
        return redirect()->back();
    }


     //......................Update....................//

     public function update(Request $request,$id){           
      if(!$id)
      {
          return redirect()->back();
      }
    
      $user = User::find($id);
      if($user){
          $image = '';
          if($request->image && $request->hasfile('image')){
              $delete_path =public_path().'/uploads'.$user->image;
              $file = $request->image;
              $filename = time().'-'.rand(1000,100000).'-'.$file->getClientOriginalName();
              $path=public_path().'/uploads';
              $file->move($path,$filename);
              $image = $filename;
          }
  

          $data = [
              'name' => $request->get('name'),
              'email' => $request->get('email'),
              'password' => $request->get('password'),
              'image' => $image
          ];
          User::where('id',$id)->update($data);
          return redirect()->route('users.index');
      }
      return redirect()->back();
     }
    

 }
 