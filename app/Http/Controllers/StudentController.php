<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $studenti = Student::orderBy('prezime')->get();

    return view('studenti.index', compact('studenti'));
}

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    return view('studenti.create');
}

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
    {
        $validated = $request->validate([
            'ime' => ['required', 'string', 'min:2', 'max:60'],
            'prezime' => ['required', 'string', 'min:2', 'max:80'],
            'status' => ['required', 'in:redovni,izvanredni'],
            'godiste' => ['required','integer','between:1980,'.date('Y')],
            'prosjek' => ['required', 'numeric','between:1,5'],
        ]);

        Student::create($validated);

        return redirect()->route('studenti.index')->with('uspjeh', 'Student je uspješno dodan.');
    }

    /**
     * Display the specified resource.
     */
 
public function show(Student $student)
{
    return view('studenti.show', compact('student'));
}

    /**
     * Show the form for editing the specified resource.
     */
 public function edit(Student $student)
{
    return view('studenti.edit', compact('student'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Student $student)
{
    $validated = $request->validate(
        [
            'ime' => ['required', 'string', 'min:2', 'max:60'],
            'prezime' => ['required', 'string', 'min:2', 'max:80'],
            'status' => ['required', 'in:redovni,izvanredni'],
            'godiste' => ['required', 'integer', 'between:1980,' . date('Y')],
            'prosjek' => ['required', 'numeric', 'between:1,5'],
        ],
        [
            'status.in' => 'Status mora biti redovni ili izvanredni.',
            'prosjek.between' => 'Prosjek mora biti između 1.00 i 5.00.',
            'godiste.between' => 'Godište mora biti između 1980 i tekuće godine.',
        ]
    );

    $student->update($validated);

    return redirect()
        ->route('studenti.index')
        ->with('uspjeh', 'Student je uspješno ažuriran.');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Student $student)
{
    $student->delete();

    return redirect()
        ->route('studenti.index')
        ->with('uspjeh', 'Student je obrisan.');
}
}
