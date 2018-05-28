<h1>Beneficiários</h1>


<button><a href="<?php echo BASE_URL; ?>mdc/cadastrar_beneficiario">Novo Beneficiário</a></button><br><br>

<table border="1" width="100%">
    <tr>
        <th>Nome</th>
        <th>Contribuinte</th>
        <th>Id_mdc</th>
        <th>Ações</th>
    </tr>
	<?php
	foreach ($benificiario as $benificiarios):
	?>
    <tr>
        <td><?php echo $benificiarios['nome']; ?></td>
        <td><?php echo $benificiarios['contribuinte']; ?></td>
        <td><?php echo $benificiarios['id_mdc']; ?></td>
        <td><a href="<?php echo BASE_URL; ?>mdc/editar_beneficiario?id=<?php echo $benificiarios['id']?>">Editar</a></td>
        <?php
            endforeach;
        ?>
    </tr>
</table>

