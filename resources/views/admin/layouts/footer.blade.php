<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022 vuivivu.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

{{-- <!-- jQuery -->
<script src="{{ asset('assets/dashboard/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets/dashboard/js/adminlte.min.js') }}"></script> --}}

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ secure_asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ secure_asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ secure_asset('assets/dashboard/plugins/chart.js/Chart.min.js') }}"></script>


<script src="{{ secure_asset('assets/dashboard/summernote/summernote-bs4.min.js') }}"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="{{ secure_asset('assets/dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{ secure_asset('assets/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ secure_asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>


<!-- AdminLTE -->

<script src="{{ secure_asset('assets/dashboard/dist/js/adminlte.js') }}"></script>
<script src="{{ secure_asset('assets/dashboard/js/mysetting.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ secure_asset('assets/dashboard/dist/js/demo.js')  }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('assets/dashboard/dist/js/pages/dashboard3.js') }}"></script> --}}
</body>
</html>
