<!DOCTYPE html>
<html>

<head>
  <title>Edit Branch</title>
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
    <form method="post" id="update_branch" name="update_branch" 
    action="/update">
      <input type="hidden" name="id" id="id" value="<?php echo $branch_obj['id']; ?>">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $branch_obj['name']; ?>">
      </div>

      <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="<?php echo $branch_obj['address']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Save Data</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_branch").length > 0) {
      $("#update_branch").validate({
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