<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Project Management</h1>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* Ensure that the PROJECTS table exists. */
  VerifyProjectsTable($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the PROJECTS table. */
  $project_name = htmlentities($_POST['ProjectName']);
  $start_date = htmlentities($_POST['StartDate']);
  $budget = htmlentities($_POST['Budget']);

  if (strlen($project_name) || strlen($start_date) || strlen($budget)) {
    AddProject($connection, $project_name, $start_date, $budget);
  }
?>

<!-- Input form for creating new projects -->
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>Project Name</td>
      <td>Start Date</td>
      <td>Budget</td>
    </tr>
    <tr>
      <td>
        <input type="text" name="ProjectName" maxlength="100" size="30" required />
      </td>
      <td>
        <input type="date" name="StartDate" required />
      </td>
      <td>
        <input type="number" name="Budget" step="0.01" required />
      </td>
      <td>
        <input type="submit" value="Add Project" />
      </td>
    </tr>
  </table>
</form>

<!-- Display table data -->
<h2>Project List</h2>
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>ID</td>
    <td>Project Name</td>
    <td>Start Date</td>
    <td>Budget</td>
  </tr>

<?php

$result = mysqli_query($connection, "SELECT * FROM PROJECTS");

while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td>",$query_data[0], "</td>",
       "<td>",$query_data[1], "</td>",
       "<td>",$query_data[2], "</td>",
       "<td>",$query_data[3], "</td>";
  echo "</tr>";
}
?>

</table>

<!-- Clean up. -->
<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</body>
</html>


<?php

/* Add a project to the table. */
function AddProject($connection, $projectName, $startDate, $budget) {
   $pn = mysqli_real_escape_string($connection, $projectName);
   $sd = mysqli_real_escape_string($connection, $startDate);
   $b = mysqli_real_escape_string($connection, $budget);

   $query = "INSERT INTO PROJECTS (ProjectName, StartDate, Budget) VALUES ('$pn', '$sd', '$b');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding project data.</p>");
}

/* Check whether the PROJECTS table exists and, if not, create it. */
function VerifyProjectsTable($connection, $dbName) {
  if(!TableExists("PROJECTS", $connection, $dbName)) {
     $query = "CREATE TABLE PROJECTS (
         ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         ProjectName VARCHAR(100),
         StartDate DATE,
         Budget DECIMAL(15, 2)
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>
