<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>AHPC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="APHC ADMIN" name="description" />
        <meta content="AHPC ADMIN" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo URLROOT ?>/images/ahpc_logo.png">

        <!-- plugins -->
        <link href="<?php echo URLROOT ?>/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo URLROOT ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/css/notie.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/css/uploadifive.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo URLROOT ?>/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT ?>/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
        <link href="<?php echo URLROOT ?>/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo URLROOT ?>/css/pivot.css" rel="stylesheet" type="text/css" />



     
<style>
.hex-clock {
  color: '#000000';
  font-weight: bolder;
  margin: 0;
  position: absolute;
  top: 50%;
  left: 95%;
  margin-right: -50%;
  transform: translate(-50%, -50%);
}
.hours:after, .minutes:after { content: ":"}; 

#paidpro{
    width: 100% important;
}
</style>
    <script type="text/javascript">
    var cvhead = {
        <?php
        /*
         * PHP 7 throws warnings about non-scalar values in constants...
         * serialized JSVARS to compensate.
        */
        foreach (unserialize(JSVARS) as $jskey => $jsval) {
            echo $jskey . " : '" . $jsval . "',";
        }
        ?>
    }

    const urlroot = cvhead.urlroot;

     function AjaxPostRequest(ajaxurl, postdata) {
        $.ajax({
            type: "POST",
            url: urlroot +'/'+ ajaxurl,
            data: postdata,
            beforeSend: function() {
               // $.blockUI();
            },
            success: function(text) {
                console.log(text);
            },
            complete: function() {
              //  $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(xhr.status + " " + thrownError);
            }
        });
    }

    function AjaxPostNotie(ajaxurl, postdata) {
            $.ajax({
                type: "POST",
                url: urlroot +'/'+ ajaxurl,
                data: postdata,
                dataType:'json',
                beforeSend: function() {
                  //  $.blockUI();
                },
                success: function(response) {
                    notie.alert({
                    type: response.type,
                    text: response.msg,
                    time: response.time
                    });
                },
                complete: function() {
                   // $.unblockUI();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    //alert(xhr.status + " " + thrownError);
                }
            });
        }

    function AjaxPostRequestWithContainer(ajaxurl, postdata, containerclass) {
        $.ajax({
            type: "POST",
            url: urlroot +'/'+ ajaxurl,
            data: postdata,
            beforeSend: function() {
             //   $.blockUI();
            },
            success: function(text) {
                $('.' + containerclass + '').html(text);
            },
            complete: function() {
              //  $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                 alert('poor network connection');
            }
        });
    }

    function AjaxGetRequestWithContainer(ajaxurl, getdata, containerclass) {
        $.ajax({
            type: "GET",
            url: urlroot +'/'+ ajaxurl,
            data: getdata,
            beforeSend: function() {
              //  $.blockUI();
            },
            success: function(text) {
                $('.' + containerclass + '').html(text);
            },
            complete: function() {
              //  $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(xhr.status + " " + thrownError);
            }
        });
    }

    function idleTimer() {
        var t;
        //window.onload = resetTimer;
        window.onmousemove = resetTimer; // catches mouse movements
        window.onmousedown = resetTimer; // catches mouse movements
        window.onclick = resetTimer;     // catches mouse clicks
        window.onscroll = resetTimer;    // catches scrolling
        window.onkeypress = resetTimer;  //catches keyboard actions

        function logout() {
            window.location.href = urlroot+'/pages/logout';  //Adapt to actual logout script
        }

    function reload() {
            window.location = self.location.href;  //Reloads the current page
    }

    function resetTimer() {
            clearTimeout(t);
            t = setTimeout(logout, 1800000);  // time is in milliseconds (1000 is 1 second)
        // t= setTimeout(reload, 300000);  // time is in milliseconds (1000 is 1 second)
        }
    }
    idleTimer();
</script>

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div  style = "border-bottom:2px solid #970C0B;height:55px" class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="#" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="<?php echo URLROOT ?>/images/logo.png" alt="" height="40" />
                            <span class="d-inline h5 ml-1 text-logo">AHPC </span>
                        </span>
                        <span class="logo-sm">
                            <img src="<?php echo URLROOT ?>/images/logo.png" alt="" height="24">
                        </span>
                    </a>

                    <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                        <li class="">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i data-feather="menu" class="menu-icon"></i>
                                <i data-feather="x" class="close-icon"></i>
                            </button>
                        </li>
                    </ul>

                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                        <li class="d-none d-sm-block">
                        <div class="hex-clock">
                                
                                <span class="hours"></span>
                                
                                <span class="minutes"></span>
                                
                                <span class="seconds"></span>
                                
                                </div>
                        </li>



                      

                       

                        <li class="dropdown notification-list align-self-center profile-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <div class="media user-profile ">
                                    <img src="<?php echo URLROOT ?>/images/users/avatar-7.jpg" alt="user-image" class="rounded-circle align-self-center" />
                                    <div class="media-body text-left">
                                        <h6 class="pro-user-name ml-2 my-0">
                                            <span>Shreyu N</span>
                                            <span class="pro-user-desc text-muted d-block mt-1">Administrator </span>
                                        </h6>
                                    </div>
                                    <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                                <a href="pages-profile.html" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                    <span>My Account</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                                    <span>Settings</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                                    <span>Support</span>
                                </a>

                                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end Topbar -->
