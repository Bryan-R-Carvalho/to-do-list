<?php
    require '../config.php';
    require '../styles.php';
?>
<form id="add-form" action="salvar.php" method="post">
    <div>
        <label>Tarefa</label>
        <input type="text" name="task"/>
    </div>
    <div>
        <label>Descrição</label>
        <textarea name="description"></textarea>
    </div>
    <div>
        <label>Data</label>
        <input type="date" name="date" />
    </div>
    <div>
        <button type="submit">Adicionar</button>
    </div>
</form>