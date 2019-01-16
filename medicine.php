<?php
  session_start();
  if($_SESSION["user"]!=null){
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <style type="text/css">
    #banner {
    background-color: #f9f9f9;
    padding-top: 15px;
    padding-bottom: 5px;
    background-image: url(http://userscontent2.emaze.com/images/b3bf491b-ad6f-4bcb-9a80-1edaa1f9e061/3371cb69-03a9-488f-a9c0-53b0ac406a1a.jpg);
    /*background-image: url(/File/admin.jpg);*/
}
  </style>
</head>
<body>

  <a href="index.php">BACK</a>
  <div class="form-control" align="center">
  <button class="btn Add" id="btnAdd" style="color: green;" onclick="btnAdd()">Add Medicine</button>
  <a href="showAll.php"><button class="btn Show" id="btnShow" style="color: blue;">Show All</button></a>
  <a href="logout.php"><button class="btn btn-danger" id="btnShow" style="color: blue;">Log Out</button></a>
  </div>


  <script type="text/javascript">
    function btnAdd(){
    document.getElementById("frmAdd").style.visibility="visible";
    document.getElementById("btnAdd").style.visibility="hidden";
    document.getElementById("btnDlt").style.visibility="hidden";
    document.getElementById("btnShow").style.visibility="hidden";
    
  }

  </script>
<div id="banner">
  <form id="frmAdd" action="add.php" method="POST" style="visibility: hidden;" >

    <div class="container" style="margin-top: 3% " id="divAdd" style="display: none;">
      <h1 class="text-center alert alert-success">Add Medicine</h1>
    Medicine Name*</br> 
    <input class="form-control" type="text" name="med_name" id="mname" placeholder="Medicine Name" onkeyup="MedName()"> 
    <span id="smnm"></span> 
    <br>
  Power </br>
  <input class="form-control" type="text" name="power" placeholder="Power XMg" onclick="">
  <span id="power"></span></br>
  Company* 
</br><input class="form-control" type="text" name="company" id="mcom" placeholder="Medicine Company Name" align="center" onkeyup="Company()">  
<span id="com"></span><br> 

<?php
  //session_start();
$conn = mysqli_connect("localhost", "root", "","oms");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM `med_group`  order by group_name ";
$result = mysqli_query($conn,$query)or die(mysqli_error($conn));

echo "Select Medicine Group ";
echo "<select name=' group_name' id='MGrp' onclick='Group()'>";
while($row=mysqli_fetch_assoc($result)){                                                 
 echo "<option value='".$row['group_id']."'>".$row['group_name']."</option>";

}
echo "</select>";

?>
<span id="SGrp"></span>

</br></br>
Unit Price* <input class="form-control" type="text" name="unit_price" size="5" placeholder="Unit Price" id="pr" onkeyup="UnitPrice()" >
 <span id="spr" ></span> <br>

<input class="btn btn-success" type="submit" name="submit" onclick="return check();"><span id="but" style="color: Red"></span>

<script type="text/javascript">
  var flag1 = false;
  var flag2 =false;
  var flag3 = false;
  var flag4 =false;
  function MedName() {
    var mn = document.getElementById('smnm');
    if(document.getElementById("mname").value.length==0){
      mn.style.color="red";
      mn.innerHTML="You Have To Put Medicine Name ";
      flag1 = false;
    }
    else if(document.getElementById("mname").value.length>0) {
      mn.style.color="black";
      mn.innerHTML="You Put "+ document.getElementById("mname").value +" As A Medicine Name";
      flag1 = true;
    }
    return flag1;
  }


  function Company() {
    var mn = document.getElementById('com');
    if(document.getElementById("mcom").value.length==0){
      mn.style.color="red";
      mn.innerHTML="*You Must Have To Put Company Name";
      flag2 = false;
    }
    else if(document.getElementById("mcom").value.length>0) {
      mn.innerHTML="You Put "+document.getElementById("mcom").value+" As A Company Name";
      flag2 = true;
    }
    return flag2;
  }
  function Group() {
    var mn = document.getElementById('SGrp');
    if(document.getElementById("MGrp").value==1){
      mn.style.color="red";
      mn.innerHTML="*You Didn't Select Any Group";
      flag3 = false;
    }
    else if(document.getElementById("MGrp").value!=5) {
      mn.style.color="black";
      mn.innerHTML="You Put "+document.getElementById("MGrp").value+" As A Group Name";
      flag3 = true;
    }
    return flag3;
  }
  
  function UnitPrice() {
    var mn = document.getElementById('spr');
    var unit = document.getElementById("pr").value;
    if(unit.length==0){
      mn.style.color="red";
      mn.innerHTML="*You Have To Put Unit Price ";
      flag4 = false;
    }
    else if(isNaN(unit))
    {
      mn.style.color="red";
      mn.innerHTML="*You Have To An Integer Number As A Price ";
      flag4 = false;
    }
    else if(!isNaN(unit)&& unit.length>0) {
      mn.style.color="black";
      mn.innerHTML="You Put "+unit+" As A Unt Price";
      flag4 = true;
    }
    return flag4;
  }

  function check(){
    if(flag1==true && flag2==true && flag3==true && flag4==true)
      return true;
    else {
      
     var mn=document.getElementById("but").innerHTML="    *Please Fill Up The Form"; 
      return false;
    }
    }
</script>

</div> 
</form>
</div>
</body>
</html> 
<?php
}
else{
  header("Location:index.php");
}