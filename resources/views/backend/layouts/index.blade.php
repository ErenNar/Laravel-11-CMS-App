<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../back/vendors/feather/feather.css">
    <link rel="stylesheet" href="../back/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../back/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../back/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    <link rel="stylesheet" type="text/css" href="../back/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="../back/vendors/mdi/css/materialdesignicons.min.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="../back/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../back/images/favicon.png" />
    <link rel="stylesheet" href="../back/css/custom.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('backend.layouts._header')
        <!-- partial -->
        @yield('contents')
        <div id="ckbox"></div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- plugins:js -->
    <script src="../back/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../back/vendors/chart.js/Chart.min.js"></script>
    <script src="../back/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../back/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../back/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../back/js/off-canvas.js"></script>
    <script src="../back/js/hoverable-collapse.js"></script>
    <script src="../back/js/template.js"></script>
    <script src="../back/js/settings.js"></script>
    <script src="../back/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../back/js/dashboard.js"></script>
    <script src="../back/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
