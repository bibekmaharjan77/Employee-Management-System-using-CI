<div class="panel panel-default">
    <div class="panel-heading">Employee Actions</div>
        <div class="list-group">
                            <a href="<?php echo site_url(); ?>employees/add_employee" class="list-group-item">Add Employee</a>
                            <!-- function ko name inde vako vayera tala employees paxi / dera lekhna parena else otherwise  -->
                            <a href="<?php echo site_url(); ?>employees" class="list-group-item">Employee List</a>
        </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Job Actions</div>
        <div class="list-group">
                            <!-- Add job click garepaxi Jobs controller vitra ko index chalxa 
                            since function ko name index xa so siteurl paxi jobs matra lekhda vayo
                            jobs/index lekhirakhnu parena -->
                            <a href="<?php echo site_url(); ?>jobs" class="list-group-item">Add Job</a>
                            <a href="<?php echo site_url(); ?>jobs/view_jobs" class="list-group-item">Job List</a>
        </div>
</div>