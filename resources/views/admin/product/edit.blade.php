@extends('layouts.admin.app')

@section('content')
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content ">
        @include('layouts.errors-and-messages')
        <div class="box " style="margin-left: 30px;">
             @foreach($products as $product)
            <form action="{{ route('products.update') }}"  onsubmit="return checking();" method="post" class="form" enctype="multipart/form-data" >
                <div class="box-body row">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Product</h2>
                       <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="id" value="{{ $product->id}}">
                        <div class="form-group">
                            <label for="sku">Model No <span class="text-danger">*</span></label>
                             <span id="errmsg1"></span>
                            <input type="text" name="sku" id="sku"  placeholder="xxxxx" class="form-control"  value="{{ $product->sku}}" required=""> 
                        </div>
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $product->name}}">
                        </div>
                      
                          
                          <div class="form-group">
                                                <label for="categories">Category <span class="text-danger">*</span></label>
                                                    <select name="category" id="category" class="form-control select2"  required="">
                                                     @foreach($categories as $b)
                                                             
                                                            <option @if($product->category == $b->id) selected="selected" @endif value="{{$b->id}} ">{{$b->name}}</option>
                                                            @endforeach 
                                                           
                                                           
                                                    </select>
                                            </div>
                        
                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description">{{ $product->description}}</textarea>
                        </div>
                         
                        <div class="form-group">
                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="{{ $product->quantity}}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="number" name="price" id="price" placeholder="Price" class="form-control" value="{{ $product->price}}" required>
                            </div>
                        </div>
                         <div class="form-group">
                                                <label for="sale_price">Sale Price <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input type="number" required name="sale_price" id="sale_price" placeholder="Sale Price" class="form-control" value="{{ $product->sale_price}}" >
                                                </div>
                                            </div>
                      
                        
                        @include('admin.shared.status-select', ['status' => $product->status])

                        
                     
                       
                          
                   
                     <div class="form-group">
                        <label for="isFeatured">Featured</label>
                        <select name="featured" id="featured" class="form-control ">
                           <option  @if($product->featured == 0) selected="selected" @endif value="0">No</option>
                            <option @if($product->featured == 1) selected="selected" @endif value="1">Yes</option>
                            
                                                              
                        </select>  
                   </div>
                    <div class="form-group">
                        <label for="isBestSelling">Latest</label>
                        <select name="latest" id="isBestSelling" class="form-control ">
                             <option @if($product->latest == 0) selected="selected" @endif value="0">No</option>
                            <option @if($product->latest == 1) selected="selected" @endif value="1">Yes</option>
                           
                                                              
                        </select>  
                    </div>
                     <div class="form-group">
                        <label for="hasOffer">Popular</label>
                        <select name="popular" id="popular" class="form-control ">
                             <option  @if($product->popular == 0) selected="selected" @endif value="0">No</option>
                            <option @if($product->popular == 1) selected="selected" @endif value="1">Yes</option>
                           
                                                              
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="hasOffer">Coming Product</label>
                        <select name="coming" id="coming" class="form-control ">
                             <option  @if($product->coming == 0) selected="selected" @endif value="0">No</option>
                            <option @if($product->coming ==1) selected="selected" @endif value="1">Yes</option>
                           
                                                              
                        </select>  
                    </div>
                    
                  </div>
                   <div class="col-md-4">
                        <h2>Images</h2>
                        <div class="form-group">
                      <div class="col-md-3">
                         <div class="row">
                              <img src="{{ asset("$product->cover") }}" alt="" class="img-responsive img-thumbnail" style="height:50px;weight:50px;">
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
                    <div class="btn-group">
                        <a href="{{ route('products') }}" class="btn btn-default">Back</a>
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