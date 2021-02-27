<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!$_SESSION['u_name']){

    redirect('home','refresh');
}

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
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php 
                        $job_list = $this->db->get('jobs');

                        foreach ($job_list->result() as $job) { ?>
                        <tr>
                            <td><?php echo $job->j_id ?></td>
                            <td><?php echo $job->j_name ?></td>
                            <td><a href="<?php echo site_url() ?>jobs/update_job/<?php echo $job->j_id ?>" class="btn btn-sm btn-info btn-block">Edit</a></td>
                            <td><a href="<?php echo site_url() ?>jobs/delete_job/<?php echo $job->j_id ?>" class="btn btn-sm btn-danger  btn-block">Delete</a></td>
                        </tr>
                           
                       <?php } ?>
            
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