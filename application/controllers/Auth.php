<?php
class Auth extends CI_controller{
    public function main(){
        $this->load->view('adminpage');
    }
//admin login
    public function adminlogin(){
        $this->load->model('Admin_Model');

        $this->form_validation->set_rules('name','Admin_Name','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');


        if($this->form_validation->run()==true);
        {
            $name = $this->input->post('name');
            $user= $this->Admin_Model->getadmin($name);

            if(!empty($user)) {
                if(($this->input->post('password')== $user['password'])){
                    $sessArray['id']=$user['id'];
                    $sessArray['name']=$user['name'];
                    redirect(base_url().'index.php/Auth/getdata/');
                }           else{
                 $this->session->set_flashdata('msg','Either email or password  incorrect,please try again');
                 redirect(base_url().'index.php/Auth/main/');
             }

         }else{
            $this->session->set_flashdata('msg','Either email or password  incorrect,please try again');
            redirect(base_url().'index.php/Auth/main/');
        }
    }
}

public function Admindashboard(){
    $this->load->view('Admindashboard');
}
public function  register(){



    $this->load->model('Admin_Model');

    $this->form_validation->set_message('is_unique','email address is already exit,please try another');

    $this->form_validation->set_rules('first_name','First NAME','required');
    $this->form_validation->set_rules('last_name','Last NAME','required');
    $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
    
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('phone','PHONE','required');
    if($this->form_validation->run()==false){

        $this->load->view('Admindashboard');
    }else{


        $firstname=$this->input->post('first_name');
        $lastname=$this->input->post('last_name');
        $email=$this->input->post('email');
        $password=password_hash($this->input->post('password'),PASSWORD_DEFAULT) ;
        $phone=$this->input->post('phone');
        $created_at=date('Y-m-H:i:s');  

        $formArray = array(
            'first_name'=>$firstname,
            'last_name'=>$lastname,
            'email'=>$email,
            'password'=>$password,
            'phone'=>$phone,
            'created_at'=>$created_at
        );
        $this->load->model('Admin_Model');
        $this->Admin_Model->create($formArray);

        $this->db->cache_delete('Auth','userdatatable');
        $this->db->cache_delete('Auth','fetchdata');
        $this->db->cache_delete('Auth','register');

        $this->session->set_flashdata('msg','your account has been created successfully ');
        redirect(base_url().'index.php/Auth/Admindashboard');


    }
    
}
public function getdata(){
    $this->load->model('Admin_Model');
    $user['user']=$this->Admin_Model->getuserdata();

    $this->load->view('Admindashboard',$user);
    


}
public function deletedata($id){
    $this->load->model('Admin_Model');
    $user = $this->Admin_Model->getuserid($id);
    $data['user'] = $user;
    
    $this->load->view('Admindashboard',$data);
    

    $this->Admin_Model->deletedata($id);
    redirect(base_url().'index.php/Auth/getdata/');

}//user update by admin
public function updatedata($id){

    $this->load->model('Admin_Model');
    $user=$this->Admin_Model->getuserid($id);
    $data['user']=$user;

    $this->form_validation->set_rules('email','Email','required|valid_email');
    if($this->form_validation->run()==false){
        $this->load->view('adminedit',$data);
    }else{
        $formArray=array();
        $formArray['first_name']=$this->input->post('first_name');
        $formArray['last_name']=$this->input->post('last_name');
        $formArray['email']=$this->input->post('email');
        $formArray['phone']=$this->input->post('phone');

        $this->Admin_Model->updateuser($id,$formArray);

        redirect(base_url().'index.php/Auth/userdatatable');


    }

}
//user login
public function userloginmain(){
    $this->load->view('userlogin');
}
public function  userlogin(){
    $this->load->model('Admin_Model');

    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('password','Password','required');


    if($this->form_validation->run()==true);
    {
        $email = $this->input->post('email');
        $user= $this->Admin_Model->userlogin($email);

        if(!empty($user)) {
            if(!empty(password_verify($this->input->post('password'), $user['password']))){
                $sessArray['id']=$user['id'];
                $sessArray['first_name']=$user['first_name'];
                $sessArray['last_name']=$user['last_name'];
                $sessArray['email']=$user['email'];

                $this->session->set_userdata('user',$sessArray);


                redirect(base_url().'index.php/Auth/userdashboard/');

            } else {

                $this->session->set_flashdata('msg','Either email or password id incorrect,please try again');
                redirect(base_url().'index.php/Auth/userloginmain');
            }

        } else {
            $this->session->set_flashdata('msg',' Either email or password id incorrect,please try again');
            redirect(base_url().'index.php/Auth/userloginmain');
        }

    }   

    

    
}

//user dashboard
public function userdashboard(){
    $this->load->view('userdashboard');

}


// /user data tablenusing jquery
public function userdatatable(){
    $this->load->model('Admin_Model');

    // $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

    // if ( ! $user = $this->cache->get('foo'))
    // {
        // echo 'Saving to the cache!<br />';
    // $this->output->cache(1);
        $user = $this->Admin_Model->getuserdata();

        // Save into the cache for 5 minutes
        // $this->cache->save('foo', $user, 300);
        $this->load->view('userdatatable',array('user'=>$user));
    // }



    
}

public function fetchdata(){    
    $this->load->model('Admin_Model');
    $start = $_POST['start'];
    $length = $_POST['length'];
    $search= $_POST['search']['value'];

    $resultlist=$this->Admin_Model->getuserdata($start,$length,$search);
    $result=array();
// $i=1;
    foreach($resultlist as $value){
      $result['data'][]=array(
    // $i++,
        $value['id'],       
        $value ['first_name'],
        $value['last_name'],
        $value['email'],
        $value['phone']
    );
  }
  echo json_encode($result);  
}
 //user product uplaod
public function upload(){  

    $this->load->model('Admin_Model');



    $p_title=$this->input->post('p_title');
    $product_name=$this->input->post('product_name');
    $productdetails=$this->input->post('productdetails');
    $Specification=$this->input->post('Specification');
    $chooseproduct=$this->input->post('chooseproduct');
    $type=$this->input->post('type');
    $price=$this->input->post('price');
    $currency=$this->input->post('currency');
    $availability=$this->input->post('availability');
    $startingdate=$this->input->post('startingdate');
    $endingdate=$this->input->post('endingdate');

    
    $data=array(

        'p_title'=>$p_title,
        'product_name'=>$product_name,
        'description'=>$productdetails,
        'Specification'=>$Specification,
        'chooseproduct'=>$chooseproduct,
        'type'=>$type,
        'price'=>$currency.''.$price,

        'availability'=>$availability,
        'startingdate'=>$startingdate,
        'endingdate'=>$endingdate


    );
    $this->load->model('Admin_Model');
    $this->Admin_Model->product_insert($data);


    
} 
public function user_detail(){

    $course=$this->db->get_where('product_details',array('chooseproduct'=>'mobiles'));
    $record=$course->result_array();
    $course1=$this->db->get_where('product_details',array('chooseproduct'=>'clothes'));
    $record1=$course1->result_array();
    $course2=$this->db->get_where('product_details',array('chooseproduct'=>'Grocery'));
    $record2=$course2->result_array();
    $course3=$this->db->get_where('product_details',array('chooseproduct'=>'electricity'));
    $record3=$course3->result_array();



    echo "<h2>mobile</h2>";
    foreach($record as $key ) {

        echo $key['p_title'];
        echo "<br>";    
    }
    echo "<h2>clothes</h2>";

    foreach($record1 as $key ) {

        echo $key['p_title'];
        echo "<br>";    
    }
    echo "<h2>Grocery</h2>";
    foreach($record2 as $key ) {

        echo $key['p_title'];
        echo "<br>";    
    }
    echo "<h2>electricity</h2>";
    foreach($record3 as $key ) {

        echo $key['p_title'];
        echo "<br>";    
    }
    $this->load->view('userdetailtable');

}

public function active(){
    $this->load->model('Admin_Model');

    $p_title=$this->input->post('p_title');

    $product_name=$this->input->post('product_name');
    $status=$this->input->post('status');
    $chooseproduct=$this->input->post('chooseproduct');

    $data=array(

        'p_title'=>$p_title,
        'product_name'=>$product_name,
        'status'=>$status,
        'chooseproduct'=>$chooseproduct

    );
        // echo "<pre>";
        // print_r($data);

    $this->db->insert('active',$data);


    $this->load->view('activeform');
}
public function activestatus(){

 $course=$this->db->get_where('active',array('chooseproduct'=>'mobiles'));
 $record=$course->result_array();
 $course1=$this->db->get_where('active',array('chooseproduct'=>'clothes'));
 $record1=$course1->result_array();
 $course2=$this->db->get_where('active',array('chooseproduct'=>'Grocery'));
 $record2=$course2->result_array();
 $course3=$this->db->get_where('active',array('chooseproduct'=>'electricity'));
 $record3=$course3->result_array();



 echo "<h2>mobile</h2>";
 foreach($record as $key ) {

    echo $key['p_title'];
    echo "<br>"; 
    $name=$key['status'];
}
if($name=="deactive"){
    echo "<h2>mobile deactive</h2>";
    echo "<br>";
}else{
    echo "<h2>mobile inactive</h2>";
}


//for clothes
echo "<h2>clothes</h2>";

foreach($record1 as $key ) {

    echo $key['p_title'];
    echo "<br>";  
    $name1=$key['status'];

}
if($name1=="deactive"){
    echo "<h2>clothes deactive</h2>";
}else{
    echo "<h2>clothes inactive</h2>";
}

//for grocery
echo "<h2>Grocery</h2>";
foreach($record2 as $key ) {

    echo $key['p_title'];
    echo "<br>";    
    $name2=$key['status'];
}
if($name2=="deactive"){
    echo "<h2>Grocery deactive</h2>";
}else{
    echo "<h2>Grocery inactive</h2>";
}
//for electicity
echo "<h2>electricity</h2>";
foreach($record3 as $key ) {

    echo $key['p_title'];
    echo "<br>";    
    $name3=$key['status'];
}
if($name3=="deactive"){
    echo "<h2>electricity deactive</h2>";
}else{
    echo "<h2>electricity inactive</h2>";
}


}
// public function calender()
//  {
//   $this->load->library('calendar'); // Load calender library
//   echo $this->calendar->generate();
//  }

};  
?>






