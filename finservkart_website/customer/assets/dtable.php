<script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/datatables.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/pdfmake.min.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/vfs_fonts.js"></script>
  
  <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "bDestroy": true,
            "aLengthMenu": [
                [10,  25,  50, -1], // This is where you define the page length options
                [10,  25,  50, "All"] // This is where you define the text for the page length options
            ],
            "pageLength":  10, // This sets the default page length
            dom: 'lBfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
   </script>