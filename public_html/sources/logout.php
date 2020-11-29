<?php
		$_SESSION[$login_name] = false;
		unset($_SESSION['login']);
		transfer("Đăng xuất thành công", "http://".$config_url."/index.html");
		break; // end change-profile
?>