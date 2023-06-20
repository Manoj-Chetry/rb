<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Intership</title>
</head>

<style>
    .container{
        margin:auto;
    }

    h2{
        text-align:center;
    }
.internship {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  /* width: 100%; */
  margin:auto;
}

.internship td, .volunteers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.internship tr:nth-child(even){
    background-color: #c7c7c7;
}

.internship tr:hover {
    background-color: #ddd;
}

.internship th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #04AA6D;
  color: white;
}

.delete{
    background-color: red;
    color:white;
    border: 0;
    outline:none;
    border-radius:7px;
    height:23px;
    width:80px;
    font-weight:bold;
    cursor: pointer;
}
</style>

<body>
    <div class="container">
        <h2>Internship Details</h2>
        <table class="internship">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date of Birth</th>
            <th>State</th>
            <th>Disrict</th>
            <th>Address</th>
            <th>Files</th>
            <th>Gender</th>
            <th>Operations</th>
        </tr>
        <?php
         require_once('connection.php');
         $query = "select * from internship";
         $result = mysqli_query($con,$query);
         if ($result->num_rows > 0) {
             while($row = mysqli_fetch_assoc($result)){
                 echo "<tr>
                 <td>".$row["fname"]."</td>
                 <td>".$row["lname"]."</td>
                 <td>".$row["email"]."</td>
                 <td>".$row["ph_no"]."</td>
                 <td>".$row["Dob"]."</td>
                 <td>".$row["state"]."</td>
                 <td>".$row["district"]."</td>
                 <td>".$row["address"]."</td>

                 <td><a href='displayifile.php?file=".urlencode($row['file'])."' target='_blank'>View File</a></td>
                 
                 
                 
                 <td>".$row["gender"]."</td>
                 
                 <td>
                 <a href='deletei.php?id=".$row["id"]."'><input type='button' value='Delete' class='delete' onclick = ' return deleteinter()'></a></td>
                 
                 </tr>";
                }
            }
            else {
                echo "<tr><td colspan ='12'>No Data Available</td></tr>";
            }
            ?>
        </table>
    </div>
    
    <script>
        function deleteintern(){
            return confirm('Are you sure you want to delete this record ?');
        }
        </script>
</body>
</html>


<!-- <td>".$row["file"]."</td> -->

<!-- <th>Serial No</th> -->
<!-- <td>".$row["sno"]."</td> -->
