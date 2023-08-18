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
        return view('super-admin.new-archivist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $archivist = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'type' => 'Archiviste',
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

        return view('super-admin.new-archivist', [
            'archivist' => $archivist,
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

        $archivist->firstname = $request->firstname;
        $archivist->lastname = $request->lastname;
        $archivist->email = $request->email;
        $archivist->phone_number = $request->phone_number;

        $archivist->save();

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
}
