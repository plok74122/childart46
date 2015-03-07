<?php
class Childart46_model extends CI_Model {

	public function __construct()
	{
		$this->Childart46 = $this->load->database('childart46',true);
	}
	
	public function check_item($item_array , $database)
	{
		$query = $this->Childart46->get_where( $database , $item_array);
		return $query->result_array();
	}
	public function insert_item($item_array , $database)
	{
		$this->Childart46->insert( $database , $item_array);
		$query = $this->Childart46->get_where( $database , $item_array);
		return $query->result_array();
	}

	public function delete_item($item_array , $database)
	{
		$query = $this->Childart46->delete( $database , $item_array);
		return $query;
	}		
	public function get_grade($class)
	{
		$this->Childart46->select('grade');
		$query = $this->Childart46->get_where('class',array('class'=>$class));
		return $query->result_array();
	}
	public function get_region($class)
	{
		$this->Childart46->select('region');
		$this->Childart46->group_by('region');
		if($class=="")
		{
			$query = $this->Childart46->get('school_info');
		}
		else
		{
			$query = $this->Childart46->get_where('school_info',array('type'=>$class));
		}
		return $query->result_array();
	}
	public function get_school($class,$region)
	{
		$this->Childart46->select('no,name');
		if($class=="")
		{
			$query = $this->Childart46->get_where('school_info',array('region'=>$region));
		}
		else
		{
			$query = $this->Childart46->get_where('school_info',array('type'=>$class,'region'=>$region));
		}
		return $query->result_array();
	}
	public function get_schoole_info($no)
	{
		$query =$this->Childart46->get_where('school_info',array('no' => $no));
		return $query->result_array();
	}
	public function pdf_class_note($class)
	{
		$this->Childart46->group_by('class');
		$query =$this->Childart46->get_where('class',array('class' => $class));
		return $query->result_array();
	}
	public function get_class()
	{
		$sql = "SELECT `class_note`,`class` from `class` group by `class` order by FIELD(`class_note`,'幼兒園組','國小低年級組','國小中年級組','國小高年級組','國中組','團體組')";
//		$this->Childart46->select('class_note,class');
//		$this->Childart46->group_by('class');
//		$query = $this->Childart46->get('class');
		$query = $this->Childart46->query($sql);
		return $query->result_array();
	}
	public function get_class_condition($database)
	{
		$this->Childart46->select('class_note,class');
		$this->Childart46->group_by('class');
		$query = $this->Childart46->get_where('class' , array('class' => $database));
		return $query->result_array();
	}
	public function get_type()
	{
		$this->Childart46->select('type,note');
		$query = $this->Childart46->get('type');
		return $query->result_array();
	}
	
	//處理收件清單
	public function get_receive_list( $send_name , $phone , $receive_date)
	{
		$condition = array('concat_name' =>  $send_name , 'concat_phone' => $phone , 'date' => $receive_date);
		$query = $this->Childart46->get_where('all_item',$condition);
		return $query->result_array();
	}
	public function get_receive_list_date( $query_array )
	{
		$this->Childart46->select('date');
		$this->Childart46->group_by('date');
		$this->Childart46->order_by('date','DESC');
		$query = $this->Childart46->get_where('all_item',$query_array);
		return $query->result_array();
	}
	
	//設定評定結果
	public function set_rank( $rank_type , $database , $no)
	{
		$this->Childart46->set('rank' , $rank_type);
		$this->Childart46->where('no' , $no);
		$this->Childart46->update($database);
		echo $this->Childart46->last_query();
	}
	
	//評定清單PDF用
	public function rank_list($database)
	{
		$query_array = array('database' => $database);
		$this->Childart46->where($query_array);
		$this->Childart46->where_in('rank' , array('特優','優選','佳作'));
		$this->Childart46->order_by("rank", "DESC"); 
		$query = $this->Childart46->get('all_item');
		return $query->result_array();
	}
	public function rank_count($database)
	{
		$query_array = array('database' => $database);
		$sql = "SELECT concat(`rank` , ' 共 ' , count(*) , ' 件') as `count` from `all_item` where `rank` in ('特優','優選','佳作') and `database` = '".$database."' group by `rank` order by `rank` DESC";
		$query = $this->Childart46->query($sql);
		foreach ($query->result() as $row)
		{
			$return_array[] = $row->count;
		}
		return $return_array;
	}
	
	//查詢statistics頁面用各群組的數量做成圖表
	public function statistics($database)
	{
		$sql = "SELECT `school_name` , count(*) as `count`  from `all_item` where `database` ='".$database."' group by `school_name` order by `count` DESC";
		$query = $this->Childart46->query($sql);
		foreach ($query->result() as $row)
		{
			$return_array['school_name'][] = $row->school_name;
			$return_array['count'][] = $row->count;
		}
		return $return_array;
	}
	//確認帳號密碼
	public function login_check($check_array)
	{
		$query = $this->Childart46->get_where('user',$check_array);
		return $query->num_rows();
	}	
	
	//ajax關鍵字
	public function ajax_keyword($keyword_array)
	{
		for($i=0 ; $i < count($keyword_array) ; $i++)
		{
		 $this->Childart46->like('concat_ws(`no`,`name`,`title`,`grade`,`teacher`,school_name)',$keyword_array[$i]);
		}
		$this->Childart46->limit(10);
		$query = $this->Childart46->get('all_item');
		return $query->result_array();
	}
	//透過年級取得selectclass
	public function get_selectclass($grade)
	{
		$this->Childart46->select('class');
		$query = $this->Childart46->get_where('class', array('grade' => $grade));
		$return = $query ->first_row('array');
		return $return['class'];
	}
}