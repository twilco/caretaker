<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Care Teammate</title>

  <!-- Bootstrap core CSS -->
  
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/icheck/flat/green.css')}}" rel="stylesheet">

  <link href="{{asset('assets/css/calendar/fullcalendar.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/calendar/fullcalendar.print.css')}}" rel="stylesheet" media="print">

  <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->



</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Care Teammate</span></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{asset('assets/img/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="{{ url('/cr/profile/'.$crInfo->id) }}"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="{{ url('/cr/calendar/'.$crInfo->id) }}"><i class="fa fa-calendar"></i> Calendar</a></li>
                <li><a href="{{ url('/cr/messageboard/'.$crInfo->id) }}"><i class="fa fa-comment"></i> Message Board</a></li>
                <li><a href="{{ url('/cr/notes/'.$crInfo->id) }}"><i class="fa fa-pencil"></i> Notes</a></li>
                <li><a href="{{ url('/cr/medication/'.$crInfo->id) }}"><i class="fa fa-medkit"></i> Medication</a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{asset('assets/img/img.jpg')}}" alt="">{{Auth::user()->first_name}} {{Auth::user()->last_name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="{{ url('/ct/profile/'.$ctID) }}"> My Profile</a>
                  </li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                                    Notes
                                    <small>
                                        Type a note and submit to post it.
                                    </small>
                                </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-6">
              <div class='notes'>
              @if(!empty($notes))
                @for($i=0; $i<count($notes); $i++)
                <div class="x_panel">
                  <div class="x_title">
                    <div class='row'>
                      <div class='col-md-6'>
                        <h2>
                          {{$notes[$i]->first_name.' '.$notes[$i]->last_name }}
                            <small> 
                              {{date('h:i:s a', strtotime($notes[$i]->time)) . ' &bull; ' . date('F d, Y', strtotime($notes[$i]->date))}} 
                            </small>
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div class="x_content">
                    <div class='row'>
                      <div class='col-md-6'>
                        {{$notes[$i]->note}}
                      </div>
                    </div>
                  </div>
                </div>
                @endfor
              @endif
              </div>
              <form class="form-horizontal" method='post'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class="form-group">
                        <textarea type="text" name='userNote' class="form-control elastic" placeholder="Type a message here"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit Note</button>
                    </div>
                      <input type='hidden' name='crID' value='{{$crInfo->id}}'>
                      <input type='hidden' name='ctID' value='{{$ctID}}'>
                  </div>
                </div>               
              </form>
              
            </div>
          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Care Teammate
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>


      <!-- Start Calender modal -->
      <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">New Calender Entry</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal" style="padding: 5px 20px;">
                <form id="antoform" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="description" name="description"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-9">
                      <input id="date" class="form-control " type="date" data-parsley-id="4825">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Time</label>
                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="time" name="time" >
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Repeat?</label>
                      <div class="col-sm-9 btn-group" data-toggle="buttons">
                        <label class="btn btn-default">
                          <input type="radio" name="repeat-radio-selection" id="repeat-none" value=''> None
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="repeat-radio-selection" id="repeat-weekly" value=''> Weekly
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="repeat-radio-selection" id="repeat-monthly" value=''> Monthly
                        </label>
                        <label class="btn btn-default">
                          <input type="radio" name="repeat-radio-selection" id="repeat-yearly" value=''> Yearly
                        </label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Locaiton</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="locaiton" name="locaiton">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Notes</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="notes" name="notes"></textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
               <div class='btn-group'>
                  <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success antosubmit" id='saveEvent'>Save changes</button>
               </div>
            </div>
          </div>
        </div>
      </div>
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Edit Calender Entry</h4>
            </div>
            <div class="modal-body">

              <div id="testmodal2" style="padding: 5px 20px;">
                <form id="antoform2" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title2" name="title2">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
      <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

      <!-- End Calender modal -->
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

  <script src="{{asset('assets/js/moment/moment.js')}}"></script>
  <script src="{{asset('assets/js/datepicker/daterangepicker.js')}}"></script>

  <script src="{{asset('assets/js/nprogress.js')}}"></script>
  <!-- chart js -->

  <!-- bootstrap progress js -->
  
  <script src="{{asset('assets/js/progressbar/bootstrap-progressbar.min.js')}}"></script>

  <script src="{{asset('assets/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <!-- icheck -->
  <script src="{{asset('assets/js/icheck/icheck.min.js')}}"></script>

  <script src="{{asset('assets/js/custom.js')}}"></script>

  <script src="{{asset('assets/js/moment/moment.min.js')}}"></script>

  <script src="{{asset('assets/js/chartjs/chart.min.js')}}"></script>

  <script src="{{asset('assets/js/calendar/fullcalendar.min.js')}}"></script>
  <!-- pace -->
  <script src="{{asset('assets/js/pace/pace.min.js')}}"></script>

  <script type='text/javascript'>

  $(document).ready(function(){

      $('#saveEvent').on('click', function(){

         // $.post('http://159.203.104.152/calendar', {type:"saveEvent",})

      });

  });

  </script>

  <script>
    $(window).load(function() {

    });
  </script>
</body>

</html>
