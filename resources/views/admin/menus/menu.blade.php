@extends('layouts.master');
@section('content')
@section('title', 'Manage menu')
<div class="card">
    <div class="card-body"> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a  style="float: right;" href="{{URL::to('admin/menu/create')}}" class="btn btn-primary pull-right"> Add Menu</a>
        </div>
        <!-- /.col-12 col-md-12 col-lg-12 -->
       

  
  
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="search-from">
                <!--form action="#" class="search_inbox" name="form1" id="form1" method="post" accept-charset="utf-8">
                  
                @csrf
                    <div class="form-row">
                           <div class="form-group col-md-1">
                            <label for="Status">Status: </label>
                            </div>
                            <div class="form-group col-md-2">
                            <select name="approve_status" id="approve_status" class="form-control">
                              <option value=""> Select </option>
                                <?php
                                $statusArray = get_status();
                                foreach($statusArray as $key=>$value) {
                                    ?>
                                    <option value="<?php echo $key; ?>" <?php if(old('approve_status')==$key) echo "selected"; ?>><?php echo $value; ?></option>
                                <?php  }?>    
                           </select>
                            </div>
                       
                        <div class="form-group col-md-1">
                        <label for="language">Language: </label>
                        </div>
                        <div class="form-group col-md-2">
                            <select name="language_id" id="language_id" class="form-control">
                                <option value="1" @if(old('language')==1) selected @endif  >English</option>
                                <option value="2" @if(old('language')==2) selected @endif  >Hindi</option>
                            </select>
                        </div>
                       
                    
                        <div class="form-group col-md-1">
                        <label for="language"></label>
                           <button type="submit" id="SearchFrom" class="btn btn-primary btn-xs SearchFrom"> <i class="fa fa-search"></i> Search</button>
                        </div>
                     </div> 
                    </form-->
                   
                </div>
                </div>
                

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="panel-body">
                <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" >
						<thead>
							<tr>
								<th>#</th>
								<th>Menu Name</th>
								<th>Page Status</th>
								<th>Language</th>
								<th>Options</th>
							</tr>
						</thead>
						
						<tbody id="list">
						
						<?php
							if(count($list) > 0)
							{
							$count = 1;
							foreach($list as $row):
						?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo $row->m_name; ?></td>
								<td><?php //print_r(has_child($row->id, $row->language_id));die();
                                    if(count(has_child($row->id, $row->language_id)) > 0):
                                        ?>
                                        <strong><a href="{{route('menu.show', $row->id)}}"><?php echo status($row->approve_status); ?></a></strong><br/>(Click for Sub Menu)
                                        <?php
                                    else:
                                        echo status($row->approve_status);
                                    endif;
                                    
                                    ?></td> 
								<td><?php echo language($row->language_id); ?></td>
								<td>
									<a href="{{route('menu.edit', $row->id)}}" class="btn btn-success btn-xs">Edit</a>
                                    <form action="{{ route('menu.destroy',$row->id) }}"  method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>  
                                    </form>
                                </td>
							</tr>
						<?php
							endforeach;
							
							} else {
						?>
							<tr>
								<td colspan="5" class="text-center"> No Record Added. </td>
							</tr>
						<?php

							}
						?>
						</tbody>
					</table>
                    {!! $list->withQueryString()->links('pagination::bootstrap-5') !!}
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
<!-- Button trigger modal -->
<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script>
     var linkurl = "{{ url('/admin/get_filter_menu')}}";
        //alert(linkurl);
        jQuery.ajax({
            url: linkurl,
            type: "POST",
            //headers: headers,
            data: {id: id ,get_filter_menu:'get_filter_menu'},
            cache: false,
            success: function (html) {
                var Obj = JSON.parse(html);
             
                jQuery("#loading").hide();

                //add the content retrieved from ajax and put it in the #content div
                jQuery("#list").html(Obj.html);

                //display the body with fadeIn transition
                jQuery("#list").fadeIn("slow");
            },
        });
</script>

@endsection;