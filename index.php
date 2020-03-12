<?php

session_start();
if($_SESSION){

}else{
    header("Location: /login.html");
    exit(0);   

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA | Search Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">User</strong>
                                    </span> <span class="text-muted text-xs block">Settings <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <!--
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                            -->
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            Hv+
                        </div>
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="index.php">Home</a></li>
                        </ul>
                    </li>
                    <!--
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graph_flot.html">Flot Charts</a></li>
                            <li><a href="graph_morris.html">Morris.js Charts</a></li>
                            <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                            <li><a href="graph_chartjs.html">Chart.js</a></li>
                            <li><a href="graph_peity.html">Peity Charts</a></li>
                            <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="mailbox.html">Inbox</a></li>
                            <li><a href="mail_detail.html">Email view</a></li>
                            <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="form_basic.html">Basic form</a></li>
                            <li><a href="form_advanced.html">Advanced Plugins</a></li>
                            <li><a href="form_wizard.html">Wizard</a></li>
                            <li><a href="form_file_upload.html">File Upload</a></li>
                            <li><a href="form_editors.html">Text Editor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span> <span class="pull-right label label-primary">SPECIAL</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="projects.html">Projects</a></li>
                            <li><a href="project_detail.html">Project detail</a></li>
                            <li><a href="file_manager.html">File manager</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="pin_board.html">Pin board</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="search_results.html">Search results</a></li>
                            <li><a href="lockscreen.html">Lockscreen</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="500.html">500 Page</a></li>
                            <li><a href="empty_page.html">Empty page</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info pull-right">NEW</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="google_maps.html">Google maps</a></li>
                            <li><a href="code_editor.html">Code editor</a></li>
                            <li><a href="modal_window.html">Modal window</a></li>
                            <li><a href="nestable_list.html">Nestable list</a></li>
                            <li><a href="validation.html">Validation</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="draggable_panels.html">Draggable Panels</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="video.html">Video</a></li>
                            <li><a href="tabs_panels.html">Tabs & Panels</a></li>
                            <li><a href="notifications.html">Notifications & Tooltips</a></li>
                            <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="table_basic.html">Static Tables</a></li>
                            <li><a href="table_data_tables.html">Data Tables</a></li>
                            <li><a href="jq_grid.html">jqGrid</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="basic_gallery.html">Basic Gallery</a></li>
                            <li><a href="carousel.html">Bootstrap Carusela</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
                    </li>
                    <li class="landing_link">
                        <a target="_blank" href="Landing_page/index.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
                    </li>
                    <li class="special_link">
                        <a href="angularjs.html"><i class="fa fa-google"></i> <span class="nav-label">AngularJS</span></a>
                    </li>
                -->
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        
                     
                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
               
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                
                                <div class="search-form">
                                    <form >
                                        <div class="input-group">
                                            <input id="searchMovieText" type="text" placeholder="Search" name="search" class="form-control input-lg">
                                            <div class="input-group-btn">
                                                <a id="searchMovieButton" class="btn btn-lg btn-primary">
                                                    Search
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row movieList">
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="hr-line-dashed"></div>
                                <div class="text-center">
                                    <div class="btn-group">
                                        <button id="backwardMovieList" class="btn btn-white" type="button"><i class="fa fa-chevron-left"></i></button>
                                        <button id="forwardMovieList" class="btn btn-white" type="button"><i class="fa fa-chevron-right"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2015
                </div>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script>

    Http = new XMLHttpRequest();
    var value = 0;
    
    /** onload get videos **/

        url = 'API/allmovieList.php?startLimit=' + value + '';
        console.log(url);
        Http.open("GET", url);

        Http.send();

        Http.onreadystatechange = (e) => {

            $(".movieList").empty();
            if (Http.readyState == 4 && Http.status == 200) {
                console.log(JSON.parse(Http.responseText));
                data = JSON.parse(Http.responseText);
                console.log(data);
                for (i = 0; i < data.data.length; i++) {

                    $(".movieList").append('<div class="col-lg-4"><div class="contact-box"><a ui-sref="profile"><div class="col-sm-4"><div class="text-center"><a href="/view.php?id='+data.data[i]["id"]+'"><img alt="image" class="m-t-xs img-responsive" src="' + data.data[i]["logo"] + '"></a></div></div><div class="col-sm-8"><h3><a href="/view.php?id='+data.data[i]["id"]+'"><strong>' + data.data[i]["title"] + '</strong></a></h3><address>' + data.data[i]["description"] + '</address></div><div class="clearfix"></div></a></div></div>');
                }


            }
        };


    document.getElementById("searchMovieButton").addEventListener("click", searchMovieButton);
    function searchMovieButton(){

        searchMovieText = document.getElementById("searchMovieText").value;
        value=0;
        url = 'API/movieList.php?startLimit=' + value + '&title='+searchMovieText+'&endLimit=5';
        console.log(url);
        Http.open("GET", url);

        Http.send();

        Http.onreadystatechange = (e) => {

            $(".movieList").empty();
            if (Http.readyState == 4 && Http.status == 200) {
                console.log(JSON.parse(Http.responseText));
                data = JSON.parse(Http.responseText);
                console.log(data);
                for (i = 0; i < data.data.length; i++) {

                    $(".movieList").append('<div class="col-lg-4"><div class="contact-box"><a ui-sref="profile"><div class="col-sm-4"><div class="text-center"><a href="/view.php?id='+data.data[i]["id"]+'"><img alt="image" class="m-t-xs img-responsive" src="' + data.data[i]["logo"] + '"></a></div></div><div class="col-sm-8"><h3><a href="/view.php?id='+data.data[i]["id"]+'"><strong>' + data.data[i]["title"] + '</strong></a></h3><address>' + data.data[i]["description"] + '</address></div><div class="clearfix"></div></a></div></div>');
                }


            }
        };
    };

    document.getElementById("backwardMovieList").addEventListener("click", backwardMovieList);

    function backwardMovieList() {

        url = 'API/allmovieList.php?startLimit=' + value-- + '';
        console.log(url);
        Http.open("GET", url);

        Http.send();

        Http.onreadystatechange = (e) => {

            $(".movieList").empty();
            if (Http.readyState == 4 && Http.status == 200) {
                console.log(JSON.parse(Http.responseText));
                data = JSON.parse(Http.responseText);
                console.log(data);
                for (i = 0; i < data.data.length; i++) {

                     $(".movieList").append('<div class="col-lg-4"><div class="contact-box"><a ui-sref="profile"><div class="col-sm-4"><div class="text-center"><a href="/view.php?id='+data.data[i]["id"]+'"><img alt="image" class="m-t-xs img-responsive" src="' + data.data[i]["logo"] + '"></a></div></div><div class="col-sm-8"><h3><a href="/view.php?id='+data.data[i]["id"]+'"><strong>' + data.data[i]["title"] + '</strong></a></h3><address>' + data.data[i]["description"] + '</address></div><div class="clearfix"></div></a></div></div>');
                }


            }
        };



    }


    document.getElementById("forwardMovieList").addEventListener("click", forwardMovieList);

    function forwardMovieList() {
        url = 'API/allmovieList.php?startLimit=' + value++ + '';
        console.log(url);
        Http.open("GET", url);

        Http.send();

        Http.onreadystatechange = (e) => {
            $(".movieList").empty();
            if (Http.readyState == 4 && Http.status == 200) {
                console.log(JSON.parse(Http.responseText));
                data = JSON.parse(Http.responseText);
                console.log(data);
                for (i = 0; i < data.data.length; i++) {

                     $(".movieList").append('<div class="col-lg-4"><div class="contact-box"><a ui-sref="profile"><div class="col-sm-4"><div class="text-center"><a href="/view.php?id='+data.data[i]["id"]+'"><img alt="image" class="m-t-xs img-responsive" src="' + data.data[i]["logo"] + '"></a></div></div><div class="col-sm-8"><h3><a href="/view.php?id='+data.data[i]["id"]+'"><strong>' + data.data[i]["title"] + '</strong></a></h3><address>' + data.data[i]["description"] + '</address></div><div class="clearfix"></div></a></div></div>');
                }



            }

        };


    }
    </script>
</body>

</html>