@extends('admin.layout.master')



@section('content')

<!-- row -->
    <div class="row">
                        <!-- NEW WIDGET START -->
						<article class="col-sm-12 col-md-12 col-lg-12">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">

								<header>
									<span class="widget-icon"> <i class="fa fa-eye"></i> </span>
									<h2>Create a Thread</h2>
								</header>

								<!-- widget div-->
								<div>
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
									</div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body">

										<form class="form-horizontal"  action="{{ URL::to('createnewthread') }}" method="post" enctype="multipart/form-data" onsubmit="return postForm()">

											<fieldset>
												<legend>Create a Thread</legend>

												<div class="form-group">
													<label class="col-md-2 control-label">Title</label>
													<div class="col-md-10">
														<input class="form-control" name="title" placeholder="Thread Title" type="text">
													</div>
												</div>

                                                 <div class="form-group">
                                                        <label class="col-md-2 control-label">Body</label>
                                                        <div class="col-md-10">
                                                            <textarea id="forumPost" name="content" > </textarea>
                                                        </div>
                                                    </div>


                                                <input type="hidden" name="catid" value="{{ $catid }}" >


											</fieldset>

											<div class="form-actions">
												<div class="row">
													<div class="col-md-12">
														<button class="btn btn-primary" type="submit">
															<i class="fa fa-save"></i>
															Submit
														</button>
													</div>
												</div>
											</div>

										</form>


									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>
							<!-- end widget -->
                        </article>


</div>
 <!-- row -->

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