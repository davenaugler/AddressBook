<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>

    <div class="container">
            <div class="row">
                <h3>Address Book</h3>
            </div>

            
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">+ Add Contact</a>
                </p>
            
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Cell Phone</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>

                  
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM contacts ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['cell_phone'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   
                   Database::disconnect();
                  ?>
                  
                  </tbody>
            </table>
        </div>
    </div>
    <div class="container">
            <div class="row">
                <form action="inde.php" method="post">
                 <input type="text" name="search" placeholder="Search Contacts">
                <input type="submit" value="Search">
                </form>

            </div>
    </div>
  </body>
</html>