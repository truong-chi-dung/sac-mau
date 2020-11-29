<?php  if(!defined('_source')) die("Error");
		$title_detail = _ketquatimkiem;
		$id_list=trim($_GET['danhmuc']);
		$id_dotuoi=trim($_GET['id_dotuoi']);
		$locgia=trim($_GET['locgia']);
	
		$key=trim($_GET['keyword']);
		
		$per_page = $row_setting['sanpham']; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		$where = " #_baiviet where hienthi=1";
		
		
		if(isset($_GET['keyword']) && $_GET['keyword'] !=''){
			$tukhoa = trim(strip_tags($_GET['keyword']));    	
			if (get_magic_quotes_gpc()==false) {
				$tukhoa = mysql_real_escape_string($tukhoa);    			
			}
											
			$where .= " and ten_$lang like '%$tukhoa%'";
		}
		
		if(isset($_GET['id_list']) && $_GET['id_list'] !=''){
		
			$where .= " and id_list=".$id_list;
		}
		if(isset($_GET['id_dotuoi']) && $_GET['id_dotuoi'] !=''){
		
			$where .= " and id_dotuoi=".$id_dotuoi;
		}
		if(isset($_GET['locgia']) && $_GET['locgia'] !=''){
			$d->reset();
		    $result_gia="select giatu,giaden,id from #_gia where hienthi=1 and id='".$locgia."' order by stt,id desc ";    
		    $d->query($result_gia); 
		    $result_gia=$d->fetch_array();

			$where .= "and giaban >= ".$result_gia['giatu']." and giaban <= ".$result_gia['giaden'];
		}
		$where .= " order by stt,ngaytao desc ";
		$sql = "select * from $where $limit";
		
		$d->query($sql);
		$result_product = $d->result_array();	

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
?>