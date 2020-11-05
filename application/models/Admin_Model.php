<?php       
 class Admin_Model extends CI_Model{
     public function getadmin($name){
         return  $this->db->where('name',$name)->get('adminlogin')->row_array();
     }

     public function create($formarray){  ///insert new user into database
        $this->db->insert('users',$formarray);
     }

     public function getuserdata($offset=0,$limit=10, $search =""){ 
       $this->db->cache_on();       
        $user= $this->db->select('*');
                if(!empty($search)){
                    $this->db->like('first_name',$search);
                }
                               $user=$this->db->limit($limit, $offset)->get('users')
                                ->result_array();
        $this->db->cache_off();
         return  $user;
     }

     
     public function deletedata($id){
         $this->db->where('id',$id);
         $this->db->delete('users');
     }
     public function getuserid($id){
         $this->db->where('id',$id);
         return $this->db->get('users')->row_array();
     }
     public function updateuser($id,$formarray){
         $this->db->where('id',$id);
         return $this->db->update('users',$formarray);
     }
     public function userlogin($email){
        return $this->db->where('email',$email)->get('users')->row_array();
     }

     public function fetchdata($data,$tablename,$where){
          return $query=$this->db->select($data)
          ->from($tablename)
          ->where($where)
          ->get()->result_array();
     }
     public function product_insert($data){
        $this->db->insert('product_details',$data);
         $last_id= $this->db->insert_id();
       echo json_encode(['id'=>$last_id]);
    
 
 }
    public function user_details($user){

      $this->db->select('chooseproduct'); 
    $this->db->from('product_details');   
    $this->db->where('chooseproduct', $chooseproduct);
    return $this->db->get()->result();
    }
    public function active($data){
        $this->db->insert('active',$data);
    }
 }
 ?>