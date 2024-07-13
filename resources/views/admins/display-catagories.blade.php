@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if(\Session::has('create'))
          <div class="alert alert-success">
           <p>{!!\Session::get('create')!!}</p>
          </div>
          @endif
          @if(\Session::has('update'))
          <div class="alert alert-success">
           <p>{!!\Session::get('update')!!}</p>
          </div>
          @endif
          @if(\Session::has('delete'))
          <div class="alert alert-success">
           <p>{!!\Session::get('delete')!!}</p>
          </div>
          @endif
          <h5 class="card-title mb-4 d-inline">Categories</h5>
         <a  href="{{route('create.catagories')}}" class="btn btn-primary mb-4 text-center float-right" style="background-color: green">Create Categories</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($catagories as $catagory)
                <tr>
                    <th scope="row">{{$catagory->id}}</th>
                    <td>{{$catagory->name}}</td>
                    <td><a  href="{{route('edit.catagories',$catagory->id)}}" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="{{route('delete.catagories',$catagory->id)}}"  class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                   
                @endforeach
            
              
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
@endsection