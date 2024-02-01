@extends('index') @section('title', 'Todo') @section('content')
<style>
    .strikethrough {
        display: inline-block;
        text-decoration: line-through;
        white-space: pre-wrap; 
        overflow-wrap: break-word; 
}
</style>

<div class="d-flex justify-content-end mt-5">
    <a class="btn btn-outline-primary text-right" href="/todo/create">
        <i class="bi bi-box-arrow-in-down"></i>
        Tambah Data
    </a>
    <a class="btn btn-outline-info ms-2 text-right" href="/todoStatus/create">
        <i class="bi bi-box-arrow-in-down"></i>
        Tambah Status
    </a>
</div>  

<div class="row">
    @forelse ($todo as $item)
        <div class="col-lg-3 col-sm-6 col-12 mb-3 mb-sm-0 mt-3">
            <div class="card shadow-lg bg-body-tertiary rounded ">
                <div class="card-body ">

                    {{-- membuat efek coret --}}
                    @if ( $item->todoStatus->status === 'DONE' )
                        <h5 class="card-title strikethrough">{{ $item->title }}</h5>
                        <p class="card-text strikethrough">{{ $item->description }}</p>
                    @else
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                    @endif

                     {{-- memberi warna ke status --}}
                    <div class="d-flex">                       
                        @if ( $item->todoStatus->status === 'DONE' )
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <p class="text-success">Status : {{ $item->todoStatus->status }}</p>
                        @elseif ($item->todoStatus->status === 'TODO')
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            <p class="text-primary">{{ $item->todoStatus->status }}</p>
                        @else
                            <i class="bi bi-check-circle text-warning me-2"></i>
                            <p class="text-warning">{{ $item->todoStatus->status }}</p>
                        @endif  
                    </div>
                  

                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-warning" href='/todo/{{$item->id}}/edit'>
                            <i class="bi bi-pencil-square"></i>
                            Update Status
                        </a>
                        <form action='/todo/{{$item->id}}/delete' method="POST"  onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger">
                                <i class="bi bi-trash3"></i>
                                Hapus
                            </button>
                        </form> 
                    </div>
                    
                </div>
            </div>
        </div>
    @empty
        <p>Data belum tersedia ...!</p>
    @endforelse  
</div>


@endsection