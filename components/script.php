    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Data table CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script> -->

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <!-- Include DataTables Buttons JavaScript -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

    <!-- Include DataTables Buttons HTML5 export extension -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- Include DataTables Buttons Flash export extension (if needed) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.82/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.82/vfs_fonts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

    <!-- DataTables Buttons HTML5 export extension (for PDF export) -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

    <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/datatables.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-1.13.7/b-2.4.2/b-html5-2.4.2/datatables.min.js"></script>



    <!-- Data table Script -->
    <script>
        $(document).ready(function() {
            $('#tableAdmins').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            $('#tablePatients').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script> -->

    <script>
        new DataTable('#tablePatients', {
            order: [],
            columnDefs: [{
                targets: '_all',
                orderable: false
            }],
            dom: 'lBftrip',
            buttons: [{
                extend: 'pdfHtml5',
                text: 'Generate PDF',
                className: 'btn btn-primary',
                exportOptions: {
                    columns: ':not(.no-export)',
                    modifier: {
                        page: 'current',
                    }
                }
            }],
            initComplete: function() {
                this.api()
                    .columns([3, 4, 6, 7, 8, 9])
                    .every(function() {
                        var column = this;
                        var theadname = column.header().textContent; // Get the column header name

                        // Create a container div
                        var container = document.createElement('div');
                        container.style.textAlign = 'start';

                        // Create header title element
                        var headerTitle = document.createElement('div');
                        headerTitle.textContent = theadname;

                        // Create input element
                        var input = document.createElement('input');
                        input.setAttribute('type', 'text');
                        input.setAttribute('class', 'form-control');

                        // Apply CSS to make the input larger
                        input.style.width = '60px';

                        // Append header title and input to the container
                        container.appendChild(headerTitle);
                        container.appendChild(input);

                        // Replace the column header with the container
                        column.header().replaceChildren(container);

                        // Apply listener for user input
                        input.addEventListener('input', function() {
                            var val = DataTable.util.escapeRegex(input.value);

                            column
                                .search(val, true, false)
                                .draw();
                        });
                    });
            },
        });
    </script>