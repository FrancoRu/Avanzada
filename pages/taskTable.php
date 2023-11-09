<?php
require_once 'tagService.php';
require_once __DIR__ . '/../scripts/auth.php';

getTasks();
function getTasks()
{
    $conn = new Auth();

    $result = $conn->getAllTasks([$_SESSION['user_id']]);
    // Create an instance of TagService
    $tag = TagService::getInstance();
    // Check if $result is a valid result object or false
    if ($result !== false) {
        if ($result->num_rows > 0) {
            // Process the result
            echo '<div id="container_table" class="--bs-body-bg">';
            echo $tag->getTable($result);
            echo '</div>';
        } else {
            // Handle the case when no tasks are found
            echo "No tasks found for this user.";
        }
    } else {
        // Handle the case when an error occurred
        echo "An error occurred while fetching tasks.";
    }
}
?>
<script>
    $(document).ready(function() {

        // Agregar un listener de cambio al formulario
        $('#tbody').on('change', function() {
            // Eliminar los event listeners existentes
            $('.modify_btn, .delete_btn').off('click');
            // Cargar los event listeners de nuevo
            cargarEventListeners();
        });

        cargarEventListeners();

        function cargarEventListeners() {
            const buttons_mod = document.querySelectorAll('.modify_btn');

            buttons_mod.forEach(button => {
                button.addEventListener('click', (event) => {
                    button.setAttribute('disabled', true);
                    const row = $(button).closest('tr');
                    event.preventDefault();
                    const task_id = button.getAttribute('data-element-id');
                    const user_id = '<?php echo $_SESSION['user_id']; ?>';

                    $.ajax({
                        url: 'modify.php',
                        method: 'POST',
                        data: {
                            task_id: task_id,
                            user_id: user_id
                        },
                    })
                    const thirdTd = row.find('td:eq(2)');
                    thirdTd.html('Completada');
                    $.notify("Se modifico correctamente", "success")
                });
            });
            const buttons_del = document.querySelectorAll('.delete_btn');
            buttons_del.forEach(button => {
                button.addEventListener('click', (event) => {
                    const row = $(button).closest('tr');
                    event.preventDefault();
                    const task_id = button.getAttribute('data-element-id');
                    const user_id = '<?php echo $_SESSION['user_id']; ?>';
                    $.ajax({
                        url: 'delete.php',
                        method: 'POST',
                        data: {
                            task_id: task_id,
                            user_id: user_id
                        },
                    }).done(function() {
                        $.notify("Se elimino correctamente", "success")
                        row.remove();
                    })
                });
            });
        }
    });

    // $(document).ready(function() {});

    $(document).ready(function() {
        const form = $('#form-Tarea');
        const table = $('#table').DataTable();
        form.on('submit', function(event) {
            event.preventDefault();

            const taskValue = $('[name="task"]').val();

            $.ajax({
                url: 'add.php',
                method: 'POST',
                data: {
                    task: taskValue
                },
            }).done(function(data) {
                $.ajax({
                    url: 'getLastTask.php',
                    method: 'POST',
                }).done(function(datosActualizados) {
                    var nuevaFila = $(datosActualizados); // Convierte el HTML en un elemento jQuery
                    table.row.add(nuevaFila).draw();
                });
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error al agregar tarea:', errorThrown);
            });
        });
    });
</script>