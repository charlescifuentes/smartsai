<?php
$user_id=$this->session->userdata('user_id');
 
if(!$user_id){
 
  redirect('users/login_view');
}
 
 ?>
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Profile Dashboard-CodeIgniter Login Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
    <div class="row">
    <div class="col-md-4">
 
      <table class="table table-bordered table-striped">
 
 
        <tr>
          <th colspan="2"><h4 class="text-center">User Info</h3></th>
 
        </tr>
          <tr>
            <td>Nombre de Usuario</td>
            <td><?php echo $this->session->userdata('user_name'); ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $this->session->userdata('user_email');  ?></td>
          </tr>
          <tr>
            <td>Nombres y Apellidos</td>
            <td><?php echo $this->session->userdata('user_data');  ?></td>
          </tr>
          <tr>
            <td>Teléfono</td>
            <td><?php echo $this->session->userdata('user_mobile');  ?></td>
          </tr>
      </table>
 
 
      </div>
    </div>
    <a href="<?php echo base_url('cusers/user_logout');?>" >  <button type="button" class="btn-primary">Logout</button></a>
    </div>
  </body>
</html>