  @extends('layouts.admin.app')

@section('content')
<section class="content">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Products</h2>

                <div class="card-tools">
                 <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <td >SL</td>
                      <td >Name</td>
                      <td >Model</td>
                      <td >Cover</td>
                      <td >category</td>
                      <td >Quantity</td>
                      <td >Price</td>
                       <td >Sale Price</td>
                      <td > Status</td>
                      <td >Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    
                        
                        {{ $product->name }}
                </td>
                 <td>  {{ $product->sku }} </td>
                 <td>
                                    @if(isset($product->cover))
                                        <img src="{{ asset("$product->cover") }}" alt="" class="img-responsive" style="width:50px;height:50px;">
                                    @endif
                                </td>
                                <td>
                                   <?php   
                                   $list=DB::select("SELECT * from category where id= '".$product->category."' ");
                                   foreach($list as $l){
                                    echo $l->name.'/';
                                   }
                                   ?>
                                </td>
               
                 <td>  {{ $product->quantity }} </td>
              
                <td>  {{ $product->price }} </td>
                <td>  {{$product->sale_price}}  </td>
                <td>@include('layouts.status', ['status' => $product->status])</td>
                <td>
                    <form action="{{ route('products.destroy' ) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="btn-group">
                           <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </section>
        @endsection