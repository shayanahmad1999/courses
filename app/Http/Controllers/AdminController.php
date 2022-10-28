<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\course;

class AdminController extends Controller
{
    public function viewform()
    {
        return view('backend.admin.addAdmin');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'password'=>'required|min:6',
            ]
        );
        $admin = new admin;

        $admin->adminFirstName = $request['firstname'];
        $admin->adminLastName = $request['lastname'];
        $admin->adminEmail = $request['email'];
        $admin->adminPassword = Hash::make($request['password']);
        $image = time() . '-img.' . $request->file('image')->getClientOriginalExtension();
        $admin->adminImage = $request->file('image')->move('uploads/',$image);
        $admin->adminAddress = $request['address'];
        $admin->save();
        session()->flash('admin','Admin Add Successfuly');
        return redirect('backend/admin/addAdmin');
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $AdminView = admin::where('adminFirstName','LIKE',"%$search%")->orwhere('adminLastName','LIKE',"%$search%")->orwhere('adminEmail','LIKE',"%$search%")->paginate(5);
        }
        else
        {
            $AdminView = admin::paginate(5);
        }
        return view('backend.admin.viewAdmin',compact('AdminView','search'));
    }
    public function edit($id)
    {
        $admin = admin::find($id);
        if(is_null($admin))
        {
            return redirect('backend/admin/viewAdmin');
        }
        else
        {
            return view('backend.admin.editAdmin',compact('admin'));
        }
    }
    public function update($id, Request $request)
    {
       $admin = admin::find($id);
       $admin->adminFirstName = $request['firstname'];
       $admin->adminLastName = $request['lastname'];
       $admin->adminEmail = $request['email'];
       $admin->adminPassword = Hash::make($request['password']);
       if($request->hasfile('image'))
       {
            $imageExist = 'uploads/' . $admin->adminImage;
            if(File::exists($imageExist))
            {
                File::delete($imageExist);
            }
            $image = time() . '-img.' . $request->file('image')->getClientOriginalExtension();
            $admin->adminImage = $request->file('image')->move('uploads/',$image);
       }
       $admin->adminAddress = $request['address'];
       $admin->update();
       session()->flash('update','Admin Update Successfuly');
       return redirect('backend/admin/viewAdmin');
    }
    public function Status($id)
    {
        $changeStatus = admin::select('adminStatus')->where('adminId',$id)->first();
        if($changeStatus->adminStatus == 1)
        {
            $status = 0;
        }
        else
        {
            $status = 1;
        }
        admin::where('adminId',$id)->update(['adminStatus'=>$status]);
        return redirect('backend/admin/viewAdmin');
    }
    public function delete($id)
    {
        $adminDelete = admin::find($id);
        if(!is_null($adminDelete))
        {
            $adminDelete->delete();
        }
        session()->flash('trash','Admin move to Trash Successfully');
        return redirect('backend/admin/viewAdmin');
    }
    public function trash()
    {
        $adminTrash = admin::onlyTrashed()->get();
        return view('backend.admin.trashAdmin',compact('adminTrash'));
    }
    public function restore($id)
    {
        $adminRestore = admin::withTrashed()->find($id);
        if(!is_null($adminRestore))
        {
            $adminRestore->restore();
        }
        session()->flash('restore','Admin Restore Successfully');
        return redirect('backend/admin/trashAdmin');
    }
    public function forcedelete($id)
    {
        $adminRestore = admin::withTrashed()->find($id);
        if(!is_null($adminRestore))
        {
            $adminRestore->forcedelete();
        }
        session()->flash('forcedelete','Admin Delete Successfully');
        return redirect('backend/admin/trashAdmin');
    }
    public function create()
    {
        return view('backend.admin.adminlogin');
    }
    public function loginstore(Request $request)
    {
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ]
        ); 
        $logininfo = Admin::where('adminEmail','=',$request->email)->first();
        if(!$logininfo)
        {
            return back()->with('fail','we do not recognize your email address');
        }
        else
        {
            if(Hash::check($request->password, $logininfo->adminPassword))
            {
                $request->session()->put('LoggedAdminID', $logininfo->adminId);
                $request->session()->put('LoggedAdminFName', $logininfo->adminFirstName);
                $request->session()->put('LoggedAdminLName', $logininfo->adminLastName);
                $request->session()->put('LoggedAdminImage', $logininfo->adminImage);
                return redirect('/backend/home');
            }
            else
            {
                return back()->with('fail','incorrect password');
            }
        }
    }
    public function adminlogout()
    {
        if(session()->has('LoggedAdminID'))
        {
            session()->pull('LoggedAdminID');
            return redirect('backend/admin/adminlogin');
        }
    }
    public function homeview()
    {
        $data = ['login'=>admin::where('adminId','=',session('LoggedAdmin'))->first()];
        return view('backend.home',$data);
    }
}
