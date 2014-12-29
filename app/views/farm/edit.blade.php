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
					<h2> Farm Form </h2>

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

						<form id="order-form" class="smart-form" novalidate="novalidate" action="{{ URL::to('farms/'.$farm->id) }}" method="post" >
							<header>
								Edit Farm
							</header>

                            <!-- For Larevel PUT METHOD ! -->
                            <input type="hidden" name="_method" value="put" />

							<fieldset>
								<div class="row">
									<section class="col col-5">
										<label class="input"> <i class="icon-append fa fa-tint"></i>
											<input type="text" name="farm_name" placeholder="Farm Name" value="{{ $farm->farm_name }}" required>
										</label>
									</section>
									<section class="col col-5">
										<label class="input"> <i class="icon-append fa fa-suitcase"></i>
											<input type="text" name="company_name" placeholder="Company Name" value="{{ $farm->company_name }}">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-10">
										<label class="textarea"> <i class="icon-append fa  fa-map-marker"></i>
                                            <textarea rows="5" name="farm_address" placeholder="Farm Adress"> {{ $farm->farm_address }}</textarea>
										</label>
									</section>
								</div>
							</fieldset>

							<footer>


								<button type="submit" class="btn btn-primary">
									Update Farm
								</button>

			                    <p> Created At : {{ $farm->created_at }} </p>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
                        @if (Session::has('message'))
                           <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->


@stop