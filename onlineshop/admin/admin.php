<?php
class ADMIN
	{
	public static $error_admin="";

	public function CheckLoginPassword($login,$password)
		{
		if($login!="admin"||$password!="123")
			{
			return false;
			}
		else 
			{
			session_start();
			$_SESSION["isAuth"]=true;
			header("Location: admin/index.php");	
			exit;
			}
		}
	
	public function ShowAdminPanel($isAuth)
		{
		if($isAuth)
			{
			if(isset($_GET["page"]))$ref="<a href ='http://onlineshop.mysite.lol/index.php'>Повернутися на головну</a>";
			else $ref="<a href ='http://onlineshop.mysite.lol/admin/index.php?page=1'>Перейти до Адмін-панелі</a>";
			$out= "
				<form name ='form' action = 'index.php' method='post'>
					<table>
						<tr>
							<td>Ви увійшли як Адмін<br/>
							".$ref."								
							</td>
							<td>
								<input type='submit' name = 'outButton' value='logOut'>
							</td>
						</tr>
					</table>
				</form>								
			";
			}
		else
			{
			$out = "
			<form name ='form2' action = 'index.php' method='post'>
				<table>
					<tr>
						<td>
							<input type='text' name = 'login' value= ' логін'>
						</td>
						<td>
							<input type='text' name = 'password' value= ' пароль'>
						</td>
						<td>
							<input type='submit' name = 'adminbutton' value= ' адмін-панель'>
						</td>
						<td>
							<span style='color: red;'>".self::$error_admin."</span>
						</td>
					</tr>
				</table>
			</form>";
			}
		return $out;
		}
	
	public function logOut()
		{
		session_start();
		$_SESSION["isAuth"]=false;
		 return header("Location http://onlineshop.mysite.lol/index.php");
		exit;
		}
		
	public function isAuth()
		{
		session_start();
		if($_SESSION["isAuth"]) return true;
		else return false;
		}
		
	public function makkeLine($result_set)
		{
		echo "<table cellpadding='5' cellspacing= '5'>";
		while (($row = $result_set->fetch_assoc())!=false)
			{
			$idhere=$row["id"];
			echo "<tr><td><input type = 'checkbox' name ='check$idhere'></td>";
			foreach ( $row as &$value)
				{
				echo "<td>".$value."</td>";
				}
			echo "</tr>";
			}
		echo "</table>";
		}
	
	public function makke3Line($result_set,$page)
		{
		$temparray = array();
		while (($row = $result_set->fetch_assoc())!=false)
			{
			$temparray []= $row;
			}
		echo "<table cellpadding='5' cellspacing= '5'>";
		for($i=(3*$page-2);$i<(3*$page+1);$i++)
			{
			echo "<tr>";
			foreach ( $temparray [$i-1] as &$value)
				{
				echo "<td>".$value."</td>";
				}
			echo "</tr>";
			}
		echo "</table>";
		}
		
		
	private function countPages($result_set)
		{
		$page_numbers = ($result_set->num_rows-($result_set->num_rows%3))/3+1;
		return $page_numbers;
		}
		
	public function pages($result_set)
		{
		$page_numbers=self::countPages($result_set);
		echo "<br/>";
		echo "<br/><br/>";
		for( $i=1;$i<($page_numbers+1);$i++)
			{
			echo "<a href='?page=$i'>___   $i   ___<a/>";
			}
		}
		
	public function contents()
		{
		echo "<table>
				<tr>
					<td>
						<a href='index.php?page=1'>Products</a>
					</td>
					<td>
						<a href='page2.php?page=1'>Orders</a>
					</td>
				</tr>
			</table>";
					
		}
	}
?>