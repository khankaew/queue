    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Data Table -->
    <script src="assets/datatable/jquery.dataTables.min.js"></script>
    <!-- <script src="assets/datatable/dataTables.bootstrap.min.js"></script> -->

    <script>
        <!-- Menu Toggle Script -->
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });

        $(document).ready(function() {
            $('#tbl_category').DataTable();
            $('#tbl_user').DataTable();
            $('#tbl_queue').DataTable();
        } );

    </script>

  </body>

</html>
