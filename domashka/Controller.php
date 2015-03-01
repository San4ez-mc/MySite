<?php
	require_once "model.php";
	require_once "view.html"; 

	if(isset($_POST["ok"]))
		{
		$results = transformResultsToArray();
		for($i=0;$i<5;$i++)
			{
			if(isset($_POST["radio$i"]))
				{ 
				$results[$i]["count"]=$results[$i]["count"]+1;
				}
			}
		for($i=0;$i<count($results);$i++)
			{
			$string =$string.$results[$i]["variant"]." ".$results[$i]["count"]."\n";
			$file = fopen("results.txt", "w+t");
			fwrite($file, $string);
			fclose($file);
			}
			
		showResults(getResults());
		}
				


	
	
	function ShowResults($result)
		{
		echo  " <table>";
		for ($i=0; $i<count($result);$i++)
			{
			$c=$result[$i]['count'];
			echo "<tr>";
			echo "<td><b>".$result[$i]["variant"]."</b></td>";
			echo "<td>".$result[$i]["count"]."</td>";
			echo "<td>";
			for ($j=0;$j<($result[$i]["count"]);$j++)
				{
				echo "_";
				}
			echo "</td>";
			echo "</tr>";
			}
		echo  " </table>";
		}
		?>



