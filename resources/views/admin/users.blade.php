@extends('layouts.master')
@section('content')
@section('title', 'Manage User')

<!-- <h1 class="page-header">Manage User</h1> -->
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage User<a href="#" class="btn btn-primary pull-right">Add User</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage User
                        </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                    @endif
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>User Email Id</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                       
                                         @foreach ($user as $users)
                                         
									       <tr>
                                            <td>{{$users->id}}</td>
                                            <td>{{$users->name}}</td>
                                            <td>{{$users->user_name}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>Active</td>
                    <form action="{{ route('user.destroy',$users->id) }}" method="POST"> 
                                            <td>
                                                 <a class="btn btn-primary" href="{{ route('user.edit',$users->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')

                                   <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                              </td>
                                        </tr>
                                      
                                        @endforeach
									  </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
			</div>
            <!-- /.row -->
		</div>
@endsection
