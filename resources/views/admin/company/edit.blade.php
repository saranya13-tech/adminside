   @extends('layouts.admin.app')

@section('content')

    <section class="content">
         
             @foreach($companys as $company)
              <form action="{{ route('company.update') }}" method="post"  enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="id" value="{{ $company->id}}">
                 <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                      <div class="col-md-3">
                         <div class="row">
                              <img src="{{ asset("$company->logo") }}" alt="" class="img-responsive img-thumbnail" style="height:50px;weight:50px;">
                          </div>
                      </div>
                     </div>
                   <div class="form-group">
                      <label for="image">Company Logo </label>
                       <input type="file" name="logo" id="logo" class="form-control">
                 </div>
              <div class="form-group">
                <label for="inputName">Name</label>
               <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $company->name ?: old('name') }}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
               <textarea name="description" id="description" rows="3" class="form-control" placeholder="Description">{{ $company->description ?: old('description') }}</textarea>
              </div>
               <div class="form-group">
                <label for="inputDescription">Address</label>
               <textarea name="address" id="address" rows="3" class="form-control" placeholder="Address">{{ $company->address ?: old('address') }}</textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">About us</label>
              <textarea id="summernote" rows="4" name="aboutus">
                {{ $company->aboutus ?: old('aboutus') }}
              </textarea>
            
          </div>
        
             
            </div>
          </div>
        </div>
           

        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Links</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
               
              <div class="form-group">
                <label for="inputEstimatedBudget">Facebook</label>
                 <input type="text" class="form-control" name="facebook" value="{{ $company->facebook ?: old('facebook') }}" id="facebook" onkeyup="check(this.value)">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">instagram</label>
                 <input type="text" class="form-control" name="instagram" value="{{ $company->instagram ?: old('instagram') }}" id="instagram" onkeyup="check(this.value)">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">twitter</label>
                 <input type="text" class="form-control" name="twitter" value="{{ $company->twitter ?: old('twitter') }}" id="twitter" onkeyup="check(this.value)">
              </div>
               <div class="form-group">
                <label for="inputEstimatedDuration">whatsapp</label>
                  <input type="number" class="form-control" name="whatsapp" value="{{ $company->whatsapp ?: old('whatsapp') }}" id="whatsapp" >
              </div>
               <div class="form-group">
                <label for="inputEstimatedDuration">snapchat</label>
                <input type="text" class="form-control" name="snapchat" value="{{ $company->snapchat ?: old('snapchat') }}" id="snapchat" onkeyup="check(this.value)" >
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
          <!-- /.card -->
        </div>
      </div>
   
      <div class="row">
        <div class="col-12">
          <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
       </form>

    @endforeach

   
    </section>

  
    @endsection