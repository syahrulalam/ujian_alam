@extends('layouts.app')
@section('title', 'employees')
@section('content')
    <div class="bg-white p-5 shadow-inner">
        <h1 class="m-3">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>
                        <a href="/employee">
                            <span class="inline-flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="h-4 w-4 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg>
                                Home
                            </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="inline-flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="h-4 w-4 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg>
                                Create
                            </span>
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
                            Employee
                        </span>
                    </li>
                </ul>
            </div>
        </h1>
        <div class="w-full p-5 shadow-sm bg-base-100 shadow-inner border rounded">
            <form action="/employee/{{ $data->id }}/update/" method="post" enctype="multipart/form-data" class="md:flex">
                @csrf
                <div class="md:w-1/2">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700" for="nama">
                            Nama
                        </label>
                        <input type="text" name="nama" id="nama" placeholder="Nama"
                            class="input input-bordered mt-1 w-full max-w-md" value="{{ $data->nama }}" />
                        @error('nama')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700" for="telepon">
                            Telepon
                        </label>
                        <input type="text" name="telepon" id="telepon" placeholder="Telepon"
                            class="input input-bordered mt-1 w-full max-w-md" value="{{  $data->telepon  }}" />
                        @error('telepon')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700" for="date">
                            Tanggal Lahir
                        </label>
                        <input type="date" name="date" id="date" value="{{ $data->tgl_lahir  }}"
                            class="input input-bordered mt-1 w-full max-w-md" />
                        @error('date')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700" for="jabatan">
                            Jabatan
                        </label>
                        <input type="text" name="jabatan" id="jabatan" placeholder="Jabatan"
                            class="input input-bordered mt-1 w-full max-w-md" value="{{  $data->jabatan  }}"/>
                        @error('jabatan')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700" for="image">
                            Foto Profil
                        </label>
                        <input type="file" name="image" id="image"
                            class="file-input file-input-bordered file-input-md w-full max-w-xs" value="{{  $data->image  }}"/>
                        @error('image')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <h1 class="font-bold p-2">image old</h1>
                    <div class="avatar">
                        <div class="w-24 rounded-xl">
                          <img src="{{ asset('storage/assets/'. $data->foto) }}" />
                        </div>
                      </div>
                </div>

                <div class="md:w-1/2">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700" for="pendidikan">
                            Pendidikan
                        </label>
                        <select name="pendidikan" class="input input-bordered mt-1 w-full max-w-md">
                            <option value="" {{  $data->pendidikan == '' ? 'selected' : '' }}>Pilih</option>
                            <option value="S3" {{  $data->pendidikan == 'S3' ? 'selected' : '' }}>S3 | Doktoral</option>
                            <option value="S2" {{  $data->pendidikan == 'S2' ? 'selected' : '' }}>S2 | Strata 2</option>
                            <option value="S1" {{  $data->pendidikan == 'S1' ? 'selected' : '' }}>S1 | Strata 1</option>
                            <option value="D3" {{  $data->pendidikan == 'D3' ? 'selected' : '' }}>D3 | Diploma lll</option>
                            <option value="D4" {{  $data->pendidikan == 'D4' ? 'selected' : '' }}>D4 | Diploma lV</option>
                        </select>
                        @error('pendidikan')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700" for="unit_kerja">
                            Unit Kerja
                        </label>
                        <select name="unit_kerja" class="input input-bordered mt-1 w-full max-w-md">
                            <option value="" {{  $data->unit_kerja == '' ? 'selected' : '' }}>Pilih</option>
                            <option value="SDM" {{  $data->unit_kerja == 'SDM' ? 'selected' : '' }}>SDM</option>
                            <option value="Pemasaran" {{  $data->unit_kerja == 'Pemasaran' ? 'selected' : '' }}>Pemasaran</option>
                            <option value="Operasional" {{  $data->unit_kerja == 'Operasional' ? 'selected' : '' }}>Operasional</option>
                            <option value="TI" {{  $data->unit_kerja == 'TI' ? 'selected' : '' }}>TI</option>
                        </select>
                        @error('unit_kerja')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Laki Laki</span>
                            <input type="radio" value="L" name="gender" class="radio checked:bg-red-500"
                                checked value="{{  $data->gender  }}"/>
                            @error('gender')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Perempuan</span>
                            <input type="radio" value="P" name="gender" class="radio checked:bg-blue-500" value="{{  $data->gender  }}"/>
                            @error('gender')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>

                    <button class="btn btn-info mt-5 w-full md:w-auto" type="submit">Simpan</button>
                    <a href="/employee" class="btn btn-error text-white mt-5 w-full md:w-auto" >Back to home -></a>
                </div>

            </form>
        </div>

    </div>
@endsection
