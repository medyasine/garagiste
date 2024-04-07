<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create()
    {
        return view('posts.mngUser.creationUser');
    }

    public function index()
    {
        $users = User::all();
        return view('posts.mngUser.showUsers', ['users' => $users]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required',
            'phoneNumber' => 'required',
        ]);

        $user = new User();

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phoneNumber = $request->phoneNumber;

        $user->isClt = true;
        $user->isAdmine = false;
        $user->isMecan = false;

        $user->save();

        return redirect()->route('mngUser.users')->with('success', 'Client created successfully.');
    }




    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('usermanage.users')->with('success', 'Client deleted successfully.');
    }
}
