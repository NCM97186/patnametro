@extends('layouts.master') @section('content') @section('title', 'Update user')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xm-12">
            <h1 class="page-header"><a href="{{URL::to('admin/user')}}" title="Back" class="btn btn-primary pull-right">Back</a></h1>
        </div>
        <!-- /.col-lg-12 col-md-12 col-xm-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                <form action="{{ url::to('/admin/user',$user->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xm-3">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <input name="id" autocomplete="off" type="hidden" class="input_class form-control" id="id" value="{{$user->id}}" />

                            <div class="col-lg-6 col-md-6 col-xm-6">
                                <div class="form-group">
                                    <input name="user_name"  autocomplete="off" type="text" class="input_class form-control" id="login_name" value="{{$user->user_name}}" />
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-lg-3 col-md-3 col-xm-3">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xm-6">
                                <div class="input_class form-group">
                                    <input name="password" autocomplete="off" type="password" class="input_class form-control" id="user_pass" value="" />
                                </div>
                            </div>
                        </div>
 -->
                       <!--  <div class="row">
                            <div class="col-lg-3 col-md-3 col-xm-3">
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xm-6">
                                <div class="input_class form-group">
                                    <input name="password_confirmation" autocomplete="off" type="password" class="input_class form-control" id="conf_pass" value="" />
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xm-3">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xm-6">
                                <div class="form-group">
                                    <input name="name" autocomplete="off" type="text" class="input_class form-control" id="user_name" value="{{$user->name}}" />
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
                                    <input name="email" autocomplete="off" disabled type="text" class="input_class form-control" id="user_email" value="{{$user->email}}" />
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
                                <div class="input_class form-group">
                                    <input name="login_name" autocomplete="off" disabled type="text" class="input_class form-control" id="user_email" value="{{$user->login_name}}" />
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
                                    <input name="designation" autocomplete="off" type="text" class="input_class form-control" id="designation" value="{{$user->designation}}" />
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

                                        <option value="0" @if($user->user_status == '0') ? selected : null @endif>InActive </option>
                                        <option value="1" @if($user->user_status == '1') ? selected : null @endif> Active</option>

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
                                    <select name="user_type" class="input_class form-control" id="user_type" autocomplete="off">
                                        <option value=""> Select </option>

                                        <option value="0" @if($user->user_type == '2') ? selected : null @endif>Creator </option>
                                        <option value="1" @if($user->user_type == '3') ? selected : null @endif> Publisher</option>

                                        <!-- <option value="0" >InActive</option>
                                                <option value="1" >Active</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right"><input name="submit" type="submit" class="btn btn-success" value="Update" />&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
