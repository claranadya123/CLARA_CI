<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>clara</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-warning mb-4">
      <a class="navbar-brand" href="#">clara's</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url("index.php/Blog") ?>">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Contact<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Berita<span class="sr-only">(current)</span></a>
          </li>
          <li class="dropdown nav-item active nav-link">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo ('category');?>">tambah</a></li>
            <li><a href="<?php echo ('category/view');?>">lihat kategori</a></li>
          </ul>
        </li>
        </ul>
        
      </div>
    </nav>
    <main role="main" class="container">
<table class="table table-striped table-bordered data">
            <tr>      
              <th>ID Kategori</th>
              <th>Nama Kategori</th>
              <th>Deskripsi</th>
              <th>Waktu Dibuat</th>
              <th colspan="2" style="text-align: center;">Aksi</font></th>
            </tr>
          </thead>
        <tbody>
            <?php foreach ($dataKategori as $key) {?>
          <tr>        
              <td><?php echo $key['cat_id']; ?></td>
              <td><?php echo $key['cat_name']; ?></td>
            <td><?php echo $key['cat_description']; ?></td>
            <td><?php echo $key['date_created']; ?></td>
              <td>
              <form action="<?php echo base_url('home/keEditKategori')?>" method="post">
                <input type="hidden" name= "edit" class="form-control" value="<?php echo $key['cat_id']; ?>">
                <button class="btn btn-warning">Edit</button>
              </form>
              </td>
            <td>
                <form action="<?php echo base_url('home/hapusKategori')?>" method="post">
                <input type="hidden" name= "delete" class="form-control" value="<?php echo $key['cat_id']; ?>">
                <input type="hidden" name= "cat_name" class="form-control" value="<?php echo $key['cat_name']; ?>">
                  <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus kategori <?php echo $key['cat_name']?> ?')">Delete</button>
              </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
    </main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
