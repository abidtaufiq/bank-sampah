
<?php
 
  $query = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_SESSION['nia']."'");
  $row = mysqli_fetch_array($query);
  

 ?>

<html>
<head>
	<title>Homepage</title>
	<!--link datatables-->
    <style>

        label{
        font-family: Montserrat;    
        font-size: 18px;
        display: block;
        color: #262626;
        }

        input[type=text], input[type=password]{
          border-radius: 5px;
          width: 40%;
          height: 35px;
          background: #eee;
          padding: 0 10px;
          box-shadow: 1px 2px 2px 1px #ccc;
          color: #262626;
        }

        input[type=button]{
          height: 35px;
          width: 200px;
          background: #8cd91a;
          border-radius: 20px;
          color: #fff;
          margin-top: 20px;
          cursor: pointer;
        }

        input{
            font-family: Montserrat;
            font-size: 16px;
        }

        .form-group{
            padding: 5px 0;
        }

    </style>    
</head>

<body>
	   <h2 style="font-size: 30px; color: #262626;">Data Administrator</h2>

	   <div class="form-group">
          <form action="" method="post">
          <label class="text-left">Nomor Induk Admin</label>
          <input type="text" style="cursor: not-allowed;" name="nia" disabled="disabled" value="<?php echo $row['nia'] ?>" />
         </div>
         <div class="form-group">
          <label class="">Nama Admin</label>
          <input type="text" style="cursor: not-allowed;" name="nama" disabled="disabled" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" style="cursor: not-allowed;" name="telepon" disabled="disabled" value="<?php echo $row['telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">E-mail</label>
          <input type="text" style="cursor: not-allowed;" name="username" disabled="disabled" value="<?php echo $row['email'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="password" style="cursor: not-allowed;" name="password" disabled="disabled" value="<?php echo $row['password'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Level Admin</label>
          <input type="text" style="cursor: not-allowed;" disabled="disabled" name="level" value="<?php echo $row['level'] ?>"/>
         </div>
        
         <input type="button" onclick="window.location='admin.php?page=edit-admin';" value="Edit Data" />
        
        
</body>
</html>
