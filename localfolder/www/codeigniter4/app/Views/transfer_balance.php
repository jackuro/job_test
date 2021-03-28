<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>chessable transfer amount</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">


    <form method="post" id="update-client-balance" name="update-client-balance" 
    action="/update-client-balance">
      

      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <div>
              <label>Select client to get balance from</label>
            </div>
        
          <select  id="client_name" class="client_name form-control">
          <?php if($clients): ?>
            <option value="0">Select Client</option>
          <?php foreach($clients as $client): ?>
           <option value="<?=$client['id']?>" data-balance="<?=$client['balance']?>"><?=$client['name']?></option>
         <?php endforeach; ?>
         
         <?php endif; ?>
          </select>
          </div>
          <div class="form-group">
        <label>Available Banlance</label>
        <input type="number" name="balance" id="balance" class="form-control" value="" disabled>
      </div>
        </div>
        <div class="col-sm">
          
      <div class="form-group">
        <div>
          <label>Select client to transfer money</label>
        </div>
        
          <select  id="client_to" class="client_to form-control">
          <?php if($clients): ?>
            <option value="0">Select Client</option>
          <?php foreach($clients as $client): ?>
           <option value="<?=$client['id']?>" data-balance="<?=$client['balance']?>"><?=$client['name']?></option>
         <?php endforeach; ?>
         
         <?php endif; ?>
          </select>
        </div>
      <div class="form-group">
        <label>Amount to transfer</label>

        <input type="hidden" name="client_id_from" id="client_id_from" value="">
        <input type="hidden" name="client_id_to" id="client_id_to" value="">
        <input type="hidden" name="actual_balance" id="actual_balance" value="">
        <input type="hidden" name="new_balance" id="new_balance" value="">
        <input type="number" name="amount" id="amount" class="form-control" value="0">

      </div>
        </div>
      </div>

      <div class="form-group">
        <a class="btn btn-danger btn-block transfer" href="#" role="button">Transfer</a>
      </div>
      <div class="form-group">
        <a class="btn btn-primary btn-block" href="/client-list" role="button">Cancel</a>
      </div>
    </form>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>

  $(".client_name").change(function () {
      $("#balance").val($(this).find('option:selected').data('balance'));
      $("#client_id_from").val($(this).find('option:selected').val());

    });

    $(".client_to").change(function () {
       $("#actual_balance").val($(this).find('option:selected').data('balance'));
      $("#client_id_to").val($(this).find('option:selected').val());

    });


$(".transfer").click(function(){

  var amount = parseFloat( $("#amount").val());
  var balance = parseFloat($("#balance").val());
  var actual = parseFloat($("#actual_balance").val()) ;

  console.log(amount);

if ($(".client_to").val()== 0 || $(".client_name").val()==0 ) {
    alert("Please choose a client");
    } else if ($(".client_to").val()==$(".client_name").val()) {
      alert("Please choose a diferent client");
      } else if (amount <= 0) {
        alert("Please set a valid amount to transfer");
        } else if(amount > balance) {
            alert("the transfer amount can't be mayor than the actual balance");
          } else {

            
            $("#new_balance").val( balance - amount);
            $("#actual_balance").val( actual + amount);
            $( "#update-client-balance" ).submit();
          }

});

</script>
</body>
</html>