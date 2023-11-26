<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Employee::orderBy('id', 'desc')->get();
        $count = Employee::count();
        return view('employee', [
            'datas' => $datas,
            'count' => $count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'telepon' => 'required',
                'date' => 'required',
                'jabatan' => 'required',
                'pendidikan' => 'required',
                'unit_kerja' => 'required',
                'gender' => 'required',
                'image' => 'required|mimes:pdf,png,jpg,jpeg,gif,webp',
            ],
            [
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'telepon.required' => 'Kolom Telepon tidak boleh kosong',
                'date.required' => 'Kolom Tanggal tidak boleh kosong',
                'jabatan.required' => 'Kolom jabatan tidak boleh kosong',
                'pendidikan.required' => 'Kolom pendidikan belum dipilih',
                'gender.required' => 'Kolom gender  belum dipilih',
                'unit_kerja.required' => 'Kolom unit  belum dipilih',
                'image.required' => 'Silahkan pilih gambar',
                'image.mimes' => 'Tipe File harus PNG, JPG, JPEG, GIF, WEBP',
            ],
        );

        if ($request->hasFile('image')) {
            $fileSurat = $request->file('image');
            $newName = 'Kuli_IT_Tecno' . date('Ymd') . '.' . rand() . '.' . $fileSurat->getClientOriginalExtension();
            $fileSurat->storeAs('public/assets/', $newName);
        }

        $simpan = Employee::create([
            'nama' => $request->nama,
            'tgl_lahir' => $request->date,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'jabatan' => $request->jabatan,
            'foto' => $newName,
        ]);

        $simpan->save();

        return redirect('/employee')
            ->with('success', 'Data Employees sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas = Employee::find($id);
        return view('show', [
            'data' => $datas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = Employee::find($id);
        return view('edit', [
            'data' => $datas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'telepon' => 'required',
                'date' => 'required',
                'jabatan' => 'required',
                'pendidikan' => 'required',
                'unit_kerja' => 'required',
                'gender' => 'required',
                'image' => 'sometimes|mimes:pdf,png,jpg,jpeg,gif,webp',
            ],
            [
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'telepon.required' => 'Kolom Telepon tidak boleh kosong',
                'date.required' => 'Kolom Tanggal tidak boleh kosong',
                'jabatan.required' => 'Kolom jabatan tidak boleh kosong',
                'pendidikan.required' => 'Kolom pendidikan belum dipilih',
                'gender.required' => 'Kolom gender  belum dipilih',
                'unit_kerja.required' => 'Kolom unit  belum dipilih',
                'image.mimes' => 'Tipe File harus PNG, JPG, JPEG, GIF, WEBP',
            ]
        );

        $employee = Employee::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('public/assets/' . $employee->foto);
            $fileSurat = $request->file('image');
            $newName = 'Kuli_IT_Tecno' . date('Ymd') . '.' . rand() . '.' . $fileSurat->getClientOriginalExtension();
            $fileSurat->storeAs('public/assets/', $newName);
            $employee->update([
                'foto' => $newName,
            ]);
        }

        $employee->update([
            'nama' => $request->nama,
            'tgl_lahir' => $request->date,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'jabatan' => $request->jabatan,
        ]);

        return redirect('/employee')->with('success', 'Data Employees berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Employee::find($id);
        Storage::delete('public/assets/'. $delete->foto);
        $delete->delete();

        return redirect()
            ->back()
            ->with('success', 'Nama '.$delete->nama .' success dihapus !!');
    }
}
