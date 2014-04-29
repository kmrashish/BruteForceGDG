<!DOCTYPE html>
<html>
<head>
<script>   
function autoResize(myiframe){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
    }

    document.getElementById(myiframe).height= (newheight) + "px";
    document.getElementById(myiframe).width= (newwidth) + "px";
}
</script></head>
<body>
		<div align="center">
      <iframe id="myiframe" src="genmap.php" width="100%" height="600px"></iframe>
 </div>
</body>
</html>