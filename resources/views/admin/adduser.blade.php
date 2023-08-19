@extends('layouts.master')
@section('content')
@section('title', 'Add user')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xm-12">
                     <h1 class="page-header">Add User<a href="{{URL::to('admin/user')}}" title="Back" class="btn btn-primary pull-right">Back</a>
                    </h1> 
                </div>
                <!-- /.col-lg-12 col-md-12 col-xm-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12 col-md-12 col-xm-12">
                    <div class="panel panel-default">
                        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

				@if ($message = Session::get('success'))
				<div class="alert alert-success">
				<p>{{ $message }}</p>
				</div>
				@endif

						<form action="{{ url::to('/admin/user') }}" method="POST">
						
                           
                            @csrf
							<div class="panel-body">
								
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
											<label>Username:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="form-group">
											<input name="user_name" autocomplete="off"  type="text" class="input_class form-control" id="login_name" value=""/>
											  </div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
                                            <label>Password:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="input_class form-group">
											<input name="password" autocomplete="off"   type="password" class="input_class form-control" id="user_pass" value=""/>
											 </div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
                                            <label>Confirm Password:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="input_class form-group">
											<input name="password_confirmation" autocomplete="off"  type="password" class="input_class form-control" id="conf_pass" value=""/>
											 </div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
                                            <label>Name:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="form-group">
                                            <input name="name" autocomplete="off" type="text" class="input_class form-control" id="user_name" value=""/>
											  </div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
                                            <label>Login name:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="form-group">
                                            <input name="login_name" autocomplete="off" type="text" class="input_class form-control" id="login_name" value=""/>
											  </div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
                                            <label>Email:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="input_class form-group">
											<input name="email" autocomplete="off"  type="text" class="input_class form-control" id="user_email" value=""/>
											</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
                                            <label>Designation:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="input_class form-group">
											<input name="designation" autocomplete="off"  type="text" class="input_class form-control" id="designation" value=""/>
									</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
											<label>Status:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="form-group">
											<select name="user_status" class="input_class form-control" id="user_status" autocomplete="off">
												<option value=""> Select </option>
												<option value="0" >InActive</option>
												<option value="1" >Active</option>
											</select>
											</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
											<label>Status:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="form-group">
											<select name="user_type" class="input_class form-control" id="user_status" autocomplete="off">
												<option value=""> Select </option>
												<option value="2" > Creator </option>
												<option value="3" >  Publisher  </option>
											</select>
											</div>
									</div>
								</div>

								<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 ">
						<div class="pull-right">
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
											
										</div>
									</div>
								</div>

							</div>
						</form>					</div>
				</div>
			</div>
		</div>
		@endsection