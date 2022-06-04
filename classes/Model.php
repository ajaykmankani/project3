
<?php
/**
 * 
 */
class Model
{
	public $Ncon;
	public function __construct()
	{
		$obj = new Dbconnect;
		$obj_clone=$obj->con;
		$this->Ncon=$obj_clone;	
	}

	public function runQuery($query,$data=""){
		if(empty($data)){
			$stmt=$this->Ncon->prepare($query);
			$stmt->execute();
			return $stmt;
		}else{
			$stmt=$this->Ncon->prepare($query);
			$stmt->execute($data);
			return $stmt->errorCode();
		}
	}

	public function insert($tab,array $data){
		foreach($data as $row){
			$symbols[]='?';
		}
		$final_symbols=implode(",",$symbols);
		if($this->runQuery("insert into ".$tab." values(".$final_symbols.")",$data)){
			return true;
		}else{
			return false;	
		}
	}

	public function fetch_where_order($tab_name, array $fetch_col, array $base, $order=true){
		$final_fetch_col=implode(",",$fetch_col);
		if($order){
			$order="DESC";
		}else{
			$order="ASC";
		}
		foreach ($base as $k => $v) {
			$base_col[]=$k."='".$v."'";
		}
		$base_col_final=implode(" and ",$base_col);
		$res=$this->runQuery("select $final_fetch_col from $tab_name where 
			$base_col_final order by id $order");
		if($res->rowCount()>0){
			while ($row=$res->fetch(PDO::FETCH_OBJ)) {
				$data[]=$row;
			}
			return $data;
		}else{
			return false;
		}
	}
	
	public function fetch_where_order_limit($tab_name, array $fetch_col, array $base, $order=true,$limit){
		$final_fetch_col=implode(",",$fetch_col);
		if($order){
			$order="DESC";
		}else{
			$order="ASC";
		}
		foreach ($base as $k => $v) {
			$base_col[]=$k."='".$v."'";
		}
		$base_col_final=implode(" and ",$base_col);
		$res=$this->runQuery("select $final_fetch_col from $tab_name where 
			$base_col_final order by id $order LIMIT $limit");
		if($res->rowCount()>0){
			while ($row=$res->fetch(PDO::FETCH_OBJ)) {
				$data[]=$row;
			}
			return $data;
		}else{
			return false;
		}
	}


	public function getTodayRecords(){
	    date_default_timezone_set('Asia/Kolkata');
	    $date = $today = date('Y-m-d');
		$res = $this->runQuery("SELECT * FROM tb_leads WHERE date(created_at)='$date' ORDER BY id DESC");
		if($res->rowCount()>0){
			while ($row=$res->fetch(PDO::FETCH_OBJ)) {
				$data[]=$row;
			}
			return $data;
		}else{
			return false;
		}
	}

	public function update($tab,array $update_cols,array $baseCol,$con="and"){
		foreach($update_cols as $upd_k=>$upd_v){
			$store_upd_data[]=$upd_k."='".$upd_v."'";
			}
		$final_upd_data=implode(",",$store_upd_data);
		//for base
		foreach($baseCol as $base_k=>$base_v){
			$store_base_data[]=$base_k."='".$base_v."'";
		}
		$final_base_data=implode(" ".$con." ",$store_base_data);
		$res= $this->runQuery("update ".$tab." SET ".$final_upd_data." where ".$final_base_data);
		return $res;
	}
	
	public function data_existence($tab, $col_name, array $base){
		foreach ($base as $b_k => $b_v) {
			$base_col[]=$b_k."='".$b_v."'";
		}
		$base_col_final=implode(" and ",$base_col);
		$res=$this->runQuery("select $col_name from $tab where $base_col_final");
		if($res->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}

	public function count_row($tab, $fetch_col, array $base){
		$final_fetch_col=implode(",",$fetch_col);
		foreach ($base as $key => $value) {
			$dataUp[]=$key."="."'".$value."'";
		}
		$dataUp=implode(" OR ", $dataUp);
		$res=$this->runQuery("select $final_fetch_col from $tab where $dataUp");
		return $res->rowCount();
	}
	
	public function totalrowCount($tab, $fetch_col){
		$final_fetch_col=implode(",",$fetch_col);
		$res=$this->runQuery("select $final_fetch_col from $tab");
		return $res->rowCount();
	}


	public function todayrowCount($tab, $fetch_col){
	    $date = $today = date('Y-m-d');
		$final_fetch_col=implode(",",$fetch_col);
		$res=$this->runQuery("SELECT $final_fetch_col FROM tb_leads WHERE date(created_at)='$date' ORDER BY id DESC");
		return $res->rowCount();
	}

	public function fetch_where($tab_name,array $cols,array $base){
		$value=implode(",",$cols);	
		//for base 
		foreach($base as $k=>$v){
			$base_col[]=$k."='".$v."'";
			}
		$base_col_final=implode(" and ",$base_col);	
		$res=$this->runQuery("select ".$value." from ".$tab_name." where ".$base_col_final);
		if($res->rowCount()>0){
			while($row=$res->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}
			return $data;
		}else{
			return false;
		}
	}
	
	public function all_fetcher($tab_name, array $cols, $order=true){
		$value=implode(",",$cols);
		if($order){
			$order="DESC";
		}else{
			$order="ASC";
		}
		$res=$this->runQuery("select $value from $tab_name order by id $order");
		if($res->rowCount()>0){
			while($row=$res->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}
			return $data;
		}else{
			return false;
		}
	}
	
	public function delete_anything($tab_name,array $where){
		foreach($where as $k=>$v){
			$dataUp[]=$k."="."'".$v."'";
		}
		$dataUp=implode("",$dataUp);
		return $this->runQuery("delete from ".$tab_name." where ".$dataUp);
	 }

}


?>