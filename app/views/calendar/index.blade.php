@extends('admin.layout.master')


@section('content')

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-3">
						<!-- new widget -->
						<div class="jarviswidget jarviswidget-color-blueDark">
							<header>
								<h2> Add Events </h2>
							</header>

							<!-- widget div-->
							<div>

								<div class="widget-body">
									<!-- content goes here -->

									<form id="add-event-form" action="{{ URL::to('calendar') }}"  method="post">
										<fieldset>

											<div class="form-group">
												<label>Event Title</label>
												<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
											</div>

											<div class="form-group">
                                                <label>Event Description</label>
                                                <textarea class="form-control" placeholder="Please be brief" name="description" rows="3" maxlength="40" id="description"></textarea>
                                                <p class="note">Maxlength is set to 40 characters</p>
                                            </div>


                                            <div class="form-group">
                                                <label>Start date </label>
                                                <div class="input-group">
                                                    <input type="text" name="mystartdate" placeholder="Select a start date" class="form-control datepicker" data-dateformat="yy-mm-dd">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>End date</label>
                                                <div class="input-group">
                                                    <input type="text" name="myenddate" placeholder="Select an end date" class="form-control datepicker" data-dateformat="yy-mm-dd">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Select Event Color</label>
                                                <div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                                    <label class="btn bg-color-darken active">
                                                        <input type="radio" name="color" id="option1" value="bg-color-darken txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-blue">
                                                        <input type="radio" name="color" id="option2" value="bg-color-blue txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-orange">
                                                        <input type="radio" name="color" id="option3" value="bg-color-orange txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-greenLight">
                                                        <input type="radio" name="color" id="option4" value="bg-color-greenLight txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-blueLight">
                                                        <input type="radio" name="color" id="option5" value="bg-color-blueLight txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                    <label class="btn bg-color-red">
                                                        <input type="radio" name="color" id="option6" value="bg-color-red txt-color-white">
                                                        <i class="fa fa-check txt-color-white"></i> </label>
                                                </div>
                                            </div>


										</fieldset>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-default" type="submit" id="add-event" >
														Add Event
													</button>
												</div>
											</div>
										</div>


									</form>

									<!-- end content -->
								</div>
								 @if(Session::has('message'))
                                     <div class="alert alert-info">{{ Session::get('message') }}</div>
                                 @endif
                                    <span style="color: red;"> {{ $errors->first('title'); }} </span><br>
                                    <span style="color: red;"> {{ $errors->first('mystartdate'); }} </span><br>
                                    <span style="color: red;"> {{ $errors->first('myenddate'); }} </span>

							</div>
							<!-- end widget div -->

						</div>
						<!-- end widget -->

					</div>


					<div class="col-sm-12 col-md-12 col-lg-9">

						<!-- new widget -->
						<div class="jarviswidget jarviswidget-color-blueDark">

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
								<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
								<h2> My Events </h2>
								<div class="widget-toolbar">
									<!-- add: non-hidden - to disable auto hide -->
									<div class="btn-group">
										<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
											Showing <i class="fa fa-caret-down"></i>
										</button>
										<ul class="dropdown-menu js-status-update pull-right">
											<li>
												<a href="javascript:void(0);" id="mt">Month</a>
											</li>
											<li>
												<a href="javascript:void(0);" id="ag">Agenda</a>
											</li>
											<li>
												<a href="javascript:void(0);" id="td">Today</a>
											</li>
										</ul>
									</div>
								</div>
							</header>

							<!-- widget div-->
							<div>

								<div class="widget-body no-padding">
									<!-- content goes here -->
									<div class="widget-body-toolbar">

										<div id="calendar-buttons">

											<div class="btn-group">
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
											</div>
										</div>
									</div>
									<div id="calendar"></div>

									<!-- end content -->
								</div>

							</div>
							<!-- end widget div -->
						</div>
						<!-- end widget -->

					</div>

				</div>
				<!-- end row -->



<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
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
        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
        <h2> Events List  </h2>

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

            <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">

                <thead>

                    <tr>
                        <th data-class="expand">Title</th>
                        <th data-class="expand">Description</th>
                        <th>  Start Date </th>
                        <th data-class="expand">End Date</th>
                        <th data-class="expand" style="width: 10%" >Actions  </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td> {{ $event->title }} </td>
                        <td> {{ $event->description }}</td>
                        <td> {{ $event->start }}</td>
                        <td> {{ $event->end }}  </td>

                        <td>
                           <a href="{{URL::to('calendar/'.$event->id.'/edit')}}" class="btn btn-sm btn-success" style="font-size: 8px;"> Edit </a>

                            {{ Form::open(array('route' => array('calendar.destroy', $event->id ), 'method' => 'delete' , 'style' => ' float:right;')) }}
                                    <button onclick="return confirm('Are you sure you want to delete this event ?')" style="font-size: 8px;"  type="submit" class="btn btn-danger btn-mini">Delete</button>
                            {{ Form::close() }}

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        <!-- end widget content -->

               @if (Session::has('message2'))
                <div class="alert alert-info">{{ Session::get('message2') }}</div>
               @endif

    </div>
    <!-- end widget div -->

</div>



@stop



@section('custom-js')

    	<!-- PAGE RELATED PLUGIN(S) -->
    		<script src="js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>

	<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {



			pageSetUp();


			    "use strict";

			    var date = new Date();
			    var d = date.getDate();
			    var m = date.getMonth();
			    var y = date.getFullYear();

			    var hdr = {
			        left: 'title',
			        center: 'month,agendaWeek,agendaDay',
			        right: 'prev,today,next'
			    };

			    var initDrag = function (e) {
			        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			        // it doesn't need to have a start or end

			        var eventObject = {
			            title: $.trim(e.children().text()), // use the element's text as the event title
			            description: $.trim(e.children('span').attr('data-description')),
			            icon: $.trim(e.children('span').attr('data-icon')),
			            className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
			        };
			        // store the Event Object in the DOM element so we can get to it later
			        e.data('eventObject', eventObject);

			        // make the event draggable using jQuery UI
			        e.draggable({
			            zIndex: 999,
			            revert: true, // will cause the event to go back to its
			            revertDuration: 0 //  original position after the drag
			        });
			    };

			    var addEvent = function (title, priority, description, icon) {
			        title = title.length === 0 ? "Untitled Event" : title;
			        description = description.length === 0 ? "No Description" : description;
			        icon = icon.length === 0 ? " " : icon;
			        priority = priority.length === 0 ? "label label-default" : priority;

			        var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
			            icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();

			        $("#event-container").effect("highlight", 800);

			        initDrag(html);
			    };

			    /* initialize the external events
				 -----------------------------------------------------------------*/

			    $('#external-events > li').each(function () {
			        initDrag($(this));
			    });

			    $('#add-event').click(function () {
			        var title = $('#title').val(),
			            priority = $('input:radio[name=priority]:checked').val(),
			            description = $('#description').val(),
			            icon = $('input:radio[name=iconselect]:checked').val();

			        addEvent(title, priority, description, icon);
			    });

			    /* initialize the calendar
				 -----------------------------------------------------------------*/

			    $('#calendar').fullCalendar({

			        header: hdr,
			        buttonText: {
			            prev: '<i class="fa fa-chevron-left"></i>',
			            next: '<i class="fa fa-chevron-right"></i>'
			        },

			        editable: false,
			        droppable: true, // this allows things to be dropped onto the calendar !!!

			        drop: function (date, allDay) { // this function is called when something is dropped

			            // retrieve the dropped element's stored Event Object
			            var originalEventObject = $(this).data('eventObject');

			            // we need to copy it, so that multiple events don't have a reference to the same object
			            var copiedEventObject = $.extend({}, originalEventObject);

			            // assign it the date that was reported
			            copiedEventObject.start = date;
			            copiedEventObject.allDay = allDay;

			            // render the event on the calendar
			            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

			            // is the "remove after drop" checkbox checked?
			            if ($('#drop-remove').is(':checked')) {
			                // if so, remove the element from the "Draggable Events" list
			                $(this).remove();
			            }

			        },

			        select: function (start, end, allDay) {
			            var title = prompt('Event Title:');
			            if (title) {
			                calendar.fullCalendar('renderEvent', {
			                        title: title,
			                        start: start,
			                        end: end,
			                        allDay: allDay,
			                        className:["event", "bg-color-red"]
			                    }, true // make the event "stick"
			                );
			            }
			            calendar.fullCalendar('unselect');
			        },

			        events:  '{{ URL::to('api/allevents')  }}' ,

			        eventRender: function (event, element, icon) {
			            if (!event.description == "") {
			                element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
			                    "</span>");
			            }
			            if (!event.icon == "") {
			                element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
			                    " '></i>");
			            }
			        },

			        windowResize: function (event, ui) {
			            $('#calendar').fullCalendar('render');
			        }
			    });

			    /* hide default buttons */
			    $('.fc-header-right, .fc-header-center').hide();


				$('#calendar-buttons #btn-prev').click(function () {
				    $('.fc-button-prev').click();
				    return false;
				});

				$('#calendar-buttons #btn-next').click(function () {
				    $('.fc-button-next').click();
				    return false;
				});

				$('#calendar-buttons #btn-today').click(function () {
				    $('.fc-button-today').click();
				    return false;
				});

				$('#mt').click(function () {
				    $('#calendar').fullCalendar('changeView', 'month');
				});

				$('#ag').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaWeek');
				});

				$('#td').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaDay');
				});

		})

		</script>




@stop