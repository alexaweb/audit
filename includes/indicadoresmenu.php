<div>
<h4>INFORMES</h4>
<li><a class="menuitem <?php if($current == '41') {echo 'current';} ?>" href="/audit/indicadores/display_indicadores.php?ano=<?=date("Y");?>&mes=<?=date("m");?>">UF, TAB UF 360, etc.</a></li>
<li><a class="menuitem <?php if($current == '42') {echo 'current';} ?>" href="/audit/indicadores/display_indicadores_uf.php?ano=<?=date("Y");?>&mes=<?=date("m");?>">UF</a></li>
<li><a class="menuitem <?php if($current == '43') {echo 'current';} ?>" href="/audit/indicadores/display_indicadores_tabuf360.php?ano=<?=date("Y");?>&mes=<?=date("m");?>">TAB UF 360</a></li>
<h4>ACCIONES</h4>
<li><a class="menuitem <?php if($current == '34') {echo 'current';} ?>" href="/audit/indicadores/update_indicadores.php">Cargar Indicadores</a></li>
<li><a class="menuitem <?php if($current == '35') {echo 'current';} ?>" href="/audit/indicadores/borrar_indicadores.php">Borrar Indicadores</a></li>
</div>
