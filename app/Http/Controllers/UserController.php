<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userform()
    {
        return view('backend.user.addUser');
    }
    public function userstore(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required|min:6',
            ]
        );
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make( $request['password']);
        $user->save();
        session()->flash('User','User Add Successfully');
        return redirect('backend/user/addUser');
    }
    public function userview(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $userView = User::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->paginate(5);
        }
        else
        {
            $userView = User::paginate(5);
        }
        return view('backend/user/viewUser',compact('userView','search'));
    }
    public function useredit($id)
    {   
        $EditUser = User::find($id);
        if(is_null($EditUser))
        {
            return redirect('backend/user/viewUser');
        }
        else
        {
            $url = url('backend/user/updateUser') . "/" . $id;
            return view('backend.user.editUser',compact('EditUser','url'));
        }
    }
    public function userupdate($id, Request $request)
    {
        $user = user::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password =hash::make( $request['password']);
        $user->update();
        session()->flash('update','User Update Successfully');
        return redirect('backend/user/viewUser');
    }
    public function usertrash($id)
    {
        $usertrash = User::find($id);
        if(!is_null($usertrash))
        {
            $usertrash->delete();
        }
            session()->flash('trash','User move to trash successfully');
            return redirect('backend/user/viewUser');
    }
    public function viewusertrash()
    {
        $viewtrash = User::onlyTrashed()->get();
        return view('backend.user.trashUser',compact('viewtrash'));
    }
    public function userrestore($id)
    {
        $userRestore = User::withTrashed()->find($id);
        if(!is_null($userRestore))
        {
            $userRestore->restore();
        }
            session()->flash('restore','User restore successfully');
            return redirect('backend/user/trashUser');
    }
    public function userforcedelete($id)
    {
        $userForceDelete = User::withTrashed()->find($id);
        if(!is_null($userForceDelete))
        {
            $userForceDelete->forceDelete();
        }
        session()->flash('forcedelete','User Delete Successfully');
        return redirect('backend/user/trashUser');
    }
}
