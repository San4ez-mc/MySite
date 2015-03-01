  <?php
  
	$reg ="/th/";
	$str="something strinf 123 string";
	echo preg_match($reg, $str),"<br/ >";
	
	$reg="/s.m/";
	echo preg_match($reg, $str),"<br/ >";
  $reg="/s.t/";
	echo preg_match($reg, $str),"<br/ >";
	$reg="/s?g/";
	echo preg_match($reg, $str),"<br/ >";
	/*
	$reg= "/\sab\Scd\w\W\d ab \D/";
	// \s-probtlni symvolu
	//\S-neprobelni sumvolu 
	//\w - bykva 4u cufra
	//W - ni bykva. ni cufra
//\d - cufra
//\D - ne cufra
echo preg_match($reg, "\nab9cd9/0 ab X")."<br/>";	
  echo preg_match($reg, "some\nab9cd9/0 ab Xsome")."<br/>";	
echo preg_match($reg, " ab9cd9/0 ab X")."<br/>";

echo "----------------------------<br/>";

//Альтернативи

$reg = "/a[0123]/";
echo preg_match($reg, "a0b")."<br/>";	
echo preg_match($reg, "a1b")."<br/>";	
echo preg_match($reg, "afb")."<br/>";	
echo preg_match($reg, "a3b")."<br/>";	

echo "----------------------------<br/>";
$reg = "/a[a-z]b/";
echo preg_match($reg, "aab")."<br/>";
echo preg_match($reg, "azb")."<br/>";	
//zaperechennia

echo "----------------------------<br/>";
$reg = "/a[^a-z]b/";
echo preg_match($reg, "aab")."<br/>";
echo preg_match($reg, "azb")."<br/>";	
echo "----------------------------<br/>";
//specila symbols
$reg = "/a\/b\\\c\./";
echo preg_match($reg, "a/b\\c.")."<br/>";	
*/
/*
//квантификатори повторень
$reg= "/ab.*c/";
echo preg_match($reg, " absomesomec")."</br>";
echo preg_match($reg, " abc")."</br>";
echo preg_match($reg, " absomesome")."</br>";

echo "----------------------------<br/>";

$reg= "/ab.+c/";
echo preg_match($reg, " absomesomec")."</br>";
echo preg_match($reg, " abc")."</br>";
echo preg_match($reg, " absomesome")."</br>";

echo "----------------------------<br/>";

$reg= "/ab.?c/";//0 abo 1 povtorennia
echo preg_match($reg, " absomesomec")."</br>";
echo preg_match($reg, " abc")."</br>";
echo preg_match($reg, " absomesome")."</br>";

echo "----------------------------<br/>";

$reg = "/ab\d{1,2}/";
echo preg_match($reg, " ab11")."</br>";
echo preg_match($reg, " ab1234")."</br>";
echo preg_match($reg, " absomesome")."</br>";

echo "----------------------------<br/>";

$reg = "/ab\d{2}/";
echo preg_match($reg, " ab1")."</br>";
echo preg_match($reg, " ab1234")."</br>";
echo preg_match($reg, " absomesome")."</br>";

echo "----------------------------<br/>";

$reg = "/ab\d{2,}/";
echo preg_match($reg, " ab1")."</br>";
echo preg_match($reg, " ab1234")."</br>";
echo preg_match($reg, " absomesome")."</br>";
 
echo "----------------------------<br/>";

$reg = "/^ab\d{2}$/";//pochatok -kinec
echo preg_match($reg, "ab12")."</br>";
echo preg_match($reg, "xab12")."</br>";
echo preg_match($reg, "ab12і")."</br>";

echo "----------------------------<br/>";
//групуючі дужжки
$reg = "/(\d{2})-(\d{2})-( \d{4})/";
echo preg_match($reg, "01-02-1955")."<br/>";
preg_match_all($reg, "01-02-1955", $matches);
print_r($matches);
echo "<br/>";
*/ 
//$reg= "/.*?(\d+)\D.*/";
//echo "Вік: ". preg_replace($reg, '$1', "мені вже скоро буде 99 років"); 
/*
// Модифікатори
$reg = "/ab.*c/";
echo preg_match($reg, "abcc")."<br/>";
echo preg_match($reg, "ABcc")."<br/>"; 
$reg = "/ab.*c/i";//не враховується регістр
echo preg_match($reg, "abcc")."<br/>";
echo preg_match($reg, "ABcc")."<br/>";

echo "----------------------------<br/>";

$reg = "/a b c/";
echo preg_match($reg, "a b c")."<br/>";
echo preg_match($reg, "abc")."<br/>";

$reg = "/a b c/x";
echo preg_match($reg, "abc")."<br/>";

echo "----------------------------<br/>";

$reg = "/^\d/s";
echo preg_match($reg, "string\n9")."<br/>";

$reg = "/^\d/m";
echo preg_match($reg, "string\n9")."<br/>";
echo "-------------------задача---------<br/>";

$text= "Всім привіт! mysite@site.ru, пишіть мені хтось щось сюди alexander220393@mail.ru";
function replaceEmail($text)
{
$reg= "/[a-z0-9][a-z0-9\._-]*?[a-z0-9]*?@([a-z0-9]+([a-z0-9-]*?[a-z0-9]+)+\.)+[a-z]+/i";
return preg_replace($reg,"<b> тут був емайл</b>", $text);
}
echo replaceEmail($text);
*/























































































// 

	

  ?>