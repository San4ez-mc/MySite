<?php
require_once "config_class.php";
require_once "checkvalid_class.php";

class DataBase
	{
    private $config;
	private $mysqli;
	private $valid;
	
	public function __construct()
		{
		$this->config = new Config();
		$this->valid = new  CheckValid();
		$this->mysqli = new mysqli($this->config->host, $this->config->user, $this->config->password, $this->config->db);
		//$this->mysqli = new mysqli("localhost","root","","mybase");
		$this->mysqli->query("SET NAMES 'utf8'");
		}
	
	private function query($query)
		{
		return $this->mysqli->query($query);
		}
		
	 
	private function select($table_name,$fields, $where = "", $order = "", $up= true, $limit="")
		{
		for($i=0;$i<count($fields); $i++)
			{
			if(strpos($fields[$i], "(")===false&&$fields[$i]!="*")$fields[$i] = "`".$fields[$i]."`"; //  else echo "error here";
			}
			$fields = implode(",",$fields);    
			$table_name = $this->config->db_prefix.$table_name;		
						
			if(!$order) $order = "ORDER BY `id`";
			else
				{
				if($order !="RAND()")
					{
					$order = "ORDER BY `$order`";
					if(!$up) $order.= " DESC";
					}
				else $order = "ORDER BY $order";
				}
			if($limit) $limit = "LIMIT $limit";
			if($where) $query = "SELECT $fields FROM `$table_name` WHERE $where $order $limit";
			else $query = "SELECT $fields FROM `$table_name` $order $limit";
			
			$result_set = $this->query($query);
			if(!$result_set) return false;
			$i=0;
			while($row=$result_set->fetch_assoc())
				{
				$data[$i]= $row;
				$i++;
				}
			$result_set->close();//хіба не $query->close();має бути?
			return $data;
		} 
		
	public function insert($table_name, $new_values)
		{
		$table_name = $this->config->db_prefix.$table_name;
		$query = "INSERT INTO $table_name (";
		foreach( $new_values as $field=>$value) $query .= "`".$field."`,";//не шарю нащо тут крапочка після query
		$query = substr($query,0,-1);
		$query.= ") VALUES (";
		foreach( $new_values as $value) $query .= "'".addslashes($value)."',";
		$query = substr($query,0,-1);
		$query.=")";
		return $this->query($query);
		}
			
	public function update($table_name, $upd_fields, $where)
		{
		$table_name = $this->config->db_prefix.$table_name;
		$query = "UPDATE `$table_name` SET ";
		foreach( $upd_fields as $field=>$value) $query .= "`$field` = '".addslashes($value)."',";
		$query = substr($query,0,-1);
		if($where)
			{
			$query.= "WHERE $where";
			return $this->query($query);
			}
		else return false;
		}
		
	public function delete($table_name, $where)
		{
		$table_name = $this->config->db_prefix.$table_name;
		if($where) 
			{
			$query = "DELETE FROM $table_name WHERE $where";
			return $this->query($query);
			}
		else return false;
		}
	
	public function deleteAll($table_name)
		{
		$table_name = $this->config->db_prefix.$table_name;
		$query  = "TRUNCATE TABLE `$table_name`";
		return $this->query($query);
		}
	
	public function getAllOnField($table_name, $field, $value,$order, $up)
		{
		return $this->select($table_name, array("*"), "`$field`='".addslashes($value)."'", $order, $up); 
		}
	
	public function getField($table_name, $field_out, $field_in, $value_in)
		{
		$data = $this->select($table_name, array($field_out), "`$field_in`='".addslashes($value_in)."'");
		if(count($data)!=1) return false;
		return $data[0][$field_out];
		}
		
	public function getFieldOnID($table_name,$id, $field_out)
		{
		if(!$this->existsID($table_name, $id)) return false; 
		return $this->getField($table_name, $field_out, "id", $id);
		}
		
	public function getAll($table_name, $order, $up)
		{
		return $this->select($table_name,array("*"), "",$order,$up);
		}
		
	public function deleteOnID($table_name, $id)
		{
		if(!$this->existsID($table_name, $id)) return false; 
		return $this->delete($table_name, "`id` = '$id'");
		}
		
	public function setField($table_name, $field, $value, $field_in, $value_in)
		{
		return $this->update($table_name, array($field=> $value), "`$field_in` = '".addslashes($value_in)."'");
		}
		
	public function setFieldOnID($table_name, $id, $field, $value)
		{
		if(!$this->existsID($table_name, $id)) return false;
		return $this->setField($table_name, $field, $value, "id", $id);
		}
		
	public function getElementOnID($table_name, $id)
		{
		if(!$this->existsID($table_name, $id)) return false;
		$arr= $this->select($table_name, array("*"), "`id` = '$id'");
		return $arr[0];
		}
	
	public function getRandomElements($table_name, $count)
		{
		return $this->select($table_name, array("*"),"","RAND()",true,$count);
		}
		
	public function getCount($table_name)
		{
		/*$data = $this->select($table_name, array("*"));
		return count($data);
		мій варіант */
		$data = $this->select($table_name, array("COUNT(`id`)"));
		return $data[0]["COUNT(`id`)"];
		}
		
	public function isExists($table_name,$field, $value)
		{
		$data = $this->select($table_name, array("id"), "`$field` = '".addslashes($value)."'");
		if(count($data)===0) return false;
		return true;
		}

	private function existsID($table_name,$id)
		{
		if(!$this->valid->validID($id)) return false;
		$data = $this->select($table_name, array("id"), "`id` = '".addslashes($id)."'");
		if(count($data)===0) return false;
		return true;	
		}
	
	public function getLastID($table_name)
		{
		$data = $this->select($table_name, array("MAX(`id`)"));
		return $data[0]["MAX(`id`)"];
		}
	
	public function __destruct()
		{
			if($this->mysqli) $this->mysqli->close();
		}
	
	//мої методи
	
	public function getMaxValue($table_name, $field)
		{
		$data= $this->select($table_name, array($field));
		if(count($data)===0) return false;
		
		
		foreach($data as $value)
			{
			$temparr[]=$value[$field] ;
			}
		if(!$temparr) return false;
		return max($temparr);
		}
		
	public function getMaxID($table_name)
		{
		return $this->getMaxValue($table_name, "id");
		}
		
	public function getMinValue($table_name, $field)
		{
		$data= $this->select($table_name, array($field));
		foreach($data as $value)
			{
			$temparr[]=$value[$field] ;
			}
		if(!$temparr) return false;
		return min($temparr);
		}

	// public function ConvertTimeToUnix($time)
		// {
		// $time["date"]=array(date("d"),date("m"),date("Y"));
		// $time["time"]=array(0,0,0);
		// if(strpos($time, " "))
			// {
			// $time = explode(" ",$time);
			// $time["time"]= explode (":", $time[0]);
			// $time["date"]=explode(".", $time[1]);
			// foreach ($time["date"] as &$value) if (!$value) $value=1;	
			// }
		// elseif(strpos($time, ":"))
			// {
			// $time["time"]= explode (":", $time);
			
			// }
		// elseif (strpos($time, "."))
			// {
			// $time["date"] = explode(".",$time);
			
			// }
			// $UnixTime=mktime($time["time"][0],$time["time"][1],$time["time"][2],$time["date"][1],$time["date"][0],$time["date"][2]);
			// return $UnixTime;
			
		// }
		
	public function getAllInsideBorders($table_name, $field, $min_value, $max_value,$SortByDate=false)//перевірити завтра 
		{
		if ($SortByDate)
			{
			$min_value=ConvertTimeToUnix($min_value);
			$max_value=ConvertTimeToUnix($max_value);
			}
		$arr= $this->select($table_name, array("*"), "`$field` BETWEEN '$min_value' AND '$max_value'");
		return $arr;
		}

	}
		

?>
