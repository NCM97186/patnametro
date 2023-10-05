@extends('layouts.master') @section('content') @section('title', 'Manage User')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a style="float: right;" href="{{URL::to('admin/user/create')}}" class="btn btn-primary pull-right"> Add User</a>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
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
                                        <?php  
                                       $count = 1;?>
                                        @foreach ($user as $users)

                                        <tr>
                                            <td>{{ $count++;}}</td>
                                            <td>{{$users->name}}</td>
                                            <td>{{$users->user_name}}</td>
                                            <td>{{$users->email}}</td>
                                            @if($users->user_status==1)
                                            <td>Active</td>
                                            @else
                                            <td>InActive</td>
                                            @endif

                                            <form action="{{ route('user.destroy',$users->id) }}" method="POST">
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('user.edit',$users->id) }}">Edit</a>
                                                    @csrf @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </td>
                                            </form>
                                        </tr>

                                        @endforeach;
                                    </tbody>
                                </table>
                                {!! $user->withQueryString()->links('pagination::bootstrap-5') !!}
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
    </div>
    <!-- /.row -->
</div>
@endsection
