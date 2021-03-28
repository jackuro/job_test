<!DOCTYPE html>
<html>

<head>
  <title>New client With Validation</title>
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

      <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" 
    action="/submit-form-client">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="form-group">
        <label>Branches</label>
          <select  id="branch_name" class="select_branch form-control" >
          <option value="0">Select branch</option>
          <?php if($branches): ?>
          <?php foreach($branches as $branch): ?>
            <?php if(count($branches)==0): ?>
             <small>first add some bank branches</small> 
              <?php endif; ?>
           <option value="<?=$branch['id']?>"><?=$branch['name']?></option>
         <?php endforeach; ?>
         <input type="text" id="branch_id" name="branch_id" value="" class="d-none" >
         <?php endif; ?>
          </select>
      </div>

      <div class="form-group">
        <label>Balance</label>
        <input type="number" name="balance" class="form-control">
      </div>
    

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
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

   $(".select_branch").change(function () {
    $("#branch_id").val($('#branch_name').val());
    });

    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          branch_name: {
            required: true,
          },
            balance: {
            required: true,
            float: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          branch_name: {
            required: "Branch name is required.",
          }, 
            balance: {
            required: "balance is required.",
            float: "balance should be a number.",

          }, 
        },
      })
    }
  </script>



</body>

</html>