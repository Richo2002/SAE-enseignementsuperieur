<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use App\Notifications\NewAccountNotification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $archivists = User::where('type', '<>', 'Super Administrateur')->get();

        return view('super-admin.archivists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('super-admin.new-archivist', [
            'departments' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'direction' => 'required',
        ]);

        $department = Department::where('name', $request->direction)->first();

        if($department === null){
            $department = Department::create([
                'name' => $request->direction,
            ]);
        }

        $archivist = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'type' => 'Archiviste',
            'department_id' => $department->id,
            'password' => Str::random(8),
        ]);

        $status = Password::sendResetLink(
            $request->only('email'),
            function ($message) use($archivist) {
                $message->notify(new NewAccountNotification($archivist));
            }
        );

         if($status == Password::RESET_LINK_SENT)
         {
            return redirect()->route('archivists.index');
         }
         else
         {
            $last_user = User::where('email', $request->email)->first();

            if($last_user)
            {
                $last_user->delete();
            }

            return back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $archivist = User::findOrFail(intval($id));
        $departments = Department::all();

        return view('super-admin.new-archivist', [
            'archivist' => $archivist,
            'departments' => $departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, int $id)
    {
        $archivist = User::findOrFail(intval($id));

        $department = Department::where('name', $request->direction)->first();

        if($department === null){
            $department = Department::create([
                'name' => $request->direction,
            ]);
        }

        $archivist->firstname = $request->firstname;
        $archivist->lastname = $request->lastname;
        $archivist->email = $request->email;
        $archivist->phone_number = $request->phone_number;
        $archivist->department_id = $department->id;

        $archivist->save();

        return redirect()->route('archivists.index');
    }

    public function getProfile(int $id)
    {
        $archivist = User::findOrFail(intval($id));

        return view('archivistes.archivist-profile', [
            'archivist' => $archivist
        ]);
    }

    public function enableOrDisable(int $id)
    {
        $archivist = User::where('type', '<>', 'Super Administrateur')->findOrfail(intval($id));

        $archivist->status ? $archivist->update(['status' => false]) : $archivist->update(['status' => true]);

        session()->flash('message', $archivist->status ? 'Compte activé avec succès' : 'Compte désactivé avec succès');
        return redirect()->route('archivists.index');
    }

    public function getArhivistsWhoDoesntHaveDirection()
    {
        $archivists = User::where('type', '<>', 'Super Administrateur')
                            ->where('status', true)
                            ->whereDoesntHave('direction')
                            ->get();

        return response()->json([
            'data' => $archivists,
            'message' => 'Archivistes récupérés avec succès'
        ]);
    }

    public function destroy(int $id)
    {
        $archivist = User::where('type', '<>', 'Super Administrateur')->findOrfail(intval($id));
        if ($archivist) {
            $archivist->delete();
        }

        session()->flash('message', $archivist->status ? 'Compte activé avec succès' : 'Compte désactivé avec succès');
        return redirect()->route('archivists.index');
    }
}
