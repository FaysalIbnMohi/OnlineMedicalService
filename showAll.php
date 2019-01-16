<?php include("db_rw.php"); 
  session_start();
  if($_SESSION["user"]!=null){
?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


  
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 60%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>
  <a href="medicine.php">BACK</a>
   <div class="form-control" align="center">
  <a href="showAll.php"><button class="btn Show" id="btnShow" style="color: blue;">Show All</button></a>
  <a href="logout.php"><button class="btn btn-danger" id="btnShow" style="color: blue;">Log Out</button></a>
  </div>

<h2 class="text-center" style="color: blue">Medicine List</h2>
<span><?php if($_SESSION['msg']!=NULL) echo  $_SESSION['msg'] ?></span>
   Search By  <select id="slctBy" >
  <option value="0">Medicine Name</option>
  <option value="2">Company Name</option>
  <option value="3">Group Name</option>
</select><br><br>
<input type="text" id="srcInput" onkeyup="search()" placeholder="Search for names.." title="Type in a name" class="form-control" style="margin-right: 25%;"> 
<br>
<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Name</th>
    <th style="width:15%;">Power</th>
    <th style="width:15%">Company</th>
    <th style="width:20%">Group Name</th>
    <th style="width:15%">Unit Price</th>
     <th style="width:10%">Update</th>
    <th style="width:10%">Delete</th>
  </tr>
  <?php
    $jsonData= getJSONFromDB("select * from medicine where Activity='Active'");
    $jsn=json_decode($jsonData,true);

    foreach($jsn as $v){
        $groupData= getDataFromDB("select group_name from med_group where group_id='".$v["Group_id"]."'"); 
    ?>
    <tr>

      <td><?php echo $v["Name"];?></td>
      <td><?php echo $v["Power"];?></td>
      <td><?php echo $v["Company"];?></td>
      <?php
      foreach($groupData as $gr ){
      ?>
      <td><?php echo $gr["group_name"];?></td>
      <?php
      }
      ?>
      <td><?php echo $v["Unit_price"];?></td>

      <td>  <button class="btn btn-primary" id="<?php echo $v['MCode'] ?>" onclick="editData(this.id)">Edit</button></td>
      <td><button class="btn btn-danger" id="<?php echo $v['MCode'] ?>"  onclick="dltMed(this.id)">Delete</button></td>
    </tr>
    <?php
       }
    ?>
</table>

<script>
function search() {
  var selectId=document.getElementById("slctBy").value;
  var input, filter, table, tr, td, i;
  input = document.getElementById("srcInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[selectId];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function dltMed(code){

            str=code;
            //alert(str);
            //window.location = 'delete.php?code=' + code;
            var result = confirm("Are you sure you want to delete?");
            if (result) {
                //Logic to delete the item
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    resp=xmlhttp.responseText;
                    //alert(resp);
                    window.location = 'showAll.php';
                }
            };
            
            var url='delete.php?code=' + code;
            //alert(url);
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
            }
            else{
              window.location = 'showAll.php';
            }
        }

  function editData(code) {
            str=code;
            //alert(str);
            window.location = 'updateMedicine.php?code=' + code;
            
        }
</script>

</body>
</html>
<?php
}
else{
  header("Location:index.php");
}