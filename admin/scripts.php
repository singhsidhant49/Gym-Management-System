<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
   
    var preloader = document.getElementById("loading");
    // window.addEventListener('load', function(){
    //  preloader.style.display = 'none';
    //  })

    function myFunction(){
      preloader.style.display = 'none';
    };
    
  </script>



<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCtVN8GQSf1Kn_-I3vhKMjsBwkUT1uvEOM",
    authDomain: "titan-gym-ceac9.firebaseapp.com",
    databaseURL: "https://titan-gym-ceac9.firebaseio.com",
    projectId: "titan-gym-ceac9",
    storageBucket: "titan-gym-ceac9.appspot.com",
    messagingSenderId: "462591472691",
    appId: "1:462591472691:web:3ef2d850b53cd79e3a9f46",
    measurementId: "G-V4XVQZSTN8"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>





  