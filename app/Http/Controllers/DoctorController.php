<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
        ->when($request->input('name'), function ($query, $doctor_name){
            return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    //create
    public function create()
    {
        return view('pages.doctors.create');
    }

    //store
    public function store()
    {
        request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',

        ]);
        DB::table('doctors')->insert([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'sip' => $request->sip,
        ]);

        return redirect()->route('doctor.index')->with('success', 'Doctor Created Successfuly.');
    }

    //show
    public function show($id)
    {
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view ('pages.doctors.show', compact('doctor'));
    }

    //edit
    public function edit($id)
    {
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view ('pages.doctors.edit', compact('doctor'));
    }

    //update
    public function update(Request $request, $id)
    {([
        'doctor_name' => $request->doctor_name,
        'doctor_specialist' => $request->doctor_specialist,
        'doctor_phone' => $request->doctor_phone,
        'doctor_email' => $request->doctor_email,
        'sip' => $request->sip,
    ]);

    DB::table('doctors')->where('id', $id)->update([
        'doctor_name' => $request->doctor_name,
        'doctor_specialist' => $request->doctor_specialist,
        'doctor_phone' => $request->doctor_phone,
        'doctor_email' => $request->doctor_email,
        'sip' => $request->sip,
    ]);

    return redirect()->route('doctors.index')->with('success', 'Doctor updated successfuly.');

    }

    //destroy
    public function destroy($id)
    {
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }

}
