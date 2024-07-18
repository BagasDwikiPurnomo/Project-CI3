<!DOCTYPE html>
<html lang="en">
<head>
  <title>User List</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- remix Icon -->
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
            <h1 class="display-4"><b style="color: blue">User </b><b> List</b> <i class="ri-user-line"></i></h1>
            <p class="lead">halaman atau bagian dari sebuah aplikasi atau situs web yang menampilkan daftar pengguna atau anggota yang terdaftar dalam sistem</p>
            <hr class="my-4">
            <p class="lead">
            <a class="btn btn-primary btn-lg" href="http://localhost/masterG/master/codeigniter/" role="button">user</a>
            <a class="btn btn-danger btn-lg" href="http://localhost/masterG/master/codeigniter/Menu" role="button">menu</a>
            <a class="btn btn-warning btn-lg" href="http://localhost/masterG/master/codeigniter/order" role="button">order</a>
            </p>
        </div>
        <div class="col-md-4">
            <img src="assets\image\user.png" alt="">
        </div>
        </div>
    </div>
    </div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Form user</h3>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form method="post" action="<?php echo base_url('User/create_user'); ?>">

      <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" placeholder="Input nama" name="name" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Input username" name="username" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Input password" name="password" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <select class="custom-select" id="level" name="level" required>
                    <option selected>Choose your level...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
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

  <div class="row mt-3">
    <div class="col-md-12">
      <h3>User List</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Level</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) { ?>
            <tr>
              <td><?php echo $user->id; ?></td>
              <td><?php echo $user->name; ?></td>
              <td><?php echo $user->username; ?></td>
              <td><?php echo $user->password; ?></td>
              <td><?php echo $user->level; ?></td>
              <td style="text-align: center;">
                <a href="<?php echo base_url('User/edit/' . $user->id); ?>">
                  <button type="button" class="btn btn-outline-warning">Edit</button>
                </a>

                <a href="<?php echo base_url('User/delete/' . $user->id); ?>">
                  <button type="button" class="btn btn-outline-danger">Hapus</button>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    const pusher = new Pusher('<?= $this->config->item('16b3ce37a71813c0e1e8') ?>', {
        cluster: '<?= $this->config->item('ap1') ?>',
        encrypted: true
    });

    const channel = pusher.subscribe('sweet-alert');
    channel.bind('show-alert', function(data) {
        Swal.fire({
            title: data.type,
            text: data.message,
            icon: data.type,
        });
    });
</script>

</body>
</html>
