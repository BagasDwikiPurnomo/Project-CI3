<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="margin: 35px;">
    <h1>User List</h1>
    <a href="http://localhost:1500/master/codeigniter/index.php" class="btn btn-outline-primary"><button style="border: none; background: none;">< Users</button></a>
    <a href="http://localhost:1500/master/codeigniter/index.php/Menu" class="btn btn-outline-primary"><button style="border: none; background: none;">< Menu</button></a>
    <a href="#" class="btn btn-outline-primary"><button style="border: none; background: none;">< Order</button></a>
    <table border="1" class="table" style="margin-top: 15px;">
      <br>
      <form method="post" action="<?php echo base_url('order/update/' . $order_id); ?>">    
        <label for="date">Tanggal order</label>
        <input class="form-control" type="date" name="order_date" id="order_date" value="<?php echo $order->order_date; ?>" required><br>
        <label for="ID">ID User</label>
        <input class="form-control" type="text" name="id_user" id="id_user" value="<?php echo $order->id_user; ?>" required><br>
        <label for="ID">ID Menu</label>
        <input class="form-control" type="number" name="id_menu" id="id_menu" value="<?php echo $order->id_menu; ?>" required><br>
        <label for="ID">Status Pembayaran</label>
        <input class="form-control" type="number" name="status_payment" id="status_payment"value="<?php echo $order->status_payment; ?>" required><br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>  
</body>
</html>
