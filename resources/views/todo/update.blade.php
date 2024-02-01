
@extends('index') @section('title', 'Create Todo') @section('content') 
<div class="mt-5 shadow-lg mb-5 bg-body-tertiary rounded p-5">
    <form action="{{ url('/todo/'.$todo->id) }}" method="POST">      
        @csrf
        @method('PUT')       
        <h2 class="text-secondary text-center pb-5">Update Status</h2>

        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input
                    type="title"
                    class="form-control"
                    name="title"
                    id="title"
                    value={{$todo->title}}
                    @disabled(true)
                />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label"
                >Description</label
            >
            <div class="col-sm-10">               
                <textarea 
                    class="form-control"
                    name="description" 
                    id="description"  
                    rows="3" 
                    @disabled(true)
                    >{{$todo->description}}
                </textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="status_id" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select 
                    class="form-select" 
                    aria-label="Default select example" 
                    name="status_id" 
                    id="status_id">
                        @forelse ($todoStatus as $item)
                            <option value="{{ $item->id }}" {{ $todo->status_id == $item->id ? 'selected' : '' }}>
                                {{ $item->status }}
                            </option>
                        @empty
                            <option disabled selected>Tidak ada status</option>
                        @endforelse
                </select>
            </div>
        </div>        

        <div class="d-flex justify-content-between"  class="form-select">
            <button class="btn btn-outline-primary">Update</button> 
         </div>
    </form>
</div>
@endsection