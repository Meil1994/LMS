<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('profile.AccountInfo' , compact('user'));
    }

    public function personal(){
        $user = Auth::user();
        return view('profile.PersonalInfo', compact('user'));
    }

    public function modules(){
        $user = Auth::user();
        return view('profile.ModulesInfo', compact('user'));
    }

    public function notes()
    {
        $user = Auth::user();
        $notes = $user->notes()->get(); 
        
        return view('profile.NotesInfo', compact('user', 'notes'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'username' => 'sometimes|unique:users,username,' . $user->id,
            'password' => 'sometimes',
            'logo' => 'sometimes|image|max:2048'
        ]);
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        if(isset($validatedData['password'])){
            $user->password = bcrypt($validatedData['password']);
        }
    
        if ($request->hasFile('logo')) {
            if($user->logo) {
                Storage::disk('public')->delete($user->logo);
            }
            $logoPath = $request->file('logo')->store('uploads', 'public');
            $validatedData['logo'] = $logoPath;
            $user->logo = $logoPath;
        }
        $user->save();
        return redirect('/profile')->with('message', 'Profile updated successfully.');
    }


    public function updatePersonal(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'user_type' => 'sometimes',
            'firstname' => 'sometimes',
            'middlename' => 'sometimes',
            'lastname' => 'sometimes',
            'phone_number' => 'sometimes|unique:users,phone_number,' . $user->id,
            'birthday' => 'sometimes',
            'gender' => 'required',
            'address' => 'sometimes',

        ]);
        $user->user_type = $validatedData['user_type'];
        $user->firstname = $validatedData['firstname'];
        $user->middlename = $validatedData['middlename'];
        $user->lastname = $validatedData['lastname'];
        $user->phone_number = $validatedData['phone_number'];
        $user->birthday = $validatedData['birthday'];
        $user->gender = $validatedData['gender'];
        $user->address = $validatedData['address'];
        
        $user->save();
        return redirect('/personal')->with('message', 'Profile updated successfully.');
    }

    public function note(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Notes::create($formFields);
        return redirect('/notes')->with('message', 'Note saved successfully!');
    }

    public function singleNote(Notes $note){
        $user = Auth::user();
        return view('profile.NoteSingle', compact('note', 'user'));
    }

    public function destroy(Notes $note)
    {
        $note->delete();
        return redirect('/notes')->with('message', 'Note deleted successfully!');
    }

    public function updateNote(Request $request, Notes $note)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);

        $note->update($validatedData);
        return back()->with('message', 'Note updated successfully!');
    }

    
}
