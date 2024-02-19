<?php

namespace App\Http\Controllers\CommonControllerPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'nullable',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:30000'
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if (isset($request->image)) {
            // upload image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile'), $imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return back()->withSuccess("Profile Updated Successfully!");
    }
}
