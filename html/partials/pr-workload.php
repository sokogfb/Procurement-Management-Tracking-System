<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>table user list - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link type="image/png" rel="icon" href="http://localhost/proknap/images/logo-png.png" >
  <link type="text/css" href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" href="http://localhost/proknap/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="http://localhost/proknap/css/custom.css" rel="stylesheet">
  <link type="text/css" href="http://localhost/proknap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="http://localhost/proknap/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Pacifico|Cuprum|Lobster+Two' rel='stylesheet' type='text/css'>
  <link type="text/css" rel="stylesheet" href="http://localhost/proknap/loginstyle.css">

  <style type="text/css">
  body{
    background:#e3d6c6;
  }
  .main-box.no-header {
    /*padding-top: 20px;*/
  }

  td{
      text-align:center;
  }

  .main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
  }
  .table a.table-link.danger {
    color: #e74c3c;
  }
  .label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
  }

  a {
    color: #3498db;
    outline: none!important;
  }


  .table thead tr th  {
    text-transform: uppercase;
    font-size: 0.875em;
    text-align:center;
  }
  .table thead tr th {
    border-bottom: 2px solid #e7ebee;
    /*color:black;*/
  }
  .table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
    color:black;
  }
  .table tbody tr td {
    color:black;
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
  }
  </style>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <hr>
  <div class="container bootstrap snippet" style="width:700px; height:600px;">
    <div class="row" style="width:700px; height:600px;">
      <div class="col-lg-12" style="width:700px; height:600px;">
        <div class="main-box no-header clearfix" sstyle="width:700px; height:600px;">
          <div class="main-box-body clearfix" style="width:700px; height:600px;">
            <div class="table-responsive" style="width:700px; height:600px;">
              <table class="table user-list">
                <thead>
                  <tr>
                  <th><span>Dealing Officer</span></th>
                    <th><span>No. of PRs being Handled</span></th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  error_reporting(E_ERROR);
                  $db = new mysqli('localhost', 'root');
                  if ($db->connect_errno) {
                    echo 'Connect failed: '.$db->connect_error;
                    exit();
                  }
                  $db->select_db('proknap');
                  $cursor = $db->query("SELECT assign.DO,count(*) as count FROM pr join assign on pr.Pr_no=assign.Pr_no group by DO order by count ");
                  if ($db->error) {
                    echo $db->error.PHP_EOL;
                  }
                  while($val = $cursor->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$val['DO']."</td>";
                    echo "<td>".$val['count']."</td>";
                    echo "</tr>";
                  }
                  $cursor->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">

  </script>
</body>
</html>
