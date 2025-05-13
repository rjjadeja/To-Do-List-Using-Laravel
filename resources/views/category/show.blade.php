@extends('frontend')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Show Category Details
                        <a href="{{url('category')}}" class ="btn btn-primary float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
              
                <div class="mb-3">
                    <label>Name</label>
                    <br/>
                    <p>{{$category->name}}</p>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <br/>
                    <p>{!!$category->description!!}</p>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                <br/>
                    <p>{{$category->status == 1 ? 'checked':''}}</p>
                   
                </div>
              
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection