@extends('admin.layout.master')



@section('content')


       <!-- row -->
       				<div class="row">

       					<div class="col-sm-12">

       						<div class="well">

       							<table class="table table-striped table-forum">
       								<thead>
       									<tr>
       										<th colspan="2"> <span style="color: #3276b1;">Thread Title :</span>   <span>{{ $thread->title }}</span> </th>
       									</tr>
       								</thead>
       								<tbody>
       									<!-- Post -->

       									<tr>
       										<td class="text-center">
                                                <a href="#">
                                                    &nbsp; <strong>{{ $thread->user->first_name }}  {{ $thread->user->last_name }}</strong>
                                                </a>
       										</td>
       										<td>on <em> {{ $thread->created_at  }}</em></td>
       									</tr>

       									<tr>
       										<td class="text-center" style="width: 12%;">
       										<div class="push-bit">
       											<a href="#">
                                                    @if($thread->user->pics)
                                                        <img alt="" src="{{URL::to('/uploads/'.$thread->user->pics->name )}}" width="50px" height="50px" >
                                                    @else
                                                        <img src=" {{URL::to('/img/avatar.png') }} " alt="demo user" width="50px" height="50px">
                                                    @endif
       											</a>
       										</div><small> <!-- 473 Posts  --> </small></td>
       										<td>
                                                 {{ $thread->body }}
       										</td>
       									</tr>
       									<!-- end Post -->


                                        @foreach($comments as $comment)
       									<!-- Post -->
       									<tr>
       										<td class="text-center"><a href="#"> &nbsp; <strong> {{ $comment->user->first_name }} </strong></a></td>
       										<td>on <em> {{ $comment->created_at }}</em></td>
       									</tr>
       									<tr>
       										<td class="text-center" style="width: 12%;">
       										<div class="push-bit">
       											<a href="profile.html"> <img src="{{URL::to('/uploads/'.$comment->user->pics->name )}}" width="50" height="50px" alt="avatar" > </a>
       										</div><small> <!-- 473 Posts --> </small></td>
       										<td>
                                                {{ $comment->body }}
       										</td>
       									</tr>
       									<!-- end Post -->
                                        @endforeach



       									<!-- Post -->
       									<tr>
       										<td class="text-center"><a href="#">
       										 &nbsp; <strong>Me</strong></a></td>
       										<td><em>Today</em></td>
       									</tr>
       									<tr>
       										<td class="text-center" style="width: 12%;">
       										<div class="push-bit">
       											<a href="#">
                                                    @if(Sentry::getUser()->pics)
                                                    <img src=" {{URL::to('/uploads/'.Sentry::getUser()->pics->name)}} " alt="demo user" width="50px" height="50px">
                                                    @else
                                                     <img src=" {{URL::to('/img/avatar.png') }} " alt="demo user" width="50px" height="50px">
                                                    @endif
       											</a>
       										</div><small> <!-- 473 Posts  --> </small></td>

                                            <form class="form-horizontal"  action="{{ URL::to('createnewcomment') }}" method="post" enctype="multipart/form-data" onsubmit="return postForm()">
                                                <td>
                                                       <textarea id="forumPost" name="content"> </textarea>

                                                       <input type="hidden" name="cat_id" value="{{ $cat->id }}" >
                                                       <input type="hidden" name="thread_id" value="{{ $thread->id }}" >

                                                    <button class="btn btn-primary margin-top-10" type="submit">
                                                        <i class="fa fa-edit"></i>
                                                        Post
                                                    </button>
                                                </td>
                                            </form>

       									</tr>
       									<!-- end Post -->

       								</tbody>
       							</table>

       							<div class="text-center">
       								<ul class="pagination pagination-sm">
       									<li class="disabled">
       										<a href="javascript:void(0);">Prev</a>
       									</li>
       									<li class="active">
       										<a href="javascript:void(0);">1</a>
       									</li>
       									<li>
       										<a href="javascript:void(0);">2</a>
       									</li>
       									<li>
       										<a href="javascript:void(0);">3</a>
       									</li>
       									<li>
       										<a href="javascript:void(0);">...</a>
       									</li>
       									<li>
       										<a href="javascript:void(0);">99</a>
       									</li>
       									<li>
       										<a href="javascript:void(0);">Next</a>
       									</li>
       								</ul>
       							</div>

       						</div>
       					</div>

       				</div>

       				<!-- end row -->

@stop

@section('custom-js')

<script src="{{ URL::to('js/plugin/summernote/summernote.min.js') }} "></script>

<script type="text/javascript">
			// DO NOT REMOVE : GLOBAL FUNCTIONS!

			$(document).ready(function() {

				pageSetUp();

				$('#forumPost').summernote({
					height : 180,
					focus : false,
					tabsize : 2
				});

			})

            var postForm = function() {
                            var content = $('textarea[name="content"]').html($('#forumPost').code());
             }

</script>


@stop