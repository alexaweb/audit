<?php

    // First we execute our common code to connection to the database and start the session
    $path = $_SERVER['DOCUMENT_ROOT'];
	//$dbfile = $dbfile;
    //require $path.'/includes/common.php';

    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user']))
    {
        // If they are not, we redirect them to the login page.
        header("Location: /audit/home/login.php");

        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
        die("Redirecting to login.php");
    }
	$usuario_consulta=0;
	if($_SESSION['user']['profile']==1)
	{
		$usuario_consulta=1;
		//echo("No tiene permiso suficiente");
		//die();
	}

	if($_SESSION['user']['active']==0)
	{
		echo("Usuario inactivo");
		die();
	}


    // Everything below this point in the file is secured by the login system

    // We can display the user's username to them by reading it from the session array.  Remember that because
    // a username is user submitted content we must use htmlentities on it before displaying it to the user.

	try
        {
		$user_id = $_SESSION['user']['id'];
            $sql = "call cmi.check_permisos($user_id,$current);";
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $data = $stmt->fetch();
			$stmt->closeCursor();
			$tiene_permiso = $data['tiene_permiso'];
       	}
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage());
        }

//$tiene_permiso = 1;
//echo $tiene_permiso;
	if($tiene_permiso==0)
	{
		echo("No tiene permiso");
		die();
	}


// Para el caso de páginas de cartolas, se identifica la empresa
          switch ($current) {
              case 106:
                  $empresa = "Carsi";
                  break;
              case 107:
                  $empresa = "Conacsa";
                  break;
              case 101:
                  $empresa = "Global Edge";
                  break;
              case 102:
                  $empresa = "ILED";
                  break;
              case 104:
                  $empresa = "Indepro IP";
                  break;
              case 103:
                  $empresa = "Innovaplast";
                  break;
              case 105:
                  $empresa = "Interpetrol";
                  break;
              case 108:
                  $empresa = "Prosersa";
                  break;
              case 903:
                  $empresa = "Agustinas 785";
                  break;
              case 9010:
                  $empresa = "Alacalufes 1026";
                  break;
              case 909:
                  $empresa = "Alacalufes 1038";
              case 901:
                  $empresa = "Isidora G. 1001";
                  break;
              case 902:
                  $empresa = "Isidora G. 1002";
                  break;
              case 906:
                  $empresa = "SS 901";
                  break;
              case 907:
                  $empresa = "SS 902 A";
                  break;
              case 908:
                  $empresa = "SS 902 B";
                  break;
              case 905:
                  $empresa = "Tiahuanaco 1027";
                  break;
              case 904:
                  $empresa = "Tiahuanaco 1039";
                  break;
          }
          $page_name = $page_name ." ".$empresa;


	//echo "tantan:a".$usuario_consulta.$_SESSION['user']['profile'];

?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />-->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Gestión Cicarelli</title>
    <link rel="icon"
      type="image/png"
      href="/audit/css/favicon.ico" />
      <link rel="stylesheet" type="text/css" href="/audit/css/common_css.css?rnd=1900" />
</head>
<body>
<nav id="nav">




	         <li><a href="/audit/csb/display_items_pendientes.php"> Abastecimiento CSB</a>
              <ul>
                <li> <a href="#">&bull; pending...</a></li>
                <li> <a href="#">&bull; pending...</a></li>
              </ul>
           </li>
           <li><a href="/audit/arriendos/display_morosos.php">Arriendos</a>
           <ul>
             <li><a class="menuitem <?php if($current == '903') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=3">Agustinas 785</a></li>
             <li><a class="menuitem <?php if($current == '9010') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=10">Alacalufes 1026</a></li>
             <li><a class="menuitem <?php if($current == '909') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=9">Alacalufes 1038</a></li>
             <li><a class="menuitem <?php if($current == '901') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=1">Isidora G. 1001</a></li>
             <li><a class="menuitem <?php if($current == '902') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=2">Isidora G. 1002</a></li>
             <li><a class="menuitem <?php if($current == '906') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=6">SS 901</a></li>
             <li><a class="menuitem <?php if($current == '907') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=7">SS 902 A</a></li>
             <li><a class="menuitem <?php if($current == '908') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=8">SS 902 B</a></il>
             <li><a class="menuitem <?php if($current == '905') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=5">Tiahuanaco 1027</a></li>
             <li><a class="menuitem <?php if($current == '904') {echo 'current';} ?>" href="/audit/arriendos/display_propiedad.php?pr_id=4">Tiahuanaco 1039</a></li>
           </ul>
           </li>
           <li><a href="/audit/cmi/display_saldos.php">Cuentas Corrientes</a>
           <ul>
             <li><a class="menuitem <?php if($current == '106') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=6&fecha_orden=1">Carsi</a></li>
             <li><a class="menuitem <?php if($current == '107') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=7&fecha_orden=1">Conacsa</a></li>
             <li><a class="menuitem <?php if($current == '101') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=1&fecha_orden=1">Global Edge</a></li>
             <li><a class="menuitem <?php if($current == '102') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=2&fecha_orden=1">ILED</a></li>
             <li><a class="menuitem <?php if($current == '104') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=4&fecha_orden=1">Indepro IP</a></li>
             <li><a class="menuitem <?php if($current == '103') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=3&fecha_orden=1">Innovaplast</a></il>
             <li><a class="menuitem <?php if($current == '105') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=5&fecha_orden=1">Interpetrol</a></li>
             <li><a class="menuitem <?php if($current == '108') {echo 'current';} ?>" href="/audit/cmi/display_cartola_transacciones.php?tr_cc_id=8&fecha_orden=1">Prosersa</a></li>
           </ul>
           </li>
            <li><a href="/audit/home/home.php">Home</a></li>
            <div id="headerfont">&nbsp;&nbsp;ip</div>
</nav>
<header id="main">
  <button class="openbtn" onclick="openNav()">☰ <?php echo $page_category." > ".$page_name;?></button>
</header>




<div id="content-body-wrapper" >
	<div id="content-body">
	    <aside id="sidebarnavigation">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			<?php require_once($path_include.'/'.$menufile);?>
    </aside>
	    <section id="maincontent" >
<?php
?>


<script>
function openNav() {
  document.getElementById("sidebarnavigation").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("sidebarnavigation").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
