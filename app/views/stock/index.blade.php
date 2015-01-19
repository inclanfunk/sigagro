@extends('admin.layout.master')



@section('content')



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
        <h2> Stock Market </h2>

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

            <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%" style="font-size: 9px;">

                <thead>
                  <tr>
                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter " />
                        </th>


                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter " />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter " />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter " />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter " />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>

                        <th class="hasinput">
                            <input type="text" class="form-control" placeholder="Filter" />
                        </th>


                    </tr>



                    <tr>
                        <th data-class="expand">POSICIÓN</th>
                        <th data-class="expand">ANT </th>
                        <th>   APER </th>
                        <th data-hide="phone">BAJO </th>
                        <th data-class="expand">ALTO</th>
                        <th data-class="expand"> ULT </th>
                        <th data-class="expand"> CIERRE </th>
                        <th data-class="expand"> VAR </th>
                        <th data-class="expand">VOL </th>
                        <th data-class="expand">VOL ( TONS ) </th>
                        <th data-class="expand">O.I</th>
                        <th data-class="expand">UNIDAD</th>
                        <th data-class="expand">MON</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->PRODUCTO  }} {{ $item->PUERTO_ABREVIADO }} {{ $item->ENTREGA}}</td>
                        <td>{{ $item->PRECIO_AJUSTE_ANTERIOR }}</td>
                        <td>{{ $item->PRIMER_OPERADO }}  </td>
                        <td>{{ $item->MINIMO_OPERADO }}  </td>
                        <td>{{ $item->MAXIMO_OPERADO }}    </td>
                        <td>{{ $item->ULTIMO_OPERADO }}</td>
                        <td>{{ $item->PRECIO_AJUSTE }}</td>
                        <td>{{ $item->Dif }}</td>
                        <td>{{ $item->VOLUMEN }}</td>
                        <td>{{ $item->VOLINTONS }}</td>
                        <td>{{ $item->OI }}</td>
                        <td>{{ $item->DESCUNIDAD }}</td>
                        <td>{{ $item->MONEDA }}</td>
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
				"bFilter": false,
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
