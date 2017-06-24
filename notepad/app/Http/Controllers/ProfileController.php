<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

    public function index() {
        $id = Auth::user()->id;
        $alluser = User::select()->first();
        $alldata = Profile::where('user_id', $id)->first();
        return view('profile')
                        ->with('alluser', $alluser)
                        ->with('alldata', $alldata)
                        ->with('id', $id);
    }

    public function create() {
        return view('profileEdit');
    }
    public function edit($id) {
        
        $alluser = User::select()->first();
        $uid = Auth::user()->id;
        $alldata = Profile::where('user_id', $id)->first();
        return view('profileEdit')
                        ->with('alldata', $alldata)
                        ->with('alluser', $alluser)
                        ->with('id', $id);
    }

    public function update(Request $request, $id) {
        
        $this->validate($request, [
            'city' => 'required',
            'country' => 'required',
            'address' => 'required'
        ]);
        $data = [
            'user_id' => $request->user_id,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'picture' => ''
        ];
        Profile::where('id', $id)->update($data);

        return redirect('/profile');
    }
    public function ProfileCreate() {
        return view('profileCreate');
    }

    public function ProfileStore(Request $request) {

        $uid = Auth::user()->id;
        $this->validate($request, [
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'picture'=>'required'
        ]);
        $pic = $request->picture;
        if ($pic) {
            $ext = strtolower($pic->getClientOriginalExtension());
            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
                $ext = "";
            }
        }
        $data = [
            'user_id' => $request->user_id,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'picture' => $ext
        ];
        Profile::create($data);
        if ($ext) {
            $pic->move("images/profile", "pic-{$uid}.{$ext}");
        };
        return redirect('/');
    }
    public  function pictureUpload( $id, Request $request){
        $allprofile = DB::table('profiles')->select()->where('user_id', $id)->get();
         foreach ($allprofile as $pdt) {
            $old_ext = $pdt->picture;
        }
        
        
        $this->validate($request, [
            'pic'=>'required'
        ]);
        $pic = $request->pic;
        if ($pic) {
            $ext = strtolower($pic->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext = 'gif') {
                $ext = $old_ext;
            } else {
                if (file_exists("images/profile/pic-{$id}.{$old_ext}")) {
                    unlink("images/profile/pic-{$id}.{$old_ext}");
                }
                $pic->move("images/profile", "pic-{$id}.{$ext}");
            }
        } else {
            $ext = $old_ext;
        }
        $data = [
          'picture' => $ext  
        ];
        
        
        DB::table('profiles')->where('user_id', $id)->update($data);
        
        return redirect('/profile');
    }

}
