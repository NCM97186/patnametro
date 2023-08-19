@extends('layouts.master')
@section('content')
@section('title', 'Manage Ask Librarian')



            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Ask Librarian</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-lg-12">
					                    <div class="panel panel-default">
                        <div class="panel-heading"> Manage Ask Librarian</div>
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
                                            <th>E-mail</th>
                                            <th>Phone</th>
											<th width="14%">Date Added</th>
                                            <th width="14%">Actions</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($asklibrarian as $user)

									      <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
											<td>{{$user->created_at}}</td>
                                            <td>
                                            <form method="POST" action="{{ route('asklibrarian.destroy',$user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('asklibrarian.show',$user->id) }}" class="btn btn-info btn-xs">View</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            </td>
                                            

                                @if($user->status==1)

                                <td class="btn btn-danger btn-xs">Pending</td>
                                @elseif($user->status==2)
                                <td class="btn btn-success btn-xs">Inprocess</td>
                                @else
                                <td class="btn btn-info btn-xs">Processed</td>

                                @endif

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
		
@endsection
