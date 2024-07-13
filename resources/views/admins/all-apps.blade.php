@extends('layouts.admin')
@section('content')
<h5 class="card-title mb-4 d-inline">Job Applications</h5>
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if(\Session::has('delete'))
          <div class="alert alert-success">
           <p>{!!\Session::get('delete')!!}</p>
          </div>
          @endif
          @if(\Session::has('success'))
          <div class="alert alert-success">
           <p>{!!\Session::get('success')!!}</p>
          </div>
          @endif
          @if(\Session::has('info'))
          <div class="alert alert-success">
           <p>{!!\Session::get('info')!!}</p>
          </div>
          @endif
          <div class="row mb-3">
            <div class="col">
              <form action="{{ route('admin.applications') }}" method="GET">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search by job title" name="q" value="{{ request('q') }}">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    <a href="{{ route('admin.applications') }}" class="btn btn-outline-secondary">Refresh</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
         

         

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">cv</th>
                <th scope="col">email</th>
                <th scope="col">job_id</th>
                <th scope="col">job_title</th>
                <th scope="col">company</th>
                <th scope="col">Hours</th>
                <th scope="col">Money</th>
                <th scope="col">delete</th>
                <th scope="col">Accept</th>
              </tr>
            </thead>
            <tbody>
                @foreach($apps as $app)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><a class="btn btn-success" href="{{ asset('asset/cvs/'.$app->cv) }}">CV</a></td>
                <td>{{ $app->email }}</td>
                <td><a class="btn btn-success" href="{{ route('single.job', $app->job_id) }}">Go to Job</a></td>
                <td>{{ $app->job_tittle }}</td>
                <td>{{ $app->company }}</td>
                <td>{{ $app->hours }}</td>
                <td>{{ $app->money }}</td>
                <td><a href="{{ route('delete.apps', $app->id) }}" class="btn btn-danger text-center">delete</a></td>
                <td>
                  <form action="{{ route('accept.application', $app->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-primary">Accept</button>
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
