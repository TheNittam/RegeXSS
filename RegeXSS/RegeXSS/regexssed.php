<?php include 'include/header.php'; ?>
  <div class="text-center text-white h-100 align-items-center d-flex py-5" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(&quot;img/cover.jpg&quot;); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left my-3">
          <a class="btn btn-primary" onclick="clearLog();"><i class="fa fa-trash fa-fw"></i>Delete Logs</a>
        </div>
      </div>
      <div class="row">
        <div class="mx-auto col-lg-12 col-md-12">
          <table class="table table-striped table-bordered regexssedLog" style="width: 100%">
            <thead>
              <tr>
                <th>Date</th>
                <th>Exe URL</th>
                <th>Cookie</th>
                <th>RegeXSS</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <th>Date</th>
                <th>Exe URL</th>
                <th>Cookie</th>
                <th>RegeXSS</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="py-3 bg-dark text-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-6 p-3">
          <h5> <b>Main</b> </h5>
          <ul class="list-unstyled">
            <li> <a href="regexssed.php">RegeXSS'ed</a> </li>
            <li> <a href="payloads.php">Payloads</a> </li>
          </ul>
        </div>
        <div class="col-lg-3 col-6 p-3">
          <h5> <b>Others</b> </h5>
          <ul class="list-unstyled">
            <li> <a href="https://nirmaldahal.com.np" target="_blank">#Nittam</a> </li>
            <li> <a href="https://cryptogennepal.com" target="_blank">CryptoGen Nepal</a> </li>
            <li> <a href="https://infosec.cryptogennepal.com" target="_blank">InfoSec - CryptoGen</a> </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
          <h5> <b>About</b> </h5>
          <p class="mb-0">Inspired By <a href="https://xsshunter.com" target="_blank">XSSHunter</a><br/>#Made4Security<br/>Made In Nepal</p>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
          <h5> <b>Follow Me</b> </h5>
          <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-between my-2"> 
              <a href="https://facebook.com/TheNittam" target="_blank">
                <i class="d-block fa fa-facebook-official text-muted fa-lg mr-2"></i>
              </a> <a href="https://instagram.com/TheNittam" target="_blank">
                <i class="d-block fa fa-instagram text-muted fa-lg mx-2"></i>
              </a> <a href="https://twitter.com/TheNittam" target="_blank">
                <i class="d-block fa fa-twitter text-muted fa-lg ml-2"></i>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0 mt-2">© <?php echo date("Y"); ?> - TheNittam | #Nittam . All rights reserved</p>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src="js/dataTables/jquery.dataTables.min.js"></script>
  <script src="js/dataTables/dataTables.bootstrap4.min.js"></script>
  <script src="js/dataTables.responsive.min.js"></script>
  <script>
    function clearLog(){fetch("include/action.php?action=clearlog");}
    $(document).ready(function(){
      var a=$(".regexssedLog").DataTable({
        responsive:{
          details:{
            display:$.fn.dataTable.Responsive.display.childRowImmediate,
            type:"none",
            target:""
            }
          },

          ajax:{url:"include/action.php?action=json","dataSrc": ""},
          columns:[{data:"date"},{data:"execURL"},{data:"cookie"},{data:"data"}]
        });

      setInterval(function(){a.ajax.reload()},1500)});
      setInterval(function(){$.getJSON("include/action.php?action=json",function(e){document.getElementById("triagger").innerHTML=e.length})},1500);
  </script>
</body>
</html>
