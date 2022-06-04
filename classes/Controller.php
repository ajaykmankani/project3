<?php
session_start();
class Controller
{
	const SALT="end2021";
	private $model_Obj;
	public $IP,$USERAGENT;

	public function __construct()
	{
	    date_default_timezone_set('Asia/Kolkata');
		$this->model_Obj=new Model;
		$this->IP=$_SERVER['REMOTE_ADDR'];
		$this->USERAGENT=$_SERVER['HTTP_USER_AGENT'];
	}


	public function cleaner($data){
		return htmlspecialchars(addslashes($data));
	}

	public function adminlogin_process($tab_name,$uname,$pwd){
		$encrypt_pwd=sha1(Controller::SALT.$pwd);
		$result=$this->fetch_where($tab_name,array("id","status","role"),array("email"=>$uname,"pwd"=>$encrypt_pwd));
		if($result==true){
			foreach ($result as $row) {
				$id=$row->id;
				$status=$row->status;
				$role=$row->role;
			}
			$_SESSION["id"]=$id;
			$_SESSION["role"]=$role;
			$_SESSION["token"]=md5($id.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
			return true;
		}else{
			return false;
		}
	}

	public function redirect($url){
		header("Location: $url");
	}

	public function security_guard(){
		if(isset($_SESSION["token"])){
			if($_SESSION["token"]!=md5($_SESSION["id"].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'])){
				$this->redirect("index.php");
			}
		}else{
			$this->redirect("index.php");
		}
	}

	public function admin_logout(){
		//unset($_SESSION['id']);
		//unset($_SESSION['token']);
		session_destroy();
		//$this->redirect("index.php");
		echo "<script type='text/javascript'>window.location='index.php';</script>";
	}

	public function get_user_name($tab_name, $session_id){
		$res=$this->fetch_where("admin",array("uname","email"),array("id"=>$session_id));
		foreach ($res as $row) {
			$uname=$row->uname;
			$mobile=$row->email;
		}
		if(empty($uname)){
			echo $mobile;
		}else{
			echo $uname;
		}	
	}

	public function get_datetime(){
		date_default_timezone_set('Asia/Kolkata');
        return  date('Y-m-d H:i:s');
	
	}
	
	public function get_ipaddress(){
		return $_SERVER['REMOTE_ADDR'];
	}

	public function array_insert($tab,array $data){
		return $this->model_Obj->insert($tab,$data);
	}

	public function fetch_where($tab,$data,$base){
		return $this->model_Obj->fetch_where($tab,$data,$base);
	}

	public function fetch_where_order($tab,$data,$base,$order){
		return $this->model_Obj->fetch_where_order($tab,$data,$base,$order);	
	}
	
	public function fetch_where_order_limit($tab,$data,$base,$order,$limit){
		return $this->model_Obj->fetch_where_order_limit($tab,$data,$base,$order,$limit);	
	}
	
	

	public function get_today_recors(){
		return $this->model_Obj->getTodayRecords();
	}

	public function update_data($tab,$setData,$baseCol){
		return $this->model_Obj->update($tab,$setData,$baseCol);	
	}
	
	public function delete_data($tab,$baseCol){
		return $this->model_Obj->delete_anything($tab,$baseCol);
	}
	
	public function data_exist($tab,$col,$base){
		return $this->model_Obj->data_existence($tab,$col,$base);	
	}

	 public function rowCount($tab,$data,$base){
	 	return $this->model_Obj->count_row($tab,$data,$base);
	 }

	public function totalrowCount($tab,$data){
	 	return $this->model_Obj->totalrowCount($tab,$data);
	}

	public function todayrowCount($tab,$data){
	 	return $this->model_Obj->todayrowCount($tab,$data);
	}
	
	public function fetch_all($tab,$data,$order){
		return $this->model_Obj->all_fetcher($tab,$data,$order);
	}
	
	
	

}

?>