<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check ContactUS</title>
</head>

<style>
    .container{
        margin:auto;
    }

    h2{
        text-align:center;
    }
.volunteers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  /* width: 100%; */
  margin:auto;
}

.volunteers td, .volunteers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.volunteers tr:nth-child(even){
    background-color: #c7c7c7;
}

.volunteers tr:hover {
    background-color: #ddd;
}

.volunteers th {
  padding-top: 12px;
  padding-bottom: 12px;
  /* text-align: left; */
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
        <h2>Contact US</h2>
        <table class="volunteers">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th style="width: 45%;">Message</th>
            <th>Operations</th>
        </tr>
        <?php
         require_once('connection.php');
         $query = "select * from contactus";
         $result = mysqli_query($con,$query);
         if ($result->num_rows > 0) {
             while($row = mysqli_fetch_assoc($result)){
                 echo "<tr>
                 <td>".$row["name"]."</td>
                 <td>".$row["email"]."</td>
                 <td>".$row["message"]."</td>
                 
                 <td>
                 <a href='deleteCU.php?id=".$row["id"]."'><input type='button' value='Delete' class='delete' onclick = 'return checkdelete()'></a></td>
                 
                 </tr>";
                }
            }
            else {
                echo "<tr><td colspan ='4'>No Data Available</td></tr>";
            }
            ?>
        </table>
    </div>
    
    <script>
        function checkdelete(){
            return confirm('Are you sure you want to delete this record ?');
        }
        </script>
</body>
</html>

