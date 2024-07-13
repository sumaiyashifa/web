@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">

          @if(\Session::has('success'))
          <div class="alert alert-success">
           <p>{!!\Session::get('success')!!}</p>
          </div>
          @endif
          @if(\Session::has('error'))
          <div class="alert alert-success">
           <p>{!!\Session::get('error')!!}</p>
          </div>
          @endif
          <h5 class="card-title mb-4 d-inline">Submitted works</h5>
          <table class="table">
            <thead>
              <tr>
                <th>User_Id</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Title</th>
                <th>Job Title</th>
                <th>Submitted Work</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($files as $file)
              <tr>
                <td>{{ $file->user_id }}</td>
                <td>{{ $file->user_name }}</td>
                <td>{{ $file->user_email }}</td>
                <td>{{ $file->user_tittle }}</td>
                @php
                  $job=DB::table('job')->where('id',$file->job_id)->first();
                @endphp
                <td>{{ $job->job_tittle ?? 'N/A' }}</td>
                <td><a href="{{ asset($file->path) }}" target="_blank">{{ $file->name }}</a></td>
                <td> <form action="{{ route('session') }}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <button type="submit" class="btn btn-primary">Payment</button>
              </form></td>
                <!-- Add this inside your foreach loop -->
                <td>
                  <form action="{{ route('deleteUserInfo') }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="file_id" value="{{ $file->id }}">
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>

              </tr>
              @endforeach
          </tbody>
          </table> 
          
   
        </div>
      </div>
    </div>
  </div>
  @endsection