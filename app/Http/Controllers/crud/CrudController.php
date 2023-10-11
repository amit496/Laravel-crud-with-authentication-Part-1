<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\crud\CrudModel;
use Hash;
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crud.pages.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submit(request $request)
    {
        $request->validate([
            'username' => 'required|alpha|min:3',
            'useremail' => 'required|email|unique:crud_table,email',
            'usercontact' => 'required|numeric|min:10',
            'userpassword' => 'required|min:8',
            'userconfirmpassword' => 'required|min:8|same:userpassword',
            'userprofile' => 'required|mimes:jpg,png,webp,jpeg',
        ]);

        $image_name = $request->file('userprofile');
        $image_rename = $request->input('username'). '_' .time() . '.' .$image_name->getClientOriginalExtension();
        $file_located = public_path('/crud_asset/image/');
        $cruddata = new CrudModel;
        $cruddata->name = $request->input('username');
        $cruddata->email = $request->input('useremail');
        $cruddata->contact = $request->input('usercontact');
        $cruddata->profile = $image_rename;
        $cruddata->password = Hash::make($request->input('userpassword'));
        $cruddata->save();
        if($cruddata)
        {
            $image_name->move($file_located,$image_rename);
            return redirect()->route('view.data')->with('success', 'Record Successfully Added');
        }
        else
        {
            return redirect()->back()->with('error', 'Record Not Successfully Added');
        }
    }

    public function showdata()
    {
        $cruddata = CrudModel::all();
        return view('crud.pages.show', compact('cruddata'));
    }

    public function updateview($id)
    {
        $update = CrudModel::find($id);
        return view('crud.pages.edit', compact('update'));

    }

    public function updatedate(Request $request, $id)
    {
        $edit_data = CrudModel::find($id);
        if($request->file('userprofile'))
        {
            $imagename = $request->file('userprofile');
            $imagerename = $request->input('username') . '_' . time() . '.' . $imagename->getClientOriginalExtension();
            $located = public_path('/crud_asset/image/');
            $edit_data->name = $request->input('username');
            $edit_data->email = $request->input('useremail');
            $edit_data->contact = $request->input('usercontact');
            $edit_data->profile = $imagerename;
            $edit_data->update();
            if($edit_data)
            {
                $imagename->move($located, $imagerename );
                return redirect()->route('view.data')->with('success', 'Record has been update successfully');
            }
            else
            {
                return redirect()->back()->with('error', 'Record has not been update successfully');
            }
        }
        else
        {
            $edit_data->name = $request->input('username');
            $edit_data->email = $request->input('useremail');
            $edit_data->contact = $request->input('usercontact');
            $edit_data->update();
            if($edit_data)
            {
                return redirect()->route('view.data')->with('success', 'Record Has Been Successfully Update');
            }
            else
            {
                return redirect()->back()->with('error', 'Record Has Not Been Successfully Update');
            }
        }
    }

    public function deleterecord(request $request, $id)
    {
        $delete_data = CrudModel::find($id);
        $delete_data->delete();
        if($delete_data)
        {
            return redirect()->back()->with('success', 'Record Has Been Successfully Delete.');
        }
        else
        {
            return redirect()->back()->with('error', 'Record Has Not Been Successfully Delete');
        }

    }

    public function passwordview($id)
    {
        $update_view = CrudModel::find($id);
        return view('crud.pages.password', compact('update_view'));
    }

    public function updatepassword(request $request, $id)
    {
        $request->validate([
            'oldpassword' => 'required|min:8',
            'newpassword' => 'required|min:8',
            'newconfirmpassword' => 'required|min:8|same:newpassword',
        ]);
        $updatepassword = CrudModel::find($id);
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('newpassword');
        $confirmpassword = $request->input('newconfirmpassword');
        if($updatepassword)
        {
            $password_check =  Hash::check($oldpassword, $updatepassword->password);
            if($password_check)
            {
                $updatepassword->password = Hash::make($newpassword);
                $updatepassword->update();
                if($updatepassword)
                {
                    return redirect()->route('view.data')->with('success', 'Password Has Been Successfully Updated.');
                }
                else
                {
                    return redirect()->back()->with('error', 'Password Has Not Been Successfully Updated');
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Old Password Not Match');
            }
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
