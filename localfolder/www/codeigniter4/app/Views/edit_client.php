<!DOCTYPE html>
<html>

<head>
  <title>Edit Client</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form method="post" id="update_client" name="update_client" 
    action="/update-client">
      <input type="hidden" name="id" id="id" value="<?php echo $client_obj['id']; ?>">
      <input type="hidden" id="branch_id" name="branch_id" value="<?php echo $client_obj['branch_id']; ?>">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $client_obj['name']; ?>">
      </div>

      <div class="form-group">
        <label>Select branch</label>
          <select  id="branch_name" class="select_branch form-control">
          <?php if($branches): ?>
          <?php foreach($branches as $branch): ?>
            <?php if(count($branches)==0): ?>
             <small>first add some bank branches</small> 
              <?php endif; ?>
           <option value="<?=$branch['id']?>"><?=$branch['name']?></option>
         <?php endforeach; ?>
         
         <?php endif; ?>
          </select>
      </div>
    


      <div class="form-group">
        <label>Balance</label>
        <input type="number" name="balance" class="form-control" value="<?php echo $client_obj['balance']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Save Data</button>
      </div>
      <div class="form-group">
        <a class="btn btn-primary btn-block" href="/client-list" role="button">Cancel</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>

    $(".select_branch").val($('#branch_id').val())
    $(".select_branch").change(function () {
    $("#branch_id").val($('#branch_name').val());
    });



    if ($("#update_client").length > 0) {
      $("#update_client").validate({
        rules: {
          name: {
            required: true,
          },
          address: {
            required: true,
            maxlength: 50,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          address: {
            required: "address is required.",
            maxlength: "The address should be or equal to 50 chars.",
          },
        },
      })
    }
  </script>
</body>

</html>