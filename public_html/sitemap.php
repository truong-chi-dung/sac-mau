<?php

	session_start();
	 
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');
	@define ( '_template' , './templates/');
	include_once _lib."Mobile_Detect.php";
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	@define ( _upload_folder , './upload/');
	
	if(!isset($_SESSION['value']))
	{
		$_SESSION['value']='1';
	}	

	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_share.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";	
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	include_once _lib."counter.php"; 
	include_once _source."template.php";
	
	if($_GET['lang']!=''){
		$_SESSION['lang']=$_GET['lang'];
		header("location:".$_SESSION['links']);
	} else {
		$_SESSION['links']=getCurrentPageURL();
	}
	$d = new database($config['database']);
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

	

	

$header_xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">";
$footer_xml = "</urlset>";
$file_topic = $header_xml;
$file_topic.=( "<url><loc>https://".$config_url."/gioi-thieu.html</loc><lastmod>".date("c",time())."</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
$file_topic.=( "<url><loc>https://".$config_url."/san-pham.html</loc><lastmod>".date("c",time())."</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
$file_topic.=( "<url><loc>https://".$config_url."/dich-vu.html</loc><lastmod>".date("c",time())."</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
$file_topic.=( "<url><loc>https://".$config_url."/du-an.html</loc><lastmod>".date("c",time())."</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
$file_topic.=( "<url><loc>https://".$config_url."/tin-tuc.html</loc><lastmod>".date("c",time())."</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
$file_topic.=( "<url><loc>https://".$config_url."/lien-he.html</loc><lastmod>".date("c",time())."</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");

$d->reset();
$sql="select DISTINCT type from #_product";
$d->query($sql);
$type_product=$d->result_array(); 
for ($i=0; $i <count($type_product) ; $i++) { 
	$d->reset();
	$sql = "select * from #_product where type='".$type_product[$i]['type']."' order by stt,id desc ";
	$d->query($sql);
	$product_in = $d->result_array();
	if(count($product_in) > 0){
		foreach ($product_in as $key => $value) {
			switch ($value['type']) {
				case 'product':
					$link ='san-pham';
					break;
				default:
				$link = '';
					break;
			}
			if($link !=''){
				$file_topic.=( "<url><loc>https://".$config_url."/".$link."/".$value['tenkhongdau'].".htm</loc><lastmod>".date('c',$value['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
			}
			
			
			
		}
	}
	
}
$d->reset();
$sql="select DISTINCT type from #_product_list";
$d->query($sql);
$type_product_list=$d->result_array(); 
for ($i=0; $i <count($type_product_list) ; $i++) { 
	$d->reset();
	$sql = "select * from #_product_list where type='".$type_product_list[$i]['type']."' order by stt,id desc ";
	$d->query($sql);
	$product_in_list = $d->result_array();
	if(count($product_in_list) > 0){
		foreach ($product_in_list as $key => $value) {
			$d->reset();
			$sql = "select * from #_product_cat where id_list='".$value['id']."' order by stt,id desc ";
			$d->query($sql);
			$product_in_cat = $d->result_array();
			switch ($value['type']) {
				case 'product':
					$link ='san-pham';
					break;
				default:
				$link = '';
					break;
			}
			if($link !=''){
				$file_topic.=( "<url><loc>https://".$config_url."/".$link."/".$value['tenkhongdau'].".html</loc><lastmod>".date('c',$value['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
				foreach ($product_in_cat as $key_cat => $value_cat) {
					$file_topic.=( "<url><loc>https://".$config_url."/".$link."/".$value['tenkhongdau']."/".$value_cat['tenkhongdau'].".htm</loc><lastmod>".date('c',$value['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
				}
			}
		}
	}
}


$d->reset();
$sql="select DISTINCT type from #_baiviet";
$d->query($sql);
$type_baiviet=$d->result_array(); 
for ($i=0; $i <count($type_baiviet) ; $i++) { 
	$d->reset();
	$sql = "select * from #_baiviet where type='".$type_baiviet[$i]['type']."' order by stt,id desc ";
	$d->query($sql);
	$baiviet_in = $d->result_array();
	if(count($baiviet_in) > 0){
		foreach ($baiviet_in as $key => $value) {
			
			switch ($value['type']) {
				case 'tintuc':
					$link ='tin-tuc';
					break;
				case 'dichvu':
					$link ='dich-vu';
					break;
				case 'duan':
					$link ='du-an';
					break;
				case 'chinhsach':
					$link ='chinh-sach';
					break;			
				$link = '';
					break;
			}
			if($link !=''){
				$file_topic.=( "<url><loc>https://".$config_url."/".$link."/".$value['tenkhongdau'].".htm</loc><lastmod>".date('c',$value['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
			}
			
			
			
		}
	}
}
header("Cache-Control: no-cache");
header("Cache-Control: private");
header("Pragma: no-cache");
header('Content-type: text/xml');
echo $file_topic.$footer_xml;
exit();