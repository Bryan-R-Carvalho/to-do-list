<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>To-do list</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery-1.8.2.min.js" type="text/javascript" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
        <div>
            <h1>Lista de Tarefas</h1>
        </div>
        <div>
            <a href="includes/add_task.php" rel="modal">
                <button id="modal-add">Adicionar</button>
            </a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tarefa</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Concluída</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'config.php';
                    $sql = "SELECT * FROM tasks ORDER BY date ASC";
                    $result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['task'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td>' . $row['date'] . '</td>';
                            if($row['completed'] == 1){
                                //checked
                                echo '<td><input type="checkbox" name="completed" checked></td>';
                            }else{
                                //unchecked
                                echo '<td><input type="checkbox" name="completed" ></td>';
                            }
                            echo '<td>';
                            echo '<button class="modal-edit" data-id="' . $row['id'] . '">Editar</button>';
                            echo ' ';
                            echo '<button class="modal-delete" data-id="' . $row['id'] . '">Excluir</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<td colspan="4">Não há tarefas</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

            <div id="modal">
                <h3>Adicionar tarefa</h3>
                <form id="add-form" action="add_task.php" method="post">
                    <div>
                        <label>Tarefa</label>
                        <input type="text" name="task" />
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
                        <label>Concluída</label>
                        <input type="checkbox" name="completed" />
                    </div>
                    <div>
                        <button type="submit">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>