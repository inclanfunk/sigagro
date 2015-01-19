@extends('admin.layout.master')

@section('content')
<div class="row">

      					<!-- col -->
      					<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">

      					</div>
      					<!-- end col -->

                        <!-- col -->
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                            <!-- sparks -->
                            <ul id="sparks">

                                <li class="sparks-info">
                                    <a href="{{ URL::to('farms/create') }}" class="btn btn-success" > Create A New User</a>
                                </li>

                            </ul>
                            <!-- end sparks -->
                        </div>
                         <!-- end col -->


      				</div>

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
        <h2> User List  </h2>

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
                        <th class="hasinput" style="width:10%">
                            <input type="text" class="form-control" placeholder="Filter Role" />
                        </th>
                        <th class="hasinput" style="width:15%">
                            <input type="text" class="form-control" placeholder="Filter Email" />
                        </th>
                        <th class="hasinput" style="width:15%">
                                <input class="form-control" placeholder="Filter Name" type="text">
                        </th>
                        <th class="hasinput" style="width:10%">
                            <input type="text" class="form-control" placeholder="Filter Phone" />
                        </th>
                        <th class="hasinput" style="width:17%">
                            <input type="text" class="form-control" placeholder="Filter Age" />
                        </th>
                        <th class="hasinput icon-addon" >
                            <input id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="yy/mm/dd">
                            <label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
                        </th>
                        <th data-class="expand" style="width:10%"><i class="fa fa-fw fa-cogs"></i> Actions </th>
                    </tr>
                    <tr>
                        <th data-class="expand">Roles</th>
                        <th data-class="expand">Email</th>
                        <th>    Name  </th>
                        <th data-hide="phone">Phone</th>
                        <th data-hide="phone">Age</th>
                        <th data-hide="phone,tablet">Membership date</th>
                        <th data-class="expand">  </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td> @foreach($user->groups as $group) {{ $group->name }} @endforeach </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>61</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                           <a href="{{URL::to('users/'.$user->id.'/edit')}}" class="btn btn-sm btn-success" style="font-size: 8px;"> Edit </a>

                            {{ Form::open(array('route' => array('users.destroy', $user->id ), 'method' => 'delete' , 'style' => ' float:right;')) }}
                                    <button onclick="return confirm('Are you sure you want to delete this user ?')" style="font-size: 8px;"  type="submit" class="btn btn-danger btn-mini">Delete</button>
                            {{ Form::close() }}

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

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

<!-- PAGE RELATED PLUGIN(S) -->
		<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

			pageSetUp();

			/* // DOM Position key index //

			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class

			Also see: http://legacy.datatables.net/usage/features
			*/

			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;

				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};

				$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});

			/* END BASIC */

			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}

		    });


		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();

		    } );
		    /* END COLUMN FILTER */



		})

		</script>
@stop
