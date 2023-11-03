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
        //
        $students = Student::all();

        if (!empty($students)) {
            $respons = [
                'pesan' => 'Menampilkan semua data murid',
                'data' => $students,
            ];
            return response()->json($respons, 200);
        } else {
            $respons = [
                'pesan' => 'Tidak ada data'
            ];
            return response()->json($respons, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $respons = [
            'pesan' => 'Data berhasil dibuat',
            'data' => $student
        ];

        return response()->json($respons, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = Student::find($id);

        if ($student) {
            $response = [
                'message' => 'Get detail student',
                'data' => $student
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $student = Student::find($id);

        // $student->nama = $request->nama ?? $student->nama;
        // $student->nim = $request->nim ?? $student->nim;
        // $student->email = $request->email ?? $student->email;
        // $student->jurusan = $request->jurusan ?? $student->jurusan;
        // $student->save();

        if ($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $respons = [
                'pesan' => 'Data berhasil diubah',
                'data' => $student
            ];

            return response()->json($respons, 201);
        } else {
            $respons = [
                'pesan' => 'Data tidak ditemukan'
            ];
            return response()->json($respons, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // old
        // Student::find($id)->delete();
        // $respons = [
        //     'pesan' => 'Data berhasil dihapus'
        // ];
        // return response()->json($respons, 200);

        $student = Student::find($id);

        if ($student) {
            $response = [
                'message' => 'Student is delete',
                'data' => $student->delete()
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response, 404);
        }
    }
}
