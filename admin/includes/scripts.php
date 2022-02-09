  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <!-- password and confirm password validation -->

  <script>
  function passwordValidation(){
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;
    let messaae = document.getElementById('message')
    if (password.length != 0){
      if (password == confirmPassword){
        //valid
        message.textContent = "*Password match";
        message.style.color = "#3ae374"; 
      }
      else{
          message.textContent = "*Password don't match"
          message.style.color = "#ff4d4d";
      }
    }   
  }
</script>

<!-- sweet alert script -->



 
