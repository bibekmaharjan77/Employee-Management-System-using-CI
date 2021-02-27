<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    // yaha constructor use garera model load gareko first mai 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users');
        
    }
    

    public function index(){
        // yo index vanekai login ko lagi 

        $this->load->view('inc/header');
        $this->load->view('home');
        $this->load->view('inc/footer');

    }

    public function register(){
        $this->load->view('inc/header');
        $this->load->view('register');
        $this->load->view('inc/footer');
    }

    public function login_process(){
        // login button ma click garyo vane yo chalxa 
        if($this->input->post('u_login')){
            $u_name=$this->input->post('u_name');
            $u_pass=md5($this->input->post('u_pass'));

            $user_data=array(
                'u_name' => $u_name ,
                'u_pass' => $u_pass
            );

            // database ko data taneko yo chai to check if the user actually exists 
            $users_list = $this->db->get_where('users', array('u_name' => $user_data['u_name']) );
            foreach($users_list->result() as $user){

                // user le ente gareko data and databse ko data compare garxa yasle 
                if($user_data['u_name'] == $user->u_name && $user_data['u_pass'] == $user->u_pass){
                    
                    $_SESSION['u_name']=$user_data['u_name'];
                    redirect('dash','refresh');
                    
                }
                else{
                    // js use garera alert message pop garne banako ani ok click garepaxi home ma redirect hunxa 
                    echo "<script> alert('Username or Password Incorrect!'); </script>";
                    
                    redirect('home','refresh');
                    
                }
            }
            
        }
        else{
            redirect('home','refresh');
        }
    }

    public function register_process(){
        if($this->input->post('u_reg')){
            $u_email=$this->input->post('u_email');
            $u_name=$this->input->post('u_name');
            $u_pass=md5($this->input->post('u_pass'));

            $user_data=array(
                'u_email' => $u_email,
                'u_name' => $u_name ,
                'u_pass' => $u_pass
            );

            // Model Users ko through insert_user vanne method call gareko $user_data as parameter pass garera 
            // this inserts the data into the database 
            $this->Users->insert_user($user_data);
            redirect('home','refresh');
        }
        else{
            redirect('home','refresh');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        
        redirect('home','refresh');
        
    }

}





?>