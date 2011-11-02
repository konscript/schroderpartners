<?
$homepage = "/";
$currentpage = $_SERVER['REQUEST_URI'];
if($homepage==$currentpage) {
include 'homenav.php' ;
}
else {
echo "";
}
?>
<?
echo 'hi' ;
?>