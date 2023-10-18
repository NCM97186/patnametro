@extends('layouts.master') @section('content') @section('title', 'Manage Feedback')

<div class="card">
    <div class="card-body">
        <div id="page-wrapper">
            <div class="row">
               
                
            </div>
            
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="search-from"></div>
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
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Comment</th>
                                            <th>Review Comment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach($list as $row):
                                    ?>
                                        <tr>
                                            
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->phone; ?></td>
                                            <td><?php echo $row->comments; ?></td>
                                            <td><?php echo $row->review_comment; ?></td>
                                            <td>
                                                 <a class="btn btn-primary" href="{{ route('feedback.edit',$row->id) }}">Reply</a>
                                            </td>  
                                        </tr>
                                        <?php
                                        endforeach;
                                    ?>
                                    </tbody>
                                </table>
                              
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-12 col-md-12 col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
</div>

@endsection;
