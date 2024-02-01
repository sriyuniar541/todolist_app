
@extends('index') @section('title', 'Create Todo') @section('content') 
<div class="mt-5 shadow-lg mb-5 bg-body-tertiary rounded p-5">
    <form action="{{ url('todo') }}" method="POST">
        @csrf
        <h2 class="text-secondary text-center pb-5">Tambah Todo</h2>

        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input
                    type="title"
                    class="form-control"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label"
                >Description</label
            >
            <div class="col-sm-10">
               
                <textarea class="form-control"name="description"
                id="description"  rows="3"  value="{{ old('description') }}"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="status_id" class="col-sm-2 col-form-label"
                >Status</label
            >
            <div class="col-sm-10">
                <select 
                    class="form-select" 
                    aria-label="Default select example" 
                    name="status_id"
                    id="status_id">
                    @forelse ($todoStatus as $item)
                        <option selected value={{$item->id}}>{{$item->status}}</option>
                    @empty
                        <option selected value="">Status tidak ada, silahkan input status</option>
                    @endforelse
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between"  class="form-select">
            <button class="btn btn-outline-primary">Save</button> 
         </div>
    </form>
</div>
@endsection