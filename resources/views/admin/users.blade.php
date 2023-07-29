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
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>User Email Id</th>
                                            <th>Designation</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									       <tr>
                                            <td>1</td>
                                            <td>Niraj Kumar</td>
                                            <td>nirajadmin</td>
                                            <td>yaraditoli@gmail.com</td>
                                            <td>ALIO</td>
                                            <td>Active</td>
                                            <td><a href="#" class="btn btn-success btn-xs">Edit</a>
                                             <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                              </td>
                                        </tr>
									         <tr>
                                            <td>2</td>
                                            <td>kesh</td>
                                            <td>kesh</td>
                                            <td>pushpendrakumaadr044@gmail.com</td>
                                            <td>php</td>
                                            <td>Active</td>
                                            <td><a href="#" class="btn btn-success btn-xs">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                                	</td>
                                        </tr>
									        <tr>
                                            <td>3</td>
                                            <td>Rakesh Kumar</td>
                                            <td>rakesh</td>
                                            <td>rakesh@gmail.com</td>
                                            <td>System Admin</td>
                                            <td>Active</td>
                                            <td><a href="#" class="btn btn-success btn-xs">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-xs">Delete</a>
                                               </td>
                                           </tr>
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
