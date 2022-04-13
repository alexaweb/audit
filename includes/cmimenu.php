<ul>
<h4>INFORMES</h4>
<li><a class="menuitem <?php if($current == '21') {echo 'current';} ?>" href="/audit/cmi/display_saldos.php?fecha=<?php echo date("Y-m-d", strtotime( '-1 days' ) );;?>">Saldos</a></li>
<li><a class="menuitem <?php if($current == '22') {echo 'current';} ?>" href="/audit/cmi/display_interes_devengado.php">Interés</a></li>
<li><a class="menuitem <?php if($current == '23') {echo 'current';} ?>" href="/audit/cmi/display_contabilidad.php">Contabilidad</a></li>
<h4>ACCIONES</h4>
<li><a class="menuitem <?php if($current == '31') {echo 'current';} ?>" href="/audit/cmi/insert_transaccion.php">Giro de CMI</a></li>
<li><a class="menuitem <?php if($current == '32') {echo 'current';} ?>"  href="/audit/cmi/insert_pago.php">Pago a CMI</a></li>
<li><a class="menuitem <?php if($current == '33') {echo 'current';} ?>" href="/audit/cmi/reset_saldos.php">RESET</a></li>
</ul>
