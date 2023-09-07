@extends('layouts.master')
@section('content')
@section('title', 'add user')
<div class="card">
    <div class="card-body">
<div id="page-wrapper">
            <!-- <div class="row">
                <div class="col-lg-12 col-md-12 col-xm-12">
                     <h1 class="page-header">Add User<a href="{{URL::to('admin/user')}}" title="Back" class="btn btn-primary pull-right">Back</a>
                    </h1> 
                </div>
                 /.col-lg-12 col-md-12 col-xm-12 -->
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
											<input name="user_name" autocomplete="off"  type="text" class="input_class form-control" id="user_name" value="{{old('user_name')}}"/>
											@if($errors->has('user_name'))
                  <span class="text-danger">{{ $errors->first('user_name') }}</span>
                @endif
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
											<input name="password" autocomplete="off"   type="password" class="input_class form-control" id="user_pass" value="{{old('password')}}"/>
											@if($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
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
											<input name="password_confirmation" autocomplete="off"  type="password" class="input_class form-control" id="conf_pass" value="{{old('password_confirmation')}}"/>
									@if($errors->has('password_confirmation'))
                                       <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
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
                                            <input name="name" autocomplete="off" type="text" class="input_class form-control" id="user_name" value="{{old('name')}}"/>
                                            @if($errors->has('name'))
                                       <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
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
                                            <input name="login_name" autocomplete="off" type="text" class="input_class form-control" id="login_name" value="{{old('login_name')}}"/>
                                            @if($errors->has('login_name'))
                                       <span class="text-danger">{{ $errors->first('login_name') }}</span>
                                            @endif
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
											<input name="email" autocomplete="off"  type="text" class="input_class form-control" id="user_email" value="{{old('email')}}"/>
											@if($errors->has('email'))
                                       <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
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
												<input name="designation" autocomplete="off"  type="text" class="input_class form-control" id="designation" value="{{old('designation')}}"/>
												@if($errors->has('designation'))
                                       <span class="text-danger">{{ $errors->first('designation') }}</span>
                                            @endif
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
											<label>User Type:</label>
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
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">
                               
                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{URL::to('admin/user/')}}" class="btn btn-primary" >back</a>
                                </div>
                            </div>
                        </div>

							</div>
						</form>					</div>
				</div>
			</div>
		</div>
		@endsection