<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignInUp extends Component
{
    public $name,$email,$password,$password_confirmation;
   

    public function render()
    {
        return view('livewire.sign-in-up');
    }
     
    public function signIn(){
        $this->validate([
            'email' => 'required|min:8',
            'password' => 'required|min:6',
        ]);
   
        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){

            return redirect()->route('idea.index')->with('message', "You are Login successful.");
            // session()->flash('message', "You are Login successful.");
        }else{
        session()->flash('error', 'email and password are wrong.');
        }
      }
      public function signUp()
    {
         $val = $this->validate([
            'name' => 'required',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|min:8|confirmed',            
        ]);

        $this->password = Hash::make($this->password); 
        //    $user =  User::create([
        //        'name' => $this->name,
        //        'email' => $this->email,
        //        'password' => $this->password,
        //     ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->avatar = 'https://img.favpng.com/25/13/19/samsung-galaxy-a8-a8-user-login-telephone-avatar-png-favpng-dqKEPfX7hPbc6SMVUCteANKwj.jpg';
        $user->save();
        Auth::login($user);
        return redirect()->route('idea.index')->with('message', "You are Login successful.");

        


        // session()->flash('message', 'Your register successfully Go to the login page.');


    }
}
