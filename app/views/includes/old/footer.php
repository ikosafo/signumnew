<div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i data-feather="x-circle"></i>
                </a>
                <h5 class="m-0">Customization</h5>
            </div>
    
            <div class="slimscroll-menu">
    
                <h5 class="font-size-16 pl-3 mt-4">Choose Variation</h5>
                <div class="p-3">
                    <h6>Default</h6>
                    <a href="index.html"><img src="<?php echo URLROOT ?>/images/layouts/vertical.jpg" alt="vertical" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Top Nav</h6>
                    <a href="layouts-horizontal.html"><img src="<?php echo URLROOT ?>/images/layouts/horizontal.jpg" alt="horizontal" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Dark Side Nav</h6>
                    <a href="layouts-dark-sidebar.html"><img src="<?php echo URLROOT ?>/images/layouts/vertical-dark-sidebar.jpg" alt="dark sidenav" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Condensed Side Nav</h6>
                    <a href="layouts-dark-sidebar.html"><img src="<?php echo URLROOT ?>/images/layouts/vertical-condensed.jpg" alt="condensed" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Fixed Width (Boxed)</h6>
                    <a href="layouts-boxed.html"><img src="<?php echo URLROOT ?>/images/layouts/boxed.jpg" alt="boxed"
                            class="img-thumbnail demo-img" /></a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?php echo URLROOT ?>/js/jquery-1.10.2.js"></script>
        <script src="<?php echo URLROOT ?>/js/jquery.blockUI.js"></script>
        <script src="<?php echo URLROOT ?>/js/vendor.min.js"></script>
        <script src="<?php echo URLROOT ?>/js/notie.js"></script>
        <script src="<?php echo URLROOT ?>/js/jquery.uploadifive.js"></script>
        <script src="<?php echo URLROOT ?>/jquery-ui/jquery-ui.min.js"></script>


        <!-- optional plugins -->
        <script src="<?php echo URLROOT ?>/libs/moment/moment.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/apexcharts/apexcharts.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo URLROOT ?>/js/bootstrap-datepicker.min.js"></script>
        <!-- page js -->
        <!-- datatable js -->
        <script src="<?php echo URLROOT ?>/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <script src="<?php echo URLROOT ?>/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/buttons.flash.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/buttons.print.min.js"></script>

        <script src="<?php echo URLROOT ?>/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo URLROOT ?>/libs/datatables/dataTables.select.min.js"></script>

        <!-- Datatables init -->
        <script src="<?php echo URLROOT ?>/js/pages/datatables.init.js"></script>
        
        <script src="<?php echo URLROOT ?>/js/pages/dashboard.init.js"></script>
        <script src="<?php echo URLROOT ?>/js/pages/pj.js"></script>

        <!-- App js -->
        <script src="<?php echo URLROOT ?>/js/app.min.js"></script>
       
<script>
        $('.dates').flatpickr();
        $('.ydate').flatpickr({
            dateFormat: "Y",
            viewMode: "years",
        });

             $('.mdates').datepicker({
                format: "yyyy-mm",
                autoclose: true,
                todayHighlight: true
             });

             $(".ydates").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                endDate:'+0y',
                autoclose: true
            });
         
 
  var $h = null;
  var $m = null;
  var $s = null;
  var $r, $g, $b, $rgb;

  function getTime() {
    var $time = new Date();
    $h = $time.getHours();
    $m = $time.getMinutes();
    $s = $time.getSeconds();
    if ($h < 10) {$h = "0"+$h};
    if ($m < 10) {$m = "0" + $m};
    if ($s < 10) {$s = "0" + $s};
    return {
      'hours': $h,
      'minutes': $m,
      'seconds':$s
    };
  }
  function updateTime(){
    var $t = getTime();
    $('.hours').text($t.hours);
    $('.minutes').text($t.minutes);
    $('.seconds').text($t.seconds);
  }
  setInterval(function(){
    updateTime();
  }, 1000);

</script>