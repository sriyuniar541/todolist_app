@extends('index')
@section('title', 'Todo Status')
@section('content')

{{-- modal tambah status --}}
<div class="d-flex justify-content-end mt-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Status
    </button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/todoStatus') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="status" class="col-form-label">Status</label>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                name="status"
                                id="status"
                                value="{{ old('status') }}"
                            />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- akhir modal tambah status --}}

<table class="table mt-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($todoStatus as $item)
            <tr>
                <th scope="row"> 
                    <i class="bi bi-check2"></i>
                </th>
                <td>{{$item->status}}</td>
                <td>
                    <div class="d-flex">

                        {{-- modal update status --}}
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}">
                                Update Status
                            </button>
                        </div>

                        <div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('/todoStatus/'.$item->id.'/update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Status</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label for="status" class="col-form-label">Status</label>
                                                <div>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="status"
                                                        id="status"
                                                        value="{{$item->status}}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- akhir modal update status --}}
                       

                        {{-- hapus --}}
                        <form action='/todoStatus/{{$item->id}}/delete' method="POST"  onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger">
                                <i class="bi bi-trash3"></i>
                                Hapus
                            </button>
                        </form> 
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <th scope="row" colspan="3">Data tidak ada </th>                
            </tr>            
        @endforelse
    </tbody>
</table>

@endsection
