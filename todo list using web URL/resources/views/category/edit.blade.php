@extends('frontend')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit Category
                        <a href="{{url('category')}}" class ="btn btn-primary float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
               <form action=" {{ route('category.update',$category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text"  name="name" class="form-control" value="{{$category->name}}"/>
                @error('name') {{$message}}</span>@enderror
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" rows="3" class="form-control">{!! $category->description !!}</textarea>

                    @error('description') {{$message}}</span>@enderror
                </div>
                <div class="mb-3">
                    <label>Status</label>
                <br/>
                    <input type="checkbox"  name="status" {{$category->status == 1 ? 'checked':''}} style="width=30px;height=30px"/>
                    @error('status') {{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save 
                    </button>
                </div>
               </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection