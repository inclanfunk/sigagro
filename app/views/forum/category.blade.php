@extends('admin.layout.master')



@section('content')

      	<!-- row -->
      				<div class="row">

      					<!-- col -->
      					<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
      						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> Threads  <span>
      							</span></h1>
      					</div>
      					<!-- end col -->

                        <!-- col -->
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                            <!-- sparks -->
                            <ul id="sparks">

                                <li class="sparks-info">
                                    <a href="{{ URL::to('thread/create/'.$category->id) }}" class="btn btn-success" > Create A Thread</a>
                                </li>

                                <li class="sparks-info">
                                    <a href="javascript:history.back()" class="btn btn-warning" ><i class="fa  fa-chevron-circle-left "></i> Back</a>
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
      										<th colspan="2"> {{ $category->title }} </th>
      										<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Topics</th>
      										<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Posts</th>
      										<th class="hidden-xs hidden-sm" style="width: 200px;">Last Post</th>
      									</tr>
      								</thead>
      								<tbody>

                                    @foreach($threads as $thread)

      									<!-- TR -->
      									<tr>
      										<td colspan="2">
      											<h4><a href="{{ URL::to('thread/'.$thread->id) }}">
      												{{ $thread->title }}
      											</a>
      												<small><a href="profile.html">{{ $thread->user->first_name }}</a> on <em>  {{ $thread->created_at }} </em></small>
      											</h4>
      										</td>
      										<td class="text-center hidden-xs hidden-sm">
      											<a href="javascript:void(0);">431</a>
      										</td>
      										<td class="text-center hidden-xs hidden-sm">
      											<a href="javascript:void(0);">1342</a>
      										</td>
      										<td class="hidden-xs hidden-sm">by
      											<a href="javascript:void(0);">John Doe</a>
      											<br>
      											<small><i>January 1, 2014</i></small>
      										</td>
      									</tr>
      									<!-- end TR -->
                                    @endforeach

      								</tbody>
      							</table>


      						</div>
      					</div>

      				</div>

      				<!-- end row -->



@stop