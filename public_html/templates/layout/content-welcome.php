<?php
	$d->reset();
	$d->query("select tenkhongdau,ten_$lang,photo from #_baiviet where type='' order by stt asc");
	$welcome = $d->result_array();
 ?>