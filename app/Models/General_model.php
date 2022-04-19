<?php
namespace App\Models;
use CodeIgniter\Model;
/**
 * Created by PhpStorm.
 * User: Akubest Tech
 * Date: 8/17/2021
 * Time: 1:32 AM
 */
class General_model extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'admin';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields = [
        'email',
        'fname',
        'lname',
        'username',
        'pass',
        'role',
        'pic',
        'active',

    ];

    public function getRolename($pid) {
        $db = \Config\Database::connect();
        $builder = $db->table('roles');
       $result =  $builder->where(['id' => $pid])->get();
        foreach ($result->getResult() as $row) {
            return $row->role_name; } }
    public function roles($no = ""){
        $db = \Config\Database::connect();
        $builder = $db->table('roles');
        $builder->select("*");
       if(!empty($no)){ $builder->where('id >','2');}
       return $builder->get()->getResult();
    }
    public function insert_logs($data){
        $db = \Config\Database::connect();
        $builder = $db->table('user_log');
        $builder->insert($data);
    }
    public function update_logs($data,$fid){
        $db = \Config\Database::connect();
        $builder = $db->table('user_log');
        $builder->update($data,['admin_id' => $fid]); }

    public function verifyEmail($email){
                $db = \Config\Database::connect();
                $builder = $db->table('admin');
                $builder->select("id,fname,lname,username,email");
                $builder->where('email',$email);
                $result = $builder->get();
                if(count($result->getResultArray())== 1){
                   return $result->getRowArray();
                }else{ return false;}
            }
    public function processForgotPassword($recdata){
        $db = \Config\Database::connect();
        $builder = $db->table('password_recovery');
       if($builder->replace($recdata)){return true;}else{return false;}
    }
    public function load_bus_categories(){
        $db = \Config\Database::connect();
        $builder = $db->table('property_cattb');
        $builder->select("*");
        return $builder->get()->getResult();
    }
    public function load_pro_type($cat = null){
        $db = \Config\Database::connect();
        $builder = $db->table('property_type as ptb');
        $builder->select("ptb.*, ctb.category as c_name");
        $builder->join('property_cattb as ctb', 'ptb.category = ctb.id', "left"); // added left here
        if($cat != null){ $builder->where('ptb.category',$cat);}
        return $builder->get()->getResult();
    }
    public function getstatus()
    {     $output = '';
        $arr = array("Rent" =>"1","Sales" =>"2","Non Building" =>"3");
        foreach($arr as $val => $nvalue)
        {$output .= '<option value="'.$nvalue.'">'.$val.'</option>';}
        return $output;}
    public function getstate()
    {     $output = '';
        $arr = array("Abuja" =>"Abuja","Abia" =>"Abia","Adamawa" =>"Adamawa","Akwa Ibom" =>"Akwa Ibom",
            "Anambra" =>"Anambra","Bauchi" =>"Bauchi","Bayelsa" =>"Bayelsa","Benue" =>"Benue","Cross River" =>"Cross River",
            "Delta" =>"Delta","Ebonyi" =>"Ebonyi","Edo" =>"Edo","Ekiti" =>"Ekiti","Enugu" =>"Enugu",
            "Gombe" =>"Gombe","Imo" =>"Imo","Jigawa" =>"Jigawa","Kaduna" =>"Kaduna","Kano" =>"Kano",
            "Katsina" =>"Katsina","Kebbi" =>"Kebbi","Kogi" =>"Kogi","Kwara" =>"Kwara","Lagos" =>"Lagos",
            "Nassarawa" =>"Nassarawa","Niger" =>"Niger","Ogun" =>"Ogun","Ondo" =>"Ondo","Osun" =>"Osun",
            "Oyo" =>"Oyo","Plateau" =>"Plateau","Rivers" =>"Rivers","Sokoto" =>"Sokoto","Taraba" =>"Taraba",
            "Yobe" =>"Yobe","Zamfara" =>"Zamfara","Outside Nigeria" =>"Outside Nigeria");
        foreach($arr as $val => $nvalue)
        {$output .= '<option value="'.$nvalue.'">'.$val.'</option>';}
        return $output;}

    public function load_p_feat(){
        $db = \Config\Database::connect();
        $builder = $db->table('pro_feature');
        $builder->select("*");
        return $builder->get()->getResult();
    }
    public function loaduser($id = ""){
    $db = \Config\Database::connect();
    $builder = $db->table('admin as atb');
    $builder->select("atb.*,r.role_name");
    $builder->join('roles as r', 'atb.role = r.id', "left"); // added left here
    if(!empty($id) && ($id > 0) ){ $builder->where('atb.role',$id)->where('atb.active' , "1");}
    return $builder->get()->getResult();
}
    public function alog(){
        $db = \Config\Database::connect();
        $builder = $db->table('activity_log as al');
        $builder->select("al.*,atb.username,atb.fname,atb.lname,atb.oname");
        $builder->join('admin as atb', 'al.username = atb.id', "left"); // added left here
        $builder->orderBy('activity_log_id', 'DESC');
        return $builder->get()->getResult();
    }
    public function ulog(){
        $db = \Config\Database::connect();
        $builder = $db->table('user_log as ul');
        $builder->select("ul.*,atb.username,atb.fname,atb.lname,atb.oname");
        $builder->join('admin as atb', 'ul.admin_id = atb.id', "left"); // added left here
        $builder->orderBy('user_log_id', 'DESC');
        return $builder->get()->getResult();
    }
    public function delalog($id)
    {    $db = \Config\Database::connect();
        $model = $db->table('activity_log');
        $delete = $model->where('activity_log_id', $id)->delete();
        return $delete;
    }
    public function delulog($id)
    {    $db = \Config\Database::connect();
        $model = $db->table('user_log');
        $delete = $model->where('user_log_id', $id)->delete();
        return $delete;
    }
    public function loadpro($id = "",$pwd="",$urole=""){
        $db = \Config\Database::connect();
        $builder = $db->table('property_tb as ptb');
        $builder->select("ptb.*, atb.fname,atb.lname,atb.oname,ttb.ptype");
       $builder->join('admin as atb', 'ptb.pty_owner = atb.id', "left"); // added left here
        $builder->join('property_type as ttb', 'ptb.pro_type = ttb.id', "left"); // added left here
       if(!empty($id) && ($urole > 1)){ $builder->where('ptb.pty_owner',$id);}
        if(!empty($pwd) && ($pwd == 4)){ $builder->where('ptb.pro_status',0);}else{
            $builder->where('ptb.pro_what_to_do',$pwd);
        }
        return $builder->get()->getResult();
    }

    public function loadten($id = "",$pwd="",$urole=""){
        $db = \Config\Database::connect();
        $builder = $db->table('tenant_tb as otb');
        $builder->select("otb.*, atb.fname,atb.lname,atb.oname,ptb.pro_ref,ttb.ptype");
        $builder->join('admin as atb', 'otb.tenant_id = atb.id', "left"); // added left here
        $builder->join('property_tb as ptb', 'otb.pro_no = ptb.id', "left"); // added left here
        $builder->join('property_type as ttb', 'ptb.pro_type = ttb.id', "left"); // added left here
        if(!empty($id) && ($urole > 1)){ $builder->where('otb.pro_owner',$id);}
        if(!empty($pwd) && ($pwd == 1)){ $builder->where('otb.ten_status',0);}else{
            $builder->where('otb.ten_status',1); }
        return $builder->get()->getResult();
    }

    public function load_compy(){
        $db = \Config\Database::connect();
        $builder = $db->table('compy_tb');
        $builder->select("*");
        return $builder->get()->getResult();
    }
    public function add_business_category($catn){
        $data = array('category' => $catn
        );
        $db = \Config\Database::connect();
        $builder = $db->table('property_cattb');
        if($catn != null){
            $builder->where('category',$data['category']);
            $result = $builder->get();
            if(!(count($result->getResultArray()) > 0)){
                if($builder->insert($data)){
                    $categories = $this->load_bus_categories();
                    return $categories;
                }else{
                    return "Error saving this category";
                }
            }else{
                return "Error: This category already exists";
            }
        }else{
            return "Error: Category name cannot be empty";
        }
    }
    public function add_pro_type($catn,$ptype){
        $data = array('category' => $catn,'ptype' => $ptype
        );
        $db = \Config\Database::connect();
        $builder = $db->table('property_type');
        if($ptype != null){
            $builder->where('ptype',$data['ptype']);
            $result = $builder->get();
            if(!(count($result->getResultArray()) > 0)){
                if($builder->insert($data)){
                    $categories = $this->load_pro_type();
                    return $categories;
                }else{
                    return "Error saving this Property Type";
                }
            }else{
                return "Error: This Property Type already exists";
            }
        }else{
            return "Error: Property Type cannot be empty";
        }
    }
    public function verifyToken($token){
        $db = \Config\Database::connect();
        $builder = $db->table('password_recovery');
        $builder->select("admin_id,recovery_code,user_id,request_time,expiry_time");
        $builder->where('recovery_code',$token);
        $result = $builder->get();
        if(count($result->getResultArray())== 1){
            return $result->getRowArray();
        }else{ return false;}
    }
    public function updatePassword($id,$pwd,$id2){
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        //$builder->select("*");
       // $builder->from('admin');
        //$builder->where('recovery_code',$id);
        $builder->update(['pass'=>$pwd], ['id' => $id2]);
        if($this->db->affectedRows()==1){return true;}else{return false;}
    }
    public function changePassword($npass,$opass,$id){
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->select("id,fname,lname,username,email,pass");
        $user = $builder->where('id',$id)->get()->getRowArray();
       if(password_verify($opass,$user['pass'])){
      $builder->update(['pass'=>password_hash($npass,PASSWORD_DEFAULT)],['id' => $id]);
            return "User Password Successfully Updated!!";
       }
        return "Incorrect Current Password !";
    }
    public function deleten($id){
        // Delete member data
        $db = \Config\Database::connect();
        $builder = $db->table('property_type');
        $delete2 = $builder->where('id', $id)->delete();
        // Return the status
        return $delete2?true:false;
    }
    function save_lfeat($fname){
    $db = \Config\Database::connect();
        $builder = $db->table('pro_feature');
        $builder->where('prop_feature',$fname);
        $resultn = $builder->get();
        if(!(count($resultn->getResultArray()) > 0)) {
            $result = $builder->insert(['prop_feature' => $fname]);
            return $result;
        }else{ return "The Property Feature Already Exit Please try again!";}
    }
    function delfeat($id){
   $db = \Config\Database::connect();
        $builder = $db->table('pro_feature');
        $result = $builder->where('id', $id)->delete();
        return $result;
    }
    function update_feat($feature_name,$fid){
      $db = \Config\Database::connect();
        $builder = $db->table('pro_feature');
        $builder->where('prop_feature',$feature_name);
        $resultn = $builder->get();
        if(!(count($resultn->getResultArray()) < 1)) {
            return "The Property Feature Already Exit Please try again!";
        }else{ $result=$builder->update(['prop_feature'=>$feature_name], ['id' => $fid]);
            return $result; }
    }

    public function insert_compy($data) {
        $db = \Config\Database::connect();
        $builder = $db->table('compy_tb');
        $builder->where('compy_n',$data['compy_n']);
        $result = $builder->get();
        $builder->where('uid',$data['uid']);
        $result2 = $builder->get();
        if(!(count($result2->getResultArray()) > 0)){
        if(!(count($result->getResultArray()) > 0)){
            if($result = $builder->insert($data))
            { $comp =  $builder->where('uid', $data['uid'])->get()->getResult();//$this->load_compy();
                return $comp;
                //return $this->db->insertID();
            } else
            { return "Error saving Company Information";}

        }else{
            return "The Company Name Already Exist !!!";
       }}else{
            return "You Have Already Added your Company Information";
        }
    }
    public function update_compy($data,$id) {
        $db = \Config\Database::connect();
        $builder = $db->table('compy_tb');
        $builder->where('compy_n',$data['compy_n']);
        $result = $builder->get();
        $builder->where('uid',$data['uid']);
        $result2 = $builder->get();
        if(!(count($result2->getResultArray()) > 1)){
            if(!(count($result->getResultArray()) > 1)){
                if($result3 = $builder->update($data,['id' => $id]))
                { $comp =  $builder->where('uid', $data['uid'])->get()->getResult();//$this->load_compy();
                    return $comp;
                    //return $this->db->insertID();
                } else
                { return "Error saving Company Information";}

            }else{
                return "The Company Name Already Exist !!!";
            }}else{
            return "You Have Already Added your Company Information";
        }
    }

    public function f_lgan($cat = null)
    {
        if($cat != null){
            $types = $this->db->get_where('business_types',array('category'=>$cat))->result_array();
        }else{
            $types = $this->db->get('business_types')->result_array();
        }
        $cats = $this->load_bus_categories();
        $r_types = array();
        foreach ($cats as $cat){
            foreach ($types as $type){
                if($type['category'] == $cat['id']){
                    $type['category_name'] = $cat['category'];
                    array_push($r_types,$type);
                }
            }
        }
        return $r_types;
    }
    public function load_user_details($id){
        $db = \Config\Database::connect();
        $builder = $db->table('admin as ad');
        $builder->select("ad.*, dtb.address as address,dtb.gender,dtb.state,dtb.lga,dtb.dob,ltb.lga_id,dtb.passport,rtb.role_name");
        $result = $builder->where('ad.id', $id);
        $builder->join('details as dtb', 'ad.id = dtb.uid', "left"); // added left here
        $builder->join('lga_tb as ltb', 'dtb.lga = ltb.lga_id', "left"); // added left here
        $builder->join('roles as rtb', 'ad.role = rtb.id', "left"); // added left here
        return $builder->get()->getResult();
    }
    public function updateprofile($data,$data2,$id) {
        if(empty($data2['email'])){
            return "Email Address Field cannot be empty!";
        }else{
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder2 = $db->table('details');
        $builder->where('email',$data2['email'])->limit(0, 1);
        $result = $builder->get();
        if(!(count($result->getResultArray()) > 1)){
       if($result3 = $builder->update($data2,['id' => $id]))
                {$builder2->update($data,['uid' => $id]);
                    $comp =  $builder2->where('uid', $id)->get()->getResult();
                    //return "User Profile successfully updated !";
                    //return $this->db->insertID();
                } else { return "Error saving Company Information";}
        }else{
            return "The email address already Exist !";
        }
    }}
    public function updateUsers($data,$data2,$id) {
        if(empty($data2['username'])){
            return "Username Field cannot be empty!";
        }else{
            $db = \Config\Database::connect();
            $builder = $db->table('admin');
            $builder2 = $db->table('details');
            $builder->where('username',$data2['username'])->limit(1, 1);
            $result = $builder->get();
            $builder->where('email',$data2['email'])->limit(1, 1);
            $result2 = $builder->get();
            if(!(count($result->getResultArray()) > 1)){
                if(!(count($result2->getResultArray()) > 1)){
                if($result3 = $builder->update($data2,['id' => $id]))
                {$builder2->update($data,['uid' => $id]);
                    //$comp =  $builder2->where('uid', $id)->get()->getResult();
                    //return "User Profile successfully updated !";
                    //return $this->db->insertID();
                } else { return "Error saving Company Information";}
                }else{
                    return "The email address already Exist !";}
            }else{
                return "The Username  already Exist !";
            }
        }}

    function deluser($id){
        $db = \Config\Database::connect();
      $model = $db->table('admin');
        $model2 = $db->table('details');
        $delete = $model->where('id', $id)->delete();
        if($delete)
        { $result = $model2->where('uid', $id)->delete();
            return $result;
        }
    }
    function delpro($id){
        $db = \Config\Database::connect();
        $model = $db->table('property_tb');
        $model2 = $db->table('assign_pro_feat_tb');
        $model3 = $db->table('pro_img');
        $gimg = $model3->where('pro_id',$id)->get();
     $delete = $model->where('id', $id)->delete();
        if($delete)
        { $result = $model2->where('pro_id', $id)->delete();
            $result2 = $model3->where('pro_id', $id)->delete();
            // Remove files from the server
            if(!empty($gimg)){
                foreach ($gimg->getResult() as $row) {
                    unlink(FCPATH ."assets/img/hero/".$row['pimg']);
                }}
            return $result;
        }
    }


    public function insert_users($data,$data2) {
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder2 = $db->table('details');
        $builder->where('username',$data['username']);
        $result = $builder->get();
        $builder->where('email',$data['email']);
        $result2 = $builder->get();
     if(!(count($result->getResultArray()) > 0)){
            if(!(count($result2->getResultArray()) > 0)){
                if($result3 = $builder->insert($data))
                { $insertid = $db->insertID();
                    $userd = array(
                        'gender' => $data2['gender'],
                        'uid' => $insertid   );
                    $builder2->insert($userd);
                //$comp =  $builder->where('uid', $data['uid'])->get()->getResult();//$this->load_compy();
                    //return $comp;
                    //return $this->db->insertID();
                } else { return "Error Saving User Details !";}
            }else{
                return "The email address already Exist !";}
        }else{
            return "The Username  already Exist !";
        }

    }

    public function addProperty($data) {
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->where('username',$data['username'])->where('active' , "1");
        $result = $builder->get();
        $builder->where('username',$data['username'])->where('active' , "1")->where('role > ' , "4");
        $result2 = $builder->get();
        if(count($result->getResultArray()) > 0){
            if(count($result2->getResultArray()) < 1) {
                $builder2 = $db->table('admin as ad');
                $builder2->select("ad.*,rtb.id,rtb.role_name");
                $comp = $builder2->where('ad.username', $data['username']);
                $builder2->join('roles as rtb', 'ad.role = rtb.id', "left"); // added left here
                return $builder2->get()->getResult();
            }else{
                return "You'r Not Allowed to add Property !";
            }}else{
            return "The Username / ID is incorrect please try Again !";
        }
    }

    public function generate_reference()
    { $db = \Config\Database::connect();
        $builder = $db->table('property_tb');
       $builder->select("*");
            $num_rows = $builder->countAll();
            if($num_rows == 0){
                return "00000001";
        }else{ $new_reference = sprintf('%08d',$num_rows + 1);
                return $new_reference; }}

    public function savePty($userdata,$featdata,$imgdata){
      $db = \Config\Database::connect();
        $builder = $db->table('property_tb');
        $builder2 = $db->table('assign_pro_feat_tb');
        $builder3 = $db->table('pro_img');
        $builder->where('pro_location',$userdata['pro_location'])->where('state' , $userdata['state'])->where('lga' , $userdata['lga']);
        $result = $builder->get();
       //$number_of_files_uploaded = count($imgdata);
        if(count($result->getResultArray()) >  0) {
            return "This property has been registered before!" . $imgdata['pro_id'];
        //}elseif ($number_of_files_uploaded > 3){
            //return "You can upload morethan Three(3) Images";
        }else{  $builder->insert($userdata);
            $PID = $db->insertID();
            for ($i=0; $i < sizeof($featdata['pro_features']); $i++)
            {  $data2 = array('pro_id' => $PID,'pro_features' => $featdata['pro_features'][$i]);
                $builder2->insert($data2); }
         foreach($imgdata['pimg'] as $file)
            { //$file->move(WRITEPATH . '/assets/img/hero/');
                $p_img = $file->getClientName();
                // Renaming file before upload
               $temp = explode(".",$p_img);
                if(empty($p_img)){ $featured_img = "default.jpg";}else{
                    $featured_img = round(microtime(true)) . '.' . end($temp);}
               $image = \Config\Services::image()
                    ->withFile($file)
                  ->text('Rent Flexy', [
                     'color'      => '#fff',
                        'opacity'    => 0.5,
                        'withShadow' => false,
                        'hAlign'     => 'center',
                        'vAlign'     => 'bottom',
                       'fontSize'   => 20
                   ])
                    //->fit(1600, 1600, 'left')
                   ->resize(1600, 1400, true, 'height')
                    // ->rotate(90)
                   ->save(FCPATH .'/assets/img/hero/'. $featured_img);
                $data = array('pro_id' =>  $PID,'pimg'  => $featured_img);
                 $save = $builder3->insert($data);
           }
                return $userdata;
        }
    }
    public function updatePty($userdata,$featdata,$imgdata,$id) {
        $db = \Config\Database::connect();
        $builder = $db->table('property_tb');
        $builder2 = $db->table('assign_pro_feat_tb');
        $builder3 = $db->table('pro_img');
        $builder->where('pro_location',$userdata['pro_location'])->where('state' , $userdata['state'])->where('lga' , $userdata['lga']);
        $result = $builder->get();
        if(count($result->getResultArray()) >  1){
            return "This property has been registered before!".$id;
        }else{ if($result3 = $builder->update($userdata,['id' => $id])){
            //for ($i=0; $i < sizeof($featdata['pro_features']); $i++)
           // {  $data2 = array('pro_features' => $featdata['pro_features'][$i]);
               // $builder2->update($data2,['pro_id' => $id]); }
            return $userdata;
        }else { return "Error Encounted during Property Update!";}
        }}

}