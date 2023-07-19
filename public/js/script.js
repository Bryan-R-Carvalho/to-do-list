$(document).ready(function() {
    // Manipula o envio do formulário
    $('#task-form').submit(function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário
        var taskInput = $('#task-input').val();

        // Envia uma solicitação AJAX para adicionar a tarefa ao banco de dados
        $.ajax({
            url: 'add_task.php',
            method: 'POST',
            data: { task: taskInput },
            success: function(response) {
                // Limpa o campo de entrada
                $('#task-input').val('');

                // Recarrega a lista de tarefas
                loadTasks();
            }
        });
    });

    // Carrega as tarefas do banco de dados
    function loadTasks() {
        $.ajax({
            url: 'get_tasks.php',
            method: 'GET',
            success: function(response) {
                // Atualiza a lista de tarefas com os dados recebidos
                $('#task-list').html(response);
            }
        });
    }

    // Chama a função loadTasks para carregar as tarefas iniciais
    loadTasks();
    
    $('#modal-add').click(function (e) {
        e.preventDefault();
        if ($('#add-modal').is(':visible')) {
            $('#add-modal').fadeOut();
        }
        $('#add-modal').show();
        
    });
});
