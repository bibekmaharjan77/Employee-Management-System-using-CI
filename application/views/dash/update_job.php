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
                <div class="panel panel-default">
                    <div class="panel-heading">Add Job</div>
                        <div class="panel-body">
                            <!-- form tag ko satta php ko form_open function use gareko aba yaha 
                            form_open('url','class')
                            url vitra Controller ko main class name "/" paxi ani function name -->
                            <?php echo form_open('jobs/update_process_jobs/'.$id,'class="form=horizontal"') ?>
                                <?php 
                                    $jobs_list = $this->db->get_where('jobs',array('j_id' => $id));
                                    
                                    foreach ($jobs_list->result() as $job) { ?>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Job Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="j_name" class="form-control input-sm" value="<?php echo $job->j_name; ?>" placeholder="Job Name">
                                            </div>
                                        </div>

                                    <?php }  ?>
                              
                                <br> <br>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" name="update_job" class="btn btn-sm btn-warning" value="Update Job">
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
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