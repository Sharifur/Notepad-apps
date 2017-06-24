<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
class NoteController extends Controller {

    public function index() {

        $id = Auth::user()->id;
        $alluser = User::select()->first();
        $alldata = Profile::where('user_id', $id)->first();
        $allnotes = Notebook::Select()->where('user_id', $id)->paginate(12);
        return view('index')
                        ->with('alluser', $alluser)
                        ->with('alldata', $alldata)
                        ->with('allnotes', $allnotes)
                        ->with('id', $id);
    }

    public function create() {
        return view('notesCreate');
    }

    public function NoteStore(Request $request) {
        $this->validate($request, [
            'title' => 'required | unique:notebooks,title|max:55',
            'descr' => 'required',
            'picture' => 'nullable | mimes:jpeg,jpg,png,jpg,bmp,gif | max:2450'
        ]);
        $picture = $request->picture;
        if($picture == ""){
            $ext = "";
        }else{
            
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'bmp' && $ext != 'gif') {
                $ext = "";
            }
        }
        }
        $data = [
            'title' => $request->title,
            'user_id' => $request->user_id,
            'description' => $request->descr,
            'picture' => $ext
        ];
        $uid = Notebook::create($data)->id;
        if($ext != "" ){
        $picture->move("images/notes/", "npic-{$uid}.{$ext}");
         }
        return redirect('/');
    }
    public function NoteEdit($id){
        $match = Notebook::select()->where('id' ,$id)->get();
        
        return view('notesEdit', compact('match'));
    }
    public function NoteUpdate($id, Request $request){
        $match = Notebook::select()->where('id', $id )->get();
        foreach($match as $note){
         $old_extt = $note->picture;
        }
        $this->validate($request, [
            'title' => 'required | unique:notebooks,title|max:55',
            'descr' => 'required',
            'picture' => 'nullable | mimes:jpeg,jpg,png,jpg,bmp,gif | max:2450'
        ]);
       $picture = $request->picture;
        
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'bmp' && $ext != 'gif') {
                $ext = $old_extt;
            }else {
                if (\file_exists("images/notes/npic-{$id}.{$old_extt}")) {
                    unlink("images/notes/npic-{$id}.{$old_extt}");
                }
                $picture->move("images/notes", "npic-{$id}.{$ext}");
            }
        } else {
            $ext = $old_extt;
        }
        $data = [
            'title' => $request->title,
            'user_id' => $request->user_id,
            'description' => $request->descr,
            'picture' => $ext
        ];
        
        Notebook::where('id' ,$id )->update($data);
        
        return redirect('/');
        
    }
    public function FullNote($id){
        $allnotes = Notebook::select()->where('id',$id)->first();
        return view('noteShow', compact("allnotes"));
    }
    public function NoteDelete($id){
        Notebook::where('id',$id)->delete();
        return redirect('/');
        }

}
