  @extends('layouts.admin.app')

@section('content')
<section class="content">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">ps</h2>

                <div class="card-tools">
                 <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <td >SL</td>
                      <td >Name</td>
                      <td >Cover</td>
                      <td > Status</td>
                      <td >Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($category as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>
                    
                        
                        {{ $p->name }}
                </td>
                 
                 <td>
                                    @if(isset($p->cover))
                                        <img src="{{ asset("$p->cover") }}" alt="" class="img-responsive" style="width:50px;height:50px;">
                                    @endif
                                </td>
                                
                <td>@include('layouts.status', ['status' => $p->status])</td>
                <td>
                    <form action="{{ route('category.destroy' ) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">
                        <input type="hidden" name="id" value="{{$p->id}}">
                        <div class="btn-group">
                           <a href="{{ route('category.edit', $p->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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