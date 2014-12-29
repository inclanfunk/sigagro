@extends('admin.layout.master')



@section('content')





<div class="jarviswidget" id="wid-id-11" data-widget-colorbutton="false" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false">
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
        <h2><strong>Equipment Form</strong>  </h2>


        <ul id="widget-tab-1" class="nav nav-tabs pull-right">

            <li class="active">

                <a data-toggle="tab" href="#hr1"> <i class="fa fa-lg fa-arrow-circle-o-down"></i> <span class="hidden-mobile hidden-tablet"> Pivot </span> </a>

            </li>

            <li>
                <a data-toggle="tab" href="#hr2"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class="hidden-mobile hidden-tablet"> Electric Board </span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#hr3"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class="hidden-mobile hidden-tablet"> Water Pump </span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#hr4"> <i class="fa fa-lg fa-arrow-circle-o-up"></i> <span class="hidden-mobile hidden-tablet"> Pit </span></a>
            </li>

        </ul>

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

            <!-- widget body text-->
              <form class="form-horizontal">
            <div class="tab-content padding-10">
                <div class="tab-pane fade in active" id="hr1">

                       <div class="form-group">
                           <label class="col-md-2 control-label" for="select-1">Brand</label>
                           <div class="col-md-10">
                               <select class="form-control" id="select-1">
                                   <option>Valley</option>
                                   <option>Linjsey</option>
                                   <option>BTL</option>
                               </select>
                           </div>
                       </div>

                       <div class="form-group">
                           <label class="col-md-2 control-label" for="select-1">Model</label>
                           <div class="col-md-10">
                               <select class="form-control" id="select-1">
                                   <option>8000</option>
                                   <option>8120</option>
                               </select>
                           </div>
                       </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Quantity of Arms </label>
                        <div class="col-md-10">
                             <select class="form-control" id="qarms" name="qarms">
                                  <option> Please Select </option>
                                  <option value="1">(86/8)</option>
                                  <option value="2">(65/8)</option>
                              </select>
                        </div>
                    </div>
                    <!-- hide -->
                    <div class="form-group" id="qoa1" style="display: none;">
                        <label class="col-md-2 control-label">Number of downspout </label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-2" name="">
                                  <option value="20">20</option>
                                  <option value="16">16</option>
                                  <option value="11">11</option>
                              </select>
                        </div>
                    </div>
                    <!-- hide -->
                    <div class="form-group" id="qoa2" style="display: none;">
                        <label class="col-md-2 control-label">Distance between downspoot </label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="From 30'' to 35'' " type="text">
                        </div>
                    </div>


                    <!-- hide -->
                    <div class="form-group" id="qoa3" style="display: none;">
                        <label class="col-md-2 control-label">Number of downspout </label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="20">20</option>
                                  <option value="16">16</option>
                                  <option value="11">11</option>
                              </select>
                        </div>
                    </div>

                    <!-- hide -->
                    <div class="form-group" id="qoa4" style="display: none;">
                        <label class="col-md-2 control-label">Distance between downspoot</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="From 30'' to 35'' " type="text">
                        </div>
                    </div>


                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Sprinklers Model</label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="IWOB">IWOB</option>
                                  <option value="LDN">LDN</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Sprinklers Type</label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="Flat">Flat</option>
                                  <option value="Concave">Concave</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Sprinklers Conterweight</label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Regulators Brand</label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="Nelson">Nelson</option>
                                  <option value="Sennizer">Sennizer</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Regulators Type</label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="15 PCI">10 PCI</option>
                                  <option value="15 PCI">15 PCI</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Regulators Range</label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="All range">All range</option>
                                  <option value="Low flow">Low flow</option>
                                  <option value="High Flow">High Flow</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Weels Size</label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="14x9x24">14x9x24</option>
                                  <option value="16x10x20">16x10x20</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Cantilever Lenght </label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="2">2</option>
                                  <option value="6">6</option>
                                  <option value="9">9</option>
                                  <option value="16">16</option>
                                  <option value="25">25</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Diameter </label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="3''">3''</option>
                                  <option value="4''">4''</option>
                                  <option value="5''">5''</option>
                                  <option value="6''">6''</option>
                              </select>
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="col-md-2 control-label">Alignment Type </label>
                        <div class="col-md-10">
                             <select class="form-control" id="select-3" name="">
                                  <option value="Standart">Standart</option>
                                  <option value="Modified">Modified</option>
                                  <option value="Floating">Floating</option>
                              </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Rolling Train  </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option>Please Select </option>
                                  <option value="1">Reduce engine </option>
                                  <option value="2">Masa</option>
                              </select>
                        </div>
                    </div>

                    <!-- hide -->
                    <div class="form-group" style="display: none;" id="roll1">
                        <label class="col-md-2 control-label">Brand  </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option value="Baldor">Baldor </option>
                                  <option value="Emmerson">Emmerson</option>
                              </select>
                        </div>
                    </div>

                    <!-- hide -->
                    <div class="form-group" style="display: none;" id="roll2">
                        <label class="col-md-2 control-label">Type </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option value="High">High </option>
                                  <option value="Low">Low</option>
                              </select>
                        </div>
                    </div>

                    <!-- hide -->
                    <div class="form-group" style="display: none;" id="roll3">
                        <label class="col-md-2 control-label">Relationship  </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option value="36 RPM">36 RPM </option>
                                  <option value="68 RPM">68 RPM</option>
                              </select>
                        </div>
                    </div>

                    <!-- hide -->
                    <div class="form-group" style="display: none;" id="roll4">
                        <label class="col-md-2 control-label">Brand   </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option value="Valley">Valley </option>
                                  <option value="Lindsey">Lindsey</option>
                              </select>
                        </div>
                    </div>

                    <!-- hide -->
                    <div class="form-group" style="display: none;" id="roll5">
                        <label class="col-md-2 control-label">Type   </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option value="Fixed"> Fixed</option>
                                  <option value="Mobile">Mobile</option>
                                  <option value="Dual">Dual</option>
                              </select>
                        </div>
                    </div>

                    <!-- hide -->
                    <div class="form-group" style="display: none;" id="roll6">
                        <label class="col-md-2 control-label">Relationship  </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option value="36 RPM">36 RPM </option>
                                  <option value="68 RPM">68 RPM</option>
                              </select>
                        </div>
                    </div>


                    <div class="form-group" >
                        <label class="col-md-2 control-label">Spreaders Type  </label>
                        <div class="col-md-10">
                             <select class="form-control" id="rolling" name="">
                                  <option value="Fixed">Fixed</option>
                                  <option value="Mobile">Mobile</option>
                              </select>
                        </div>
                    </div>






                </div>
                <div class="tab-pane fade" id="hr2">


                     <div class="form-group" >
                            <label class="col-md-2 control-label">Board Type </label>
                            <div class="col-md-10">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Star">Star</option>
                                      <option value="Triangle">Triangle</option>
                                      <option value="Soft">Soft</option>
                                  </select>
                            </div>
                       </div>


                     <div class="form-group" >
                            <label class="col-md-2 control-label">Contactors Brand </label>
                            <div class="col-md-10">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Weg">Weg</option>
                                      <option value="Siemen">Siemens</option>
                                  </select>
                            </div>
                       </div>

                     <div class="form-group" >
                            <label class="col-md-2 control-label">Contactors Model</label>
                            <div class="col-md-10">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="120 A">120 A</option>
                                      <option value="160A">160A</option>
                                  </select>
                            </div>
                       </div>


                     <div class="form-group" >
                            <label class="col-md-2 control-label">Sub Monitor</label>
                            <div class="col-md-10">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>
                                  </select>
                            </div>
                       </div>

                       <div class="form-group" >
                            <label class="col-md-2 control-label">Other Protections - Fuses :</label>
                            <div class="col-md-1">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>
                                  </select>
                            </div>

                            <label class="col-md-1 control-label">Thermal :</label>
                            <div class="col-md-1">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>
                                  </select>
                            </div>


                            <label class="col-md-2 control-label">Voltage Monitor :</label>
                            <div class="col-md-1">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>
                                  </select>
                            </div>

                            <label class="col-md-1 control-label">Isolator :</label>
                            <div class="col-md-1">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>
                                  </select>
                            </div>
                       </div>













                </div>


                 <div class="tab-pane fade" id="hr3">


                     <div class="form-group" >
                            <label class="col-md-2 control-label">Brand </label>
                            <div class="col-md-10">
                                 <select class="form-control" id="rolling" name="">
                                      <option value="Rotorpump">Rotorpump</option>
                                      <option value="KSB">KSB</option>
                                  </select>
                            </div>
                       </div>







                </div>


                <div class="tab-pane fade" id="hr4">


                  asdada






                </div>


            </div>


                </form>

            <!-- end widget body text-->

            <!-- widget footer -->
            <div class="widget-footer text-right">


                    <div class="row">

                        <div class="col-md-12">


                            <button class="btn btn-default" type="submit">
                                Cancel
                            </button>

                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i>
                                Submit
                            </button>

                        </div>

                    </div>


            </div>
            <!-- end widget footer -->

        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>
<!-- end widget -->




@stop

@section('custom-js')


		<script type="text/javascript">


		$(document).ready(function() {

                 $('#qarms').change(function(){
                      val =  $(this).val();

                      if(val == "1"){
                          $('#qoa1').show();
                          $('#qoa2').show();
                          $('#qoa3').hide();
                          $('#qoa4').hide();
                      }else if (val == 2){
                            $('#qoa3').show();
                            $('#qoa4').show();
                            $('#qoa1').hide();
                            $('#qoa2').hide();
                      }
                });

                 $('#rolling').change(function(){
                      val =  $(this).val();

                      if(val == "1"){
                          $('#roll1').show();
                          $('#roll2').show();
                          $('#roll3').show();
                          $('#roll4').hide();
                          $('#roll5').hide();
                          $('#roll6').hide();
                      }else if (val == 2){
                            $('#roll4').show();
                            $('#roll5').show();
                            $('#roll6').show();
                            $('#roll1').hide();
                            $('#roll2').hide();
                            $('#roll3').hide();
                      }
                });





		});

		</script>

@stop