@extends('layouts.master')
@section('content')
@section('title', 'Manage User')


		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xm-12">
                    <h1 class="page-header">Add User Role<a href="{{URL::to('admin/user_role')}}" title="Back" class="btn btn-primary pull-right">Back</a></h1>
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
						<form action="{{ url::to('/admin/user_role') }}"  name="add-role-form" id="add-role-form" method="post" >
                            @csrf
							<div class="panel-body">
							<div class="row">
									<div class="col-lg-3 col-md-3 col-xm-3">
										<div class="form-group">
											<label>User Name:</label>
											<span class="star">*</span>
                                        </div>
									</div>
									<div class="col-lg-6 col-md-6 col-xm-6">
										<div class="form-group">
										 
                            <select class="input_class form-control" name="user" id="user" >

                            <option value=""> Select </option>
                            @foreach($user_role_edit as $users)
                           <option value="{{$users->id}}">{{$users->name}}</option>
                            @endforeach
                            </select>
                            <input type="hidden" name="user_name" value="" id="user_name">
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

                            <select class="input_class form-control" name="user_type" id="user_type" autocomplete="off">
                            <option value=""> Select </option>
                            <option value="1"> Creator </option> 
                            <option value="2"> Publisher </option>
                            <option value="3"> Both </option>
                            </select>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-3 col-md-3 col-xm-3">
                            <div class="form-group">
                            <label>Module :</label>
                            <span class="star">*</span>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xm-6">
                            <div class="form-group">
                            <div>

                            <div class="checkbox">
                            <label style="font-size: 1.5em">
                            <input type="checkbox" id="check_all"  value="" >
                            Check All
                            </label>
                            </div>
                            <br>
                            <ul>
                            <li>

                            <div class="checkbox">
                            <label style="font-size: 1.5em">
                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="1" value="1" >
                            Manage Menu  </label>
                            </div>
                            </li>

                                <li>
                               <div class="checkbox">
                                <label style="font-size: 1.5em">
                                <input type="checkbox" class="form-check-input" name="check_module[]"  id="2" value="2" data-id='2'>
                                Manage Whats New & Announcements</label>
                                </div>
                                </li>

                            <li>
                           <div class="checkbox">
                            <label style="font-size: 1.5em">
                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="3" value="3" data-id='3'>
                            Manage Minister's Profile</label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="4" value="4" data-id='4'>
                            Manage Notice & Circular</label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="5" value="5" data-id='5'>

                            Manage Exhibition & Event</label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="6" value="6" data-id='6'>

                            Manage Publication </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="7" value="7" data-id='7'>

                            Manage Tenders </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="8" value="8" data-id='8'>

                            Manage Banner </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="9" value="9" data-id='9'>

                            Manage Faq </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="10" value="10" data-id='10'>

                            Manage Feedback</label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="11" value="11" data-id='11'>

                            Manage Discussion Forum            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="12" value="12" data-id='12'>

                            Manage Library Form            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="13" value="13" data-id='13'>

                            Manage Online Suggestions            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="14" value="14" data-id='14'>

                            Manage New Edition            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="20" value="20" data-id='20'>

                            Manage Minister's Logo            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="22" value="22" data-id='22'>

                            Manage User            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="23" value="23" data-id='23'>

                            Dashboard            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="24" value="24" data-id='24'>

                            Users            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="25" value="25" data-id='25'>

                            Manage Latest Update            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="29" value="29" data-id='29'>

                            Discussion Forum            </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="30" value="30" data-id='30'>

                            Manage Discussion Topics </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="31" value="31" data-id='31'>

                            Manage Visitor</label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">
                            <label style="font-size: 1.5em">
                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="33" value="33" data-id='33'>
                            Manage Role</label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">

                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="34" value="34" data-id='34'>
                            Manage Video Gallery </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">
                            <label style="font-size: 1.5em">
                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="35" value="35" data-id='35'>
                            Manage Photo Gallery </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">

                            <label style="font-size: 1.5em">
                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="36" value="36" data-id='36'>
                            Manage Plan Your Visit </label>
                            </div>
                            </li>

                            <li>

                            <div class="checkbox">
                            <label style="font-size: 1.5em">
                            <input type="checkbox" class="form-check-input" name="check_module[]"  id="37" value="37" data-id='37'>
                            Manage Ask Librarian</label>
                            </div>
                            </li>
                            </ul>
                            </div>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                            <div class="pull-right">
                            <input name="cmdsubmit" type="button" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                            </div>
                            </div>
                            </div>

                            </div>
                            </form>					
                            </div>
                            </div>
                            </div>
                            </div>
              <script type="text/javascript">
                        $('#check_all').click(function(){

                        if (this.checked) {
                        $('.form-check-input').each(function () { //loop through each checkbox
                        $(this).prop('checked', true); //check 
                        });
                        } else {
                        $('.form-check-input').each(function () { //loop through each checkbox
                        $(this).prop('checked', false); //uncheck              
                        });
                        }
                        });
                   </script>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 @endsection
    


