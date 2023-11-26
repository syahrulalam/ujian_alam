@extends('layouts.app')
@section('title', 'employees')
@section('content')
    <div class="bg-white p-5 shadow-inner">
        <a href="/employee/create" class="btn mb-3">Tambah Data <i class="fa-solid fa-user-plus"></i></a>
        <div class="overflow-x-auto bg-base-100 shadow-inner border rounded">
            <h1 class="p-3 font-weight-bold text-gray-500 text-sm"><i class="fa-solid fa-earth-americas"></i> Jumlah Data : {{ $count }}</h1>
            <div class="p-2">
                @if (session('success'))
                    <div role="alert" class="alert shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="stroke-info h-6 w-6 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold">NOTIFICATION SUCCESS !!</h3>
                            <div class="text-xs"> {{ session('success') }}</div>
                        </div>
                        <button class="btn btn-sm" onclick="refreshPage()">Refresh</button>
                    </div>
                @endif
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Telepon</th>
                        <th>Gender</th>
                        <th>Unit Kerja</th>
                        <th>Jabatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama}}</td>
                            <td>{{ $data->telepon }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->unit_kerja }}</td>
                            <td>{{ $data->jabatan }}</td>
                            <th>
                                <form action="/employee/{{ $data->id }}/delete" method="POST" onsubmit="return confirm('Apakah Anda Yakin Data {{ $data->nama }} ?');">
                                    @csrf
                                    @method('DELETE')

                                    <a href="/employee/{{ $data->id }}/{{str_replace(" ","-","$data->nama")}}/edit" class="btn btn-ghost btn-xs"> <i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="/employee/{{ $data->id }}/{{str_replace(" ","-","$data->nama")}}" class="btn btn-ghost btn-xs"><i
                                        class="fa-solid fa-eye" style="color: #0a5ef0;"></i></a>
                                    <button type="submit" class="btn btn-ghost btn-xs"><i class="fa-solid fa-trash"
                                            style="color: #dc0909;"></i></button>
                                </form>
                            </th>
                        </tr>
                    @endforeach

            </table>
        </div>
    </div>
@endsection
