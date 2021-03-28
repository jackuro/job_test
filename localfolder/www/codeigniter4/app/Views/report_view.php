<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>chessable job test</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="row">
       <div class="col-3">
            <a href="/home" class="btn btn-primary mb-2">Home</a>
        </div>
        <div class="col-3">
          <a href="/branch-form" class="btn btn-success mb-2">new branch</a>
        </div>
        <div class="col-3">
            <a href="/transfer-balance" class="btn btn-danger mb-2">New Transfer</a> 
        </div>
        <div class="col-3">
            <a href="/client-form" class="btn btn-success mb-2">new client</a>
      </div>
    </div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
    <h3> highest balance at each branch</h3>
<table class="table table-bordered" id="reports">
       <thead>
          <tr>
             <th>Branch Name</th>
             <th>Highest Balance</th>
          </tr>
       </thead>
       <tbody>
        <?php 
        if($branches): 
            foreach($branches as $branch):
              $count_clients=0;
              $balance=0;
             foreach($client_obj as $client):


                  if ($branch['id']==$client['branch_id']){
                    $count_clients+=1;
                    if ($balance <= $client['balance']){
                        ?> 
                          <tr>
                            <td><?php echo $branch['name']; ?></td> 
                            <td id="highest_balance"><?php echo $client['balance']; ?></td>
                          </tr>
                        <?php

                      $balance=$client['balance'];
                    }
                  }
              endforeach;  
              if ($count_clients==0) {?>

                          <tr>
                            <td><?php echo $branch['name']; ?></td> 
                            <td id="highest_balance">0</td>
                          </tr>
                <?php                
              }
            endforeach; 
         endif; 
         ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#reports').DataTable();
  } );
</script>
</body>
</html>