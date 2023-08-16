<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
        $users = User::where('type', '<>', 'Super Administrateur')->get();

        return response()->json([
            'data' => $users,
            'message' => 'Archivistes récupérés avec succès'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'type' => 'Archiviste',
            'password' => Str::random(8),
        ]);

        $status = Password::sendResetLink(
            $request->only('email'),
            function ($message) use($user) {
                $message->notify(new NewAccountNotification($user));
            }
        );

         if($status == Password::RESET_LINK_SENT)
         {
            return response()->json([
                'data' => $user,
                'message' => 'Compte Archiviste crée avec succès'
            ]);
         }
         else
         {
            $last_user = User::where('email', $request->email)->first();

            if($last_user)
            {
                $last_user->delete();
            }

            return response()->json([
                'message' => __($status)
            ]);

            // return back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $user = User::findOrFail(intval($id));

        return response()->json([
            'data' => $user,
            'message' => 'Profil édité avec succès'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail(intval($id));

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        $user->save();

        return response()->json([
            'data' => $user,
            'message' => 'Pofil modifié '.$request->role.' avec succès'
        ]);
    }

    public function enableOrDisable(int $id)
    {

        $user = User::where('type', '<>', 'Super Administrateur')->findOrfail(intval($id));

        $user->status ? $user->update(['status' => false]) : $user->update(['status' => true]);

        return response()->json([
            'data' => $user,
            'message' => $user->status ? 'Compte activé avec succès' : 'Compte désactivé avec succès'
        ]);
    }
}
