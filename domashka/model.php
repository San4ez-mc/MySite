<?php
	function transformResultsToArray()
		{
			if(!is_readable("results.txt"))
				{
				echo "string";
				//$string = "";
				for($i=0;$i<5;$i++)
					{
					$string =$string."variant$i 0\n";
					}
					echo $string;
				$file = fopen("results.txt", "w+t");
						fwrite($file, $string);
						fclose($file);
				}
		return getResults();
		}

	function getResults()
		{
		$string = file_get_contents("results.txt");
			$array=explode("\n", $string);
			//check
			echo "<br/>";
		//	print_r($array);
			//
			for($i=0;$i< count($array);$i++)
				{
				$data = explode(" ",$array[$i]);
				$result[$i]["variant"]= $data[0];
				$result[$i]["count"]= $data[1];
				}
			return $result;
		}

?>