<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Type;
use App\Models\User;
use App\Models\Category;
use App\Models\Resource;
use App\Models\Institute;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Models\Direction;

class MainController extends Controller
{
    public function createSuperAdminAccount(Request $request)
    {
        $superAdmin = User::where('type', 'Super Administrateur')->first();

        if($superAdmin)
        {
            return response()->json([
                'data' => $superAdmin,
                'message' => "Le super administrateur avait déja été enregistrer"
            ]);
        }

        $superAdmin = User::create([
            'firstname' => 'Guy',
            'lastname' => 'KPEDJO',
            'email' => 'gkpedjo@gmail.com',
            'phone_number' => '63053905',
            'type' => 'Super Administrateur',
            'password' => 'password',
        ]);

        return response()->json([
            'data' => $superAdmin,
            'message' => 'Le super administrateur a été enregistré avec succès'
        ]);
    }

    public function filingPlan()
    {
        $filingPlan = Direction::all();

        return view('super-admin.filing-plan', [
            'filingPlan' => $filingPlan
        ]);
    }
}
