<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Auth::user();

        return view('home')->with('user',$user);
    }
    public function edit()
    {   
        $user = Auth::user();

        return view('edit')->with('user',$user);
    }
    public function update()
    {
        //get the authenticated user
        $user =Auth::user();

        //get the data from the form
        $data=request()->all();
     
       if($data['email']!=$user->email)
        {
            $this->validate(request(),[
                'email' => 'string|email|max:255|unique:users',
            ]);
        }
        //check if the user add new password
        if($data['password']!= "")
        {
            $this->validate(request(),[     
                'password' => 'string|min:8',
            ]);

            $user->password= Hash::make($data['password']);
        }
        //check if the user add new photo
        if($data['image'] != null)
        {
            $this->validate(request(),[
                'image' => 'image'
            ]);
            //delete the old image from storage
            Storage::delete($user->image);
            //add the new one
            $image= $data['image']->store('profile');
            $user->image = $image;

            
        }

        $user->name= $data['name'];
        $user->email= $data['email'];

        $user->save();
        session()->flash('success','Profile Updated successfully');
        return redirect('/home'); 
    }
    
}
