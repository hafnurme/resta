<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function makeConsule(Request $request)
    {
        $request->validate([
            'disease_history' => 'required|string|max:255',
            'current_symptoms' => 'required|string|max:255'
        ]);

        $consultation = Consultation::create([
            'disease_history' => $request->disease_history,
            'current_symptoms' => $request->current_symptoms,
            'user_id' => $request->user()->id
        ]);

        return  response()->json([
            'message'=> 'Request consultation sent successfull'
        ]);
    }

    public function consulecond(Request $request)
    {
        $consultation = Consultation::with('user')->get();

        return  response()->json([
            'consultations' => $consultation,
        ]);
    }
    
}
