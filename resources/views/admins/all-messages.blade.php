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
            @if(\Session::has('delete'))
            <div class="alert alert-success">
             <p>{!!\Session::get('delete')!!}</p>
            </div>
            @endif
          <h5 class="card-title mb-4 d-inline">Messages</h5>
         
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">subject</th>
                <th scope="col">Message</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact )
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{{$contact->fname}} {{$contact->lname}}</td>
                    
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->subject}}</td>
                    <td>{{$contact->message}}</td>
                    <td>
                        <form action="{{ route('deletemessage') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
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