

@extends('layouts.app')

@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('events.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                            Post</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($partisipan as $par)
                                <tr>
                                    <td>{{ $par->nama }}</td>
                                    <td>{{ $par->kontak}}</td>
                                    <td>{{ $par->keterangan}}</td>
                                    
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('events.destroy', $par->id) }}" method="POST">
                                            <a href="{{ route('events.edit', $par->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            <!-- <a href="{{ route('partisipan', $par->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a> -->
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="3">Data Event tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


