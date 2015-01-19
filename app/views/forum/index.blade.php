@extends('admin.layout.master')



@section('content')


      <!-- row -->
      				<div class="row">

      					<!-- col -->
      					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
      						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> Forum <span>
      							 </span></h1>
      					</div>
      					<!-- end col -->

      					<!-- right side of the page with the sparkline graphs -->
      					<!-- col -->
      					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
      						<!-- sparks -->
      						<ul id="sparks">
      							<li class="sparks-info">
      								<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal" > Create A Category </a>
      							</li>

      						</ul>
      						<!-- end sparks -->
      					</div>
      					<!-- end col -->

      				</div>
      				<!-- end row -->

      				<!-- row -->
      				<div class="row">

      					<div class="col-sm-12">

      						<div class="well">

      							<table class="table table-striped table-forum">
      								<thead>
      									<tr>
      										<th colspan="2">Forum Categories </th>
      										<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Topics</th>
      										<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Posts</th>
      										<th class="hidden-xs hidden-sm" style="width: 200px;">Last Post</th>
      										<th style="width: 5%;">Delete</th>
      									</tr>
      								</thead>
      								<tbody>

      									<!-- TR -->
                                        @foreach($cats as $cat)
      									<tr>
      										<td class="text-center" style="width: 40px;"><i class="fa fa-globe fa-2x text-muted"></i></td>
      										<td>
      											<h4><a href="{{ URL::to('category/'.$cat->id) }}">
      												{{ $cat->title }}
      											</a>
      												<small>{{ $cat->user->first_name }} on {{ $cat->created_at }}  </small>
      											</h4>
      										</td>
      										<td class="text-center hidden-xs hidden-sm">
      											<a href="javascript:void(0);">431</a>
      										</td>
      										<td class="text-center hidden-xs hidden-sm">
      											<a href="javascript:void(0);">1342</a>
      										</td>
      										<td class="hidden-xs hidden-sm">by
      											<a href="javascript:void(0);">{{ $cat->user->first_name }}</a>
      											<br>
      											<small><i>{{ $cat->created_at }}</i></small>
      										</td>
      										<td>
      										     <a onclick="return confirm('Are you sure you want to delete this category ?')" href="{{ URL::to('forum/deletecategory/'.$cat->id) }}" class="btn btn-danger"> <i class=" fa fa-trash-o"></i> </a>
      										</td>
      									</tr>
                                        @endforeach
      									<!-- end TR -->

      								</tbody>
      							</table>



      						</div>
      					</div>

      				</div>

      				<!-- end row -->

      				<!-- row -->

      				<div class="row">

      					<!-- a blank row to get started -->

      				</div>

      				<!-- end row -->


				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title" id="myModalLabel"> Create A Category</h4>
							</div>

							<form action="{{ URL::to('forum/createcategory') }}" method="post">

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name='title' class="form-control" placeholder="Title of Category" required />
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>

							</form>

						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->




@stop