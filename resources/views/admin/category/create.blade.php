@extends('layouts.admin.app')

@section('content')
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content ">
        @include('layouts.errors-and-messages')
        <div class="box " style="margin-left: 30px;">
            <form action="{{ route('category.store') }}"  onsubmit="return checking();" method="post" class="form" enctype="multipart/form-data" >
                <div class="box-body row">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Category</h2>
                       
                        
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                      
                          
                         
                        
                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                         
                       
                        
                       
                         
                      
                        
                        @include('admin.shared.status-select', ['status' => 1])

                        
                     
                       
                    
                    
                    
                  </div>
                   <div class="col-md-4">
                        <h2>Images</h2>
                        <div class="form-group">
                            <label for="cover">Cover </label>
                            <input type="file" name="cover" id="cover" class="form-control" required>
                        </div>
                       
                         
                      
                     
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <br>
                    <div class="btn-group">
                        <a href="{{ route('products') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('js')



  <script>
                      ClassicEditor
                                .create( document.querySelector( '#description' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
  
  @endsection