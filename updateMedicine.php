<?php
  print_r($GLOBALS);
  session_start();

  include("db_rw.php");
        $_SESSION['msg'] = null;
        $code=$_GET['code'];
        $_SESSION['code']=$code;
        $sql="SELECT *FROM medicine WHERE MCode='$code'";
        $jsonData=getJSONFromDB($sql);
        $jsn=json_decode($jsonData);

  
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
  <a href="medicine.php">BACK</a>
     <div class="form-control" align="center">
  <a href="showAll.php"><button class="btn Show" id="btnShow" style="color: blue;">Show All</button></a>
  <a href="logout.php"><button class="btn btn-danger" id="btnShow" style="color: blue;">Log Out</button></a>
  </div>

 <form id="frmUpdateMed" action="updateMed.php" method="POST"  >

    <div class="container" style="margin-top: 3% " id="divAdd" style="display: none;">
      <h1 class="text-center alert alert-success">Update Medicine</h1>
      
    Medicine Name*</br> 
    <input class="form-control" type="text" name="med_name" id="mname" value="<?php echo $jsn[0]->Name;?>" placeholder="Medicine Name" onkeyup="MedName()"> 
    <span id="smnm"></span> 
    <br>
  Power </br>
  <input class="form-control" type="text" name="power" value="<?php echo $jsn[0]->Power;?>" placeholder="Power XMg" onclick="">
  <span id="power"></span></br>
  Company* 
</br><input class="form-control" type="text" name="company" id="mcom" value="<?php echo $jsn[0]->Company;?>" placeholder="Medicine Company Name" align="center" onkeyup="Company()">  
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
  if($row['group_id']==$jsn[0]->Group_id)                                              
    echo "<option value='".$row['group_id']."' selected>".$row['group_name']."</option>";

  else { echo "<option value='".$row['group_id']."'>".$row['group_name']."</option>";}

}

echo "</select>";


?>
<span id="SGrp"></span>

</br></br>
Unit Price* <input class="form-control" type="text" name="unit_price" value="<?php echo $jsn[0]->Unit_price;?>" size="5" placeholder="Unit Price" id="pr" onkeyup="UnitPrice()" >
 <span id="spr" ></span> <br>

<input class="btn btn-success" type="submit" name="Update" onclick="return check();"><span id="but" style="color: Red"></span>

<script type="text/javascript">
  var flag1 = true;
  var flag2 =true;
  var flag3 = true;
  var flag4 =true;
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

</form>
