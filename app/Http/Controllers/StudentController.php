<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students|max:20',
            'name' => 'required|max:100',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'birth_place' => 'required|max:50',
            'address' => 'required',
            'phone' => 'required|max:15',
            'email' => 'required|email|unique:students',
            'class' => 'required|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('student_photos', 'public');
            $data['photo'] = $photoPath;
        }

        Student::create($data);

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required|max:20|unique:students,nis,'.$student->id,
            'name' => 'required|max:100',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'birth_place' => 'required|max:50',
            'address' => 'required',
            'phone' => 'required|max:15',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'class' => 'required|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            
            $photoPath = $request->file('photo')->store('student_photos', 'public');
            $data['photo'] = $photoPath;
        }

        $student->update($data);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}