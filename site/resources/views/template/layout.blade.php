@include('template.header')
    <body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-fixed page-md">
        <div class="page-wrapper">
            @include('template.navbar-top')
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                @include('template.navbar-left')
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    @section('page-content')
                        
                    @show
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            @include('template.footer')
        </div>

        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="libraries/jquery.min.js" type="text/javascript"></script>
        <script src="libraries/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="libraries/js.cookie.min.js" type="text/javascript"></script>
        <script src="libraries/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="js/global/app.min.js" type="text/javascript"></script>
        <script src="js/global/layout.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @section('page-level-scripts') @show
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>