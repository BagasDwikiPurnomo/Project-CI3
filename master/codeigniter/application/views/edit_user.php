<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="margin: 35px;">
    <h1>User List</h1>
    <a href="#" class="btn btn-outline-primary">Users</a>
    <a href="http://localhost:1500/master/codeigniter/index.php/Menu" class="btn btn-outline-primary">Menu</a>
    <a href="http://localhost:1500/master/codeigniter/index.php/order" class="btn btn-outline-primary">Order</a>
    <table border="1" class="table" style="margin-top: 15px;">
      <br>
      <form method="post" action="<?php echo base_url('User/update/' . $user_id); ?>">    
        &nbsp;&nbsp;<label for="nama">Nama:</label>
        &nbsp;&nbsp;<input class="form-control" type="text" name="name" id="nama" value="<?php echo $user->name; ?>" required><br>
        &nbsp;&nbsp;<label for="username">Username:</label>
        &nbsp;&nbsp;<input class="form-control" type="text" name="username" id="username" value="<?php echo $user->username; ?>" required><br>
        &nbsp;&nbsp;<label for="password">Password</label>
        &nbsp;&nbsp;<input class="form-control" type="password" name="password" id="password" value="<?php echo $user->password; ?>" required><br>
        <div class="form-group">
            <label for="level">Level</label>
            <select class="custom-select" id="level" name="level" required>
                <option value="1" <?php if ($user->level == 1) echo 'selected'; ?>>1</option>
                <option value="2" <?php if ($user->level == 2) echo 'selected'; ?>>2</option>
                <option value="3" <?php if ($user->level == 3) echo 'selected'; ?>>3</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </table>
    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('16b3ce37a71813c0e1e8', {
    cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    console.log('Received my-event with data:', data)
    Swal.fire("Notifikasi Pusher", data.message, "success");

    });
    </script>
</body>
</html>
