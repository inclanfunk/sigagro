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
					<h2> User Form </h2>

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

						<form id="order-form" class="smart-form" novalidate="novalidate" action="{{ URL::to('sadmin/user_create') }}" method="post" >
							<header>
								Create a New User
							</header>

							<fieldset>
								<div class="row">
                                    <section class="col col-10">
                                        <label class="select">
                                            <select name="roles" id="first_role">
                                                <option value="0" selected="" disabled="">Please Select a User Role</option>
                                                <option value="Admin">Distributor</option>
                                                <option value="Client">Manager</option>
                                                <option value="Viewer">Viewer</option>
                                                <option value="Advisor">Advisor</option>
                                                <option value="Editor">Editor</option>
                                            </select> <i></i> </label>
                                    </section>
                                </div>

                                <div class="row" id="admin" style="display:none; ">
                                    <section class="col col-10">
                                        <label class="select">
                                            <select name="admin_id" id="admin_role">

                                            </select> <i></i> </label>
                                    </section>
                                </div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="first_name" placeholder="First Name" required>
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="last_name" placeholder="Last Name">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999">
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



							<footer>
								<button type="submit" class="btn btn-primary">
									Create User
								</button>
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

<!-- JQUERY VALIDATE -->
<script src="{{URL::to('js/plugin/jquery-validate/jquery.validate.min.js')}} "></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{URL::to('js/plugin/masked-input/jquery.maskedinput.min.js')}} "></script>

<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {


			// START AND FINISH DATE
			$('#startdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});

			$('#finishdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});


			  $('#first_role').change(function(){

                        var ktype = $(this).val();

                             if(ktype == "Client")   {

                                 $('#admin').show();

                                        $.ajax({
                                            type: 'GET',
                                            url:  '{{ URL::to('/api/apicreate') }}',
                                            success:function(veri){
                                                $.each(veri,function(i,deger){

                                                    $('#admin_role').append('<option value="'+deger.id+'">' +deger.first_name+ '</option>' );

                                                }); // each

                                            },
                                            error:function(x,hata){
                                                alert("Hata Oluştu" +hata);
                                            }

                                        }); // ajax

                             } else {  // else bölümü tekrar kullanıcı tipi secince altbayi selection ı saklar ve içindeki bilgiyi temizler
                                 $('#admin').hide();
                                   if($('#admin_role').val()){
                                       $('#admin_role').empty();
                                   }

                             } // if s

                    }); // change








		})

</script>






@stop