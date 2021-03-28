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
     <table class="table table-bordered" id="client-list">
       <thead>
          <tr>
             <th>Client Id</th>
             <th>Name</th>
             <th>Branch</th>
             <th>Balance</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($clients): ?>
          <?php foreach($clients as $client): ?>
          <tr>
             <td><?php echo $client['id']; ?></td>
             <td><?php echo $client['name']; ?></td>
               <?php foreach($branches as $branch): ?>
                  <?php if($client['branch_id']==$branch['id']): ?>
                   <td><?php echo $branch['name']; ?></td>
                  <?php endif; ?>
               <?php endforeach; ?>
             <td><?php echo $client['balance']; ?></td>
             <td>
              <a href="<?php echo ('/client-view/'.$client['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo ('/delete-client/'.$client['id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#client-list').DataTable();
  } );
</script>
</body>
</html>