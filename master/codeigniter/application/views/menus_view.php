<!DOCTYPE html>
<html>
<head>
    <title>Menu List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
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
        <h1 class="display-4"><b style="color: red">Menu </b><b>List</b>&nbsp;<i class="ri-menu-add-line"></i></h1>
        <p class="lead">halaman atau bagian dari sebuah aplikasi atau situs web yang menampilkan daftar makanan atau minuman yang terdaftar dalam sistem</p>
        <hr class="my-4">
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="http://localhost/masterG/master/codeigniter/index.php" role="button">user</a>
          <a class="btn btn-danger btn-lg" href="http://localhost/masterG/master/codeigniter/index.php/Menu" role="button">menu</a>
          <a class="btn btn-warning btn-lg" href="http://localhost/masterG/master/codeigniter/index.php/order" role="button">order</a>
        </p>
      </div>
      <div class="col-md-4">
            <img src="..\assets\image\img-menu.png" alt="" width="300">
        </div>

    </div>
  </div>
</div>
    <div class="container">
    <h3>Form menu</h3>
    <div class="row">
    <div class="col-md-12">
      <form method="post" action="<?php echo base_url('Menu/create_menus'); ?>">

      <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama menu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="menu_name" placeholder="Input nama menu" name="menu_name" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Tipe</label>
        <div class="col-sm-10">
            <select class="custom-select" id="type" name="type" required>
                <option value="food">Makanan</option>
                <option value="drink">Minuman</option>
            </select>
        </div>
    </div>


        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="price" id="price" placeholder="input harga" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
      </form>
    </div>
  </div>
    
    <table class="table table-bordered mt-5">
    <thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nama Menu</th>
				<th scope="col">Tipe</th>
				<th scope="col">Harga</th>
                <th scope="col">Opsi</th>
			</tr>
		</thead>
        <?php foreach($menus as $menu) { ?>
                    <tr>
                        <td><?php echo $menu->id_menu; ?></td>
                        <td><?php echo $menu->menu_name; ?></td>
                        <td style="text-align: center;">
                            <?php if ($menu->type === 'food') { ?>
                                <span class="badge badge-danger"><?php echo $menu->type; ?></span>
                            <?php } else if ($menu->type === 'drink') { ?>
                                <span class="badge badge-success"><?php echo $menu->type; ?></span>
                            <?php } else { ?>
                                <span class="badge badge-danger"><?php echo $menu->type; ?></span>
                            <?php } ?>
                        </td>
                        <td>Rp. <?php echo number_format($menu->price, 0, ',', '.'); ?></td>
                        <td style="text-align: center;">
                            <a class="btn btn-outline-warning" href="<?php echo base_url('Menu/edit/') . $menu->id_menu; ?>">Edit</a>
                            <a class="btn btn-outline-danger" href="<?php echo base_url('Menu/delete/') . $menu->id_menu; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
    </table>
    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('16b3ce37a71813c0e1e8', {
    cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    console.log('Received my-event with data:', data);
    Swal.fire("Notifikasi Pusher", data.message, "success");

    });
    </script>

    <p id="event">Waiting on event... </p>
    </div>
</body>
</html>
