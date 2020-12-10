@extends('layouts.admin.app')

@section('content')
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content ">
        @include('layouts.errors-and-messages')
        <div class="box " style="margin-left: 30px;">
             @foreach($categories as $category)
            <form action="{{ route('category.update') }}"  onsubmit="return checking();" method="post" class="form" enctype="multipart/form-data" >
                <div class="box-body row">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Category</h2>
                       <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="id" value="{{ $category->id}}">
                        
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $category->name}}">
                        </div>
                      
                      
                        
                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description">{{ $category->description}}</textarea>
                        </div>
                         
                        
                        
                        
                         
                      
                        
                        @include('admin.shared.status-select', ['status' => $category->status])

                        
                     
                       
                   
                    
                    
                  </div>
                   <div class="col-md-4">
                        <h2>Images</h2>
                        <div class="form-group">
                      <div class="col-md-3">
                         <div class="row">
                              <img src="{{ asset("$category->cover") }}" alt="" class="img-responsive img-thumbnail" style="height:50px;weight:50px;">
                          </div>
                      </div>
                     </div>
                        <div class="form-group">
                            <label for="cover">Cover </label>
                            <input type="file" name="cover" id="cover" class="form-control" >
                        </div>
                       
                         
                      
                     
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <br>
                    <div class="btn-group">
                        <a href="{{ route('category') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('js')

<script type="text/javascript">
    $('#select_all').click(function() {
   $('#branch option').prop("selected", true);

    });

 </script>
 <script type="text/javascript">

function checking(){
  var price1=$('#price').val();
  var sale1=$('#sale_price').val();
var price=parseInt(price1);
  var sale=parseInt(sale1);
 
  
  if(sale>price){
     alert("Sales Price must be less than Price");
    return false;
  
  }
else if(sale == price){
   
  
   return true;
}
else if(sale < price){
  
   return true;
}
}
 </script>
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