<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$_SESSION['u_name']){

    redirect('home','refresh');
}

$id = $this->uri->segment(3);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- dash-nav  -->
    <?php $this->load->view('dash/inc/nav');  ?>
    <!-- dash-nav  -->

    <!-- dash data  -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <!-- side-bar  -->
                <?php $this->load->view('dash/inc/sidebar');
                 ?>
                <!-- side-bar  -->
            </div>
            <div class="col-lg-9 col-md-9">
                <table class="table table-bordered">
                    <?php  
                        $employee_details=$this->db->get_where('employees',array('e_id' => $id));
                        foreach ($employee_details->result() as $employee) { ?>
                            
                            <tr>
                                <th>Added Date</th>
                                <td><?php echo $employee->e_date ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $employee->e_name ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $employee->e_email ?></td>
                            </tr>
                            <tr>
                                <th>Contact</th>
                                <td><?php echo $employee->e_phone ?></td>
                            </tr>
                            <tr>
                                <th>Job</th>
                                <td><?php echo $employee->e_job ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="<?php echo site_url() ?>employees/update_employee/<?php echo $employee->e_id; ?>" class="btn btn-info">Edit</a>
                                    <a href="<?php echo site_url() ?>employees/delete_employee/<?php echo $employee->e_id; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                    <?php }  ?>
                   
                </table>
            </div>
        </div>
    </div>
    <!-- dash data  -->



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" ></script>
  </body>
</html>