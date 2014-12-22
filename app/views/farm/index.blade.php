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
                            <input type="text" class="form-control" placeholder="Filter Name" />
                        </th>
                        <th class="hasinput" style="width:15%">
                            <input type="text" class="form-control" placeholder="Filter Email" />
                        </th>
                        <th class="hasinput" style="width:15%">
                                <input class="form-control" placeholder="Filter Company" type="text">
                        </th>
                        <th class="hasinput" >
                            <input type="text" class="form-control" placeholder="Filter Address" />
                        </th>

                        <th class="hasinput icon-addon" >
                            <input id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="yy/mm/dd">
                            <label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
                        </th>
                        <th data-class="expand" style="width:10%"><i class="fa fa-fw fa-cogs"></i> Actions </th>
                    </tr>
                    <tr>
                        <th data-class="expand">Farm Name</th>
                        <th data-class="expand">Manager Name </th>
                        <th>    Company  </th>
                        <th data-hide="phone">Farm Adress</th>
                        <th data-hide="phone,tablet">Created At</th>
                        <th data-class="expand">  </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($farms as $farm)
                    <tr>
                        <td>{{ $farm->farm_name }}</td>
                        <td>{{ $farm->user->first_name }}</td>
                        <td>{{ $farm->company_name  }}</td>
                        <td><?php  $address = str_limit($farm->farm_address, $limit = 20, $end = '...') ?> {{ $address }}</td>
                        <td> {{ $farm->created_at  }}</td>
                        <td>
                           <a href="{{URL::to('farms/'.$farm->id.'/edit')}}" class="btn btn-sm btn-success" style="font-size: 8px;"> Edit </a>

                            {{ Form::open(array('route' => array('farms.destroy', $farm->id ), 'method' => 'delete' , 'style' => ' float:right;')) }}
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