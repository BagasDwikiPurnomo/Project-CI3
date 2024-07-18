<html>
<!DOCTYPE html>
<head>
    <title>Order List</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- remix Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        th {
            background-color: #5A6268;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="jumbotron">
    <div class="container">
        <div class="row">
        <div class="col-md-8">
            <h1 class="display-4"><b style="color: orange">Order </b><b>List</b>&nbsp;<i class="ri-list-unordered"></i></h1>
            <p class="lead">halaman atau bagian dari sebuah aplikasi atau situs web yang menampilkan daftar Order pesanan yang terdaftar dalam sistem</p>
            <hr class="my-4">
            <p class="lead">
            <a class="btn btn-primary btn-lg" href="http://localhost/masterG/master/codeigniter/index.php" role="button">user</a>
            <a class="btn btn-danger btn-lg" href="http://localhost/masterG/master/codeigniter/index.php/Menu" role="button">menu</a>
            <a class="btn btn-warning btn-lg" href="http://localhost/masterG/master/codeigniter/index.php/order" role="button">order</a>
            </p>
        </div>
        <div class="col-md-4">
            <img src="..\assets\image\img-order.png" alt="" width="300">
        </div>
        </div>
    </div>
    </div>

    <div class="container">
        <h3>Form order</h3>
      <form method="post" action="<?php echo base_url('order/create_order'); ?>">

      <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Tanggal order</label>
            <div class="col-sm-10">
            <input class="form-control" type="date" name="order_date" id="order_date" placeholder="input tanggal" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ID" class="col-sm-2 col-form-label">ID user</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" placeholder="Input id user" name="id_user" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="ID" class="col-sm-2 col-form-label">Id menu</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="id_menu" placeholder="Input id menu" name="id_menu" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="ID" class="col-sm-2 col-form-label">Status pembayaran</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="status_payment" placeholder="Input status payment" name="status_payment" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
      </form>
      <table class="table table-bordered mt-5">
      <thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Tanggal order</th>
				<th scope="col">ID User</th>
				<th scope="col">ID Menu</th>
				<th scope="col">Status Pembayaran</th>
                <th scope="col">Opsi</th>
			</tr>
		</thead>
        <?php foreach ($order as $order) { ?>
            <tr>                     
                <td><?php echo $order->id_order; ?></td>
                <td><?php echo $order->order_date; ?></td>
                <td><?php echo $order->id_user; ?></td>
                <td><?php echo $order->id_menu; ?></td>
                <td><?php echo $order->status_payment; ?></td>
                <td style="text-align: center;">
                <a href="<?php echo base_url('order/edit/' . $order->id_order); ?>">
                    <button type="button" class="btn btn-outline-warning">Edit</button>
                </a>

                    |
                <a href="<?php echo base_url('order/delete/' . $order->id_order); ?>">
                        <button type="button" class="btn btn-outline-danger">Hapus</button>
                </a>
            </td>
            </tr>  
        <?php } ?>
    </table>
    </div>

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

    <p id="event">Waiting on event... </p>
    </div>
</body>
</html>
