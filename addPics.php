<?php    include('header.php'); ?>


<div class="twelve columns" style="" >
<form action="picLoad.php" method="post" enctype="multipart/form-data">
<div id="formCenter" style="width: 90%;" >
  <p><input class ="spacer" type="file" name="file_array[]"></p>
 </div>
 <p style="width: 72%;margin-top: 8%; margin-left: auto; margin-right: auto;">
  <input type="submit" class="glow" id="submit" value="Upload" style="">
  &nbsp;&nbsp;
  <input type="button" class="glow" id="addBtn" value="++" onclick="inputBtn()">
  </p>
  </form>
</div>
<br />
<br />
<script src="_assets/_scripts/autoPic.js"></script>
</body>
</html>
