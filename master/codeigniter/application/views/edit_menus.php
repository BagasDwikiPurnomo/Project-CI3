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
    <a href="#" class="btn btn-outline-primary"><button style="border: none; background: none;">< Menu</button></a>
    <a href="http://localhost:1500/master/codeigniter/index.php/order" class="btn btn-outline-primary"><button style="border: none; background: none;">< Order</button></a>
    <table border="1" class="table" style="margin-top: 15px;">
      <br>
      <form method="post" action="<?php echo base_url('Menu/update/' . $menus_id); ?>">    
      <label for="nama">Nama Menu</label>
      <input class="form-control" type="text" name="menu_name" id="menu_name" value="<?php echo $menus->menu_name; ?>" required><br>
      <label for="type">Tipe</label>
      <select class="custom-select" id="type" name="type" value="<?php echo $menus->type; ?>" required><br>
          <option selected disabled></option>
          <option value="Makanan" <?php if ($menus->type == 'Makanan') echo 'selected'; ?>>Makanan</option>
          <option value="Minuman" <?php if ($menus->type == 'Minuman') echo 'selected'; ?>>Minuman</option>
      </select><br>
      <label for="harga">Harga:</label>
      <input class="form-control" type="number" name="price" id="price" value="<?php echo $menus->price; ?>" required><br>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>  
</body>
</html>
