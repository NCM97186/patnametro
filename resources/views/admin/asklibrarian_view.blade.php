@extends('layouts.master')
@section('content')
@section('title', 'View Details')


		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xm-12">
                    <h1 class="page-header">View Details<a href="{{URL::to('admin/asklibrarian')}}" title="Back" class="btn btn-primary pull-right">Back</a>
					</h1>
                </div>
                <!-- /.col-lg-12 col-md-12 col-xm-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12 col-md-12 col-xm-12">
					<div class="panel panel-default">
						<!-- <div class="panel-heading">View Details</div> -->
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<tbody>
										<tr>
											<th>Name</th>
											<td>{{$Tbl_ask_librarians[0]->name}}</td>
										</tr>
										<tr>
											<th>E-mail</th>
											<td>{{$Tbl_ask_librarians->email}}</td>
										</tr>
										<tr>
											<th>Mobile Number</th>
											<td>{{$Tbl_ask_librarians->phone}}</td>
										</tr>
										<tr>
											<th>Address</th>
											<td>{{$Tbl_ask_librarians->address}}</td>
										</tr>
										<tr>
											<th>Request IP</th>
											<td>{{$Tbl_ask_librarians->email}}</td>
										</tr>
										<tr>
											<th>User Query</th>
											<td>{{$Tbl_ask_librarians->email}}</td>
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
			</div>
			<center>
				@if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
                        <form action ="" name="submit" method ="POST">
                           @csrf
                     <div class="col-md-4 form-group">
                        <div class="row">
                        <label class="col-md-3 pt5">Status:</label>
                        <div class="col-md-9">
                           <select name="status" id="status" class="form-control">
                              <option value="">---select---</option>
                              
                              <option value="1">Pending</option>
                              <option value="2">Inprocess</option>
                              <option value="3">Processed</option>
                           </select>
                        </div>
                        </div>
                     </div>
                            <button type="submit" name="submit"id="#" class="btn btn-danger btn-md">Submit</button>
                     </form>
                     
</center>
		</div>
		@endsection
		<!-- /#page-wrapper -->

