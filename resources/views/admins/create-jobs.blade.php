@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Create Jobs</h5>
        
          <form class="p-4 p-md-5" action="{{route('store.jobs')}}" method="post" enctype="multipart/form-data">
        
            <!--job details-->
          @csrf
            <div class="form-group">
              <label for="job-title">Job Title</label>
              <input type="text" name="job_tittle" class="form-control" id="job-title" placeholder="Product Designer">
            </div>
            @if($errors->has('job_tittle'))
            <p class="alert alert-success">{{$errors->first('job_tittle')}}</p>
            @endif

            <div class="form-group">
              <label for="job-region">Job Region</label>
              <select name="job_region" class="form-select form-control" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                    <option value="Anywhere">Anywhere</option>
                    <option value="San Francisco">San Francisco</option>
                    <option value="Palo Alto">Palo Alto</option>
                    <option value="New York">New York</option>
                    <option value="Manhattan">Manhattan</option>
                    <option value="Ontario">Ontario</option>
                    <option value="Toronto">Toronto</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Mountain View">Mountain View</option>
                  </select>
            </div>
            @if($errors->has('job_region'))
            <p class="alert alert-success">{{$errors->first('job_region')}}</p>
            @endif
            <div class="form-group">
                <label for="job-title">Company</label>
                <input type="text" name="company" class="form-control" id="job-title" placeholder="company">
            </div>
            @if($errors->has('company'))
            <p class="alert alert-success">{{$errors->first('company')}}</p>
            @endif
            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select name="job_type" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                <option value="Part Time">Part Time</option>
                <option value="Full Time">Full Time</option>
              </select>
            </div>
            @if($errors->has('job_type'))
                <p class="alert alert-success">{{$errors->first('job_type')}}</p>
                @endif
            <div class="form-group">
              <label for="job-type">Experience</label>
              <select name="experience" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                <option value="1-3  years">1-3 years</option>
                <option value="3-6  years">3-6 years</option>
                <option value="6-9  years">6-9 years</option>
              </select>
            </div>
            @if($errors->has('experience'))
            <p class="alert alert-success">{{$errors->first('experience')}}</p>
            @endif
            <div class="form-group">
              <label for="job-type">Salary</label>
              <select name="salary" class="selectpicker border rounded form-control" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                <option value="$50k - $70k">$5k - $7k</option>
                <option value="$70k - $100k">$7k - $10k</option>
                <option value="$100k - $150k">$10k - $15k</option>
              </select>
            </div>
            @if($errors->has('salary'))
            <p class="alert alert-success">{{$errors->first('salary')}}</p>
            @endif
            <div class="form-group">
              <label for="job-type">Gender</label>
              <select name="gender" class="selectpicker border rounded form-control " id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Any">Any</option>
              </select>
            </div>
            @if($errors->has('gender'))
            <p class="alert alert-success">{{$errors->first('gender')}}</p>
            @endif
           

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Job Description</label> 
                <textarea name="jobdescription" id="" cols="30" rows="7" class="form-control" placeholder="Write Job Description..."></textarea>
              </div>
            </div>
            @if($errors->has('jobdescription'))
            <p class="alert alert-success">{{$errors->first('jobdescription')}}</p>
            @endif
            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">client</label> 
                  <textarea name="client" id="" cols="30" rows="7" class="form-control" placeholder="client..."></textarea>
                </div>
              </div>
              @if($errors->has('client'))
              <p class="alert alert-success">{{$errors->first('client')}}</p>
              @endif
            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Responsibilities</label> 
                <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities..."></textarea>
              </div>
            </div>

            @if($errors->has('responsibilities'))
            <p class="alert alert-success">{{$errors->first('responsibilities')}}</p>
            @endif

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Other Benifits</label> 
                <textarea name="otherbenifits" id="" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits..."></textarea>
              </div>
            </div>
            @if($errors->has('otherbenifits'))
            <p class="alert alert-success">{{$errors->first('otherbenifits')}}</p>
            @endif
            <!--company details-->


            <div class="form-group">
                <label for="job-type">Categroy</label>
                <select name="catagory" class="selectpicker border rounded form-control " id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                    @foreach ($catagories as $catagory )
                    <option value="{{$catagory->name}}">{{$catagory->name}}</option>
                    @endforeach
                  
                 
                </select>
            </div>
            @if($errors->has('catagory'))
            <p class="alert alert-success">{{$errors->first('catagory')}}</p>
            @endif
            <div class="row form-group">
              <div class="col-md-12">
                  <label class="text-black" for="Due_Date">Due Date</label>
                  <input type="date" name="Due_Date" id="" class="form-control">
              </div>
          </div>
          
          @if($errors->has('due_date'))
              <p class="alert alert-danger">{{ $errors->first('due_date') }}</p>
          @endif
          
            <div class="form-group">
                <label for="job-location">Images</label>
                <input name="image" type="file" class="form-control">
            </div>
            @if($errors->has('image'))
            <p class="alert alert-success">{{$errors->first('image')}}</p>
            @endif
            <div class="col-lg-4 ml-auto">
                <div class="row">  
                  <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">
                  </div>
                </div>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
@endsection