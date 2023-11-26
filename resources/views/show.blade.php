@extends('layouts.app')
@section('title', 'employees')
@section('content')
    <div class="bg-white p-5 shadow-inner">
        <div class="card lg:card-side bg-base-100 border shadow-inner">
            <figure>
                <img src="{{ asset('/storage/assets/' . $data->foto) }}" alt="Employee Photo">
            </figure>
            <div class="card-body">
                <div class="breadcrumbs text-sm">
                    <ul>
                        <li>
                            <a href="/">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="h-4 w-4 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="/employee">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="h-4 w-4 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg>
                                Detail
                            </a>
                        </li>
                        <li>
                            <span class="inline-flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="h-4 w-4 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                {{ $data->nama }}
                            </span>
                        </li>
                    </ul>
                </div>
                <h1 class="">Nama </h1>
                <kbd class="kbd kbd-md">{{ $data->nama }}</kbd>
                <h1 class="">Telepon </h1>
                <kbd class="kbd kbd-md">{{ $data->telepon }}</kbd>
                <h1 class="">gender </h1>
                <kbd class="kbd kbd-md">
                    @if ($data->gender == 'L')
                        Laki-laki
                    @elseif ($data->gender == 'P')
                        Perempuan
                    @endif
                </kbd>
                <h1 class="">Tanggal Lahir </h1>
                <kbd class="kbd kbd-md">{{ $data->tgl_lahir }}</kbd>
                <h1 class="">Pendidikan </h1>
                <kbd class="kbd kbd-md">{{ $data->pendidikan }}</kbd>
                <h1 class="">Jabatan </h1>
                <kbd class="kbd kbd-md">{{ $data->jabatan }}</kbd>
                <h1 class="">Unit Kerja </h1>
                <kbd class="kbd kbd-md">{{ $data->unit_kerja }}</kbd>
            </div>
        </div>
    </div>
@endsection
