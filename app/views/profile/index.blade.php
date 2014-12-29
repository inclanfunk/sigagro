@extends('admin.layout.master')

@section('content')

<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2> Profile </h2>

				</header>



				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">

						<form id="order-form" class="smart-form" novalidate="novalidate" action=" {{ URL::to('profile/'.Sentry::getUser()->getId() ) }} " method="post" >
							<header>
								Profile Details
							</header>
                                   <!-- For Larevel PUT METHOD ! -->
                                  <input type="hidden" name="_method" value="put" />
							<fieldset>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="first_name" placeholder="First Name" value="{{ Sentry::getUser()->first_name }}">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="last_name" placeholder="Last Name" value="{{ Sentry::getUser()->last_name }}">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail" value="{{ Sentry::getUser()->email }}">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999" value="{{ Sentry::getUser()->phone }}">
										</label>
									</section>
								</div>

								<div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-append fa  fa-lock"></i>
                                            <input type="password" name="password" placeholder="Password">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-append fa  fa-lock"></i>
                                            <input type="password" name="password_confirm" placeholder="Confirm Password">
                                        </label>
                                    </section>
                               </div>
							</fieldset>


							<fieldset>

								<div class="row">
									<section class="col col-6">
										<p> Created At : {{ Sentry::getUser()->created_at }} | User Type : @foreach(Sentry::getUser()->groups as $group) {{ $group->name }} @endforeach </p>
									</section>

								</div>

							</fieldset>
							<footer>
								<button type="submit" class="btn btn-primary">
									Update Profile
								</button>
								    <span style="color: red;"> {{ $errors->first('email'); }} </span><br>
                                    <span style="color: red;"> {{ $errors->first('first_name'); }} </span>
                                    <span style="color: red;"> {{ $errors->first('last_name'); }} </span>
                                    <span style="color: red;"> {{ $errors->first('password'); }} </span>
                                    <span style="color: red;"> {{ $errors->first('password_confirm'); }} </span>
							</footer>
						</form>

					</div>
					<!-- end widget content -->


                        @if(Session::has('error_msg'))
                                        <p class="alert alert-danger">{{Session::get('error_msg')}}</p>
                        @endif

                        @if (Session::has('message'))
                           <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif


				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->


@stop





@section('custom-js')

<script src="{{URL::to('js/plugin/jquery-validate/jquery.validate.min.js')}} "></script>




@stop