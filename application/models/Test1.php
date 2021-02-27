<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Jobs extends CI_Model {

    public function add_data( $data_details )
    {
        $this->db->insert('test1', $data_details);
        
    }
    

}

/* End of file Employee_Jobs.php */

