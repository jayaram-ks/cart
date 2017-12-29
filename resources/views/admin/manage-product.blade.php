@extends('layouts.admin',['title'=>$title,'subtitle'=>$subtitle])
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Products list</h3><a class="btn btn-primary fr"  href="{{route('admin.addproduct')}}">Add Product</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>#ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $prd)
                        <tr>
                          <td>{{$prd->id}}</td>
                          <td>{{$prd->title}}</td>
                          <td>{{config('constants.cur.default')." ".$prd->price}}</td>
                          <td>{{words($prd->description, 5,'....')}}</td>
                          <td>Edit | Delete</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <td colspan="5" class="t-c">
                    {{$products->links('pagination.admin')}}
                        </td>

                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>


              </div>
            </div>

@endsection
