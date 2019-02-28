<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
//require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

	elseif ($_GET['module'] == 'alumnos') {
		include "modules/alumnos/view.php";
	}

	elseif ($_GET['module'] == 'form_alumnos') {
		include "modules/alumnos/form.php";
	}

	elseif ($_GET['module'] == 'alumno_transaction') {
		include "modules/alumno_transaction/view.php";
	}

	elseif ($_GET['module'] == 'form_alumno_transaction') {
		include "modules/alumno_transaction/form.php";
	}
	

	elseif ($_GET['module'] == 'stock_inventory') {
		include "modules/stock_inventory/view.php";
	}

	elseif ($_GET['module'] == 'stock_report') {
		include "modules/stock_report/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
		}


	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>