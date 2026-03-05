<?php 
include "db.php";

$query = "SELECT Employee_ID, Name, Job_Title, Employment_Date, Manager_Name, Department_Name, Location FROM hr_employees_view";
$result = mysqli_query($conn, $query);
$totalEmployees = $result ? mysqli_num_rows($result) : 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>HR Employees View</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f6f8;
    margin:40px;
}

h2{
    text-align:center;
}

.total{
    text-align:center;
    margin-bottom:20px;
    font-weight:bold;
}

table{
    width:90%;
    margin:auto;
    border-collapse:collapse;
    background:white;
}

th{
    background:#2c3e50;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:nth-child(even){
    background:#f2f2f2;
}

tr:hover{
    background:#e6f2ff;
}
</style>

</head>

<body>

<h2>HR Employees View</h2>
<p class="total">Total Employees: <?php echo $totalEmployees; ?></p>

<table>
<tr>
    <th>Employee ID</th>
    <th>Name</th>
    <th>Job Title</th>
    <th>Employment Date</th>
    <th>Manager</th>
    <th>Department</th>
    <th>Location</th>
</tr>

<?php
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['Employee_ID']."</td>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Job_Title']."</td>";
        echo "<td>".$row['Employment_Date']."</td>";
        echo "<td>".$row['Manager_Name']."</td>";
        echo "<td>".$row['Department_Name']."</td>";
        echo "<td>".$row['Location']."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}

$conn->close();
?>

</table>

</body>
</html>