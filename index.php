<!DOCTYPE html>
<?php
session_start();

// Vamos validar o formulário aqui
if (isset($_POST['acao'])) {
    //echo 'Formulário enviado.';

    // Recuperar valor do input
    $tarefa = strip_tags($_POST['tarefa']);

    // Verificar e adicionar a tarefa à sessão
    $_SESSION['tarefas'] = isset($_SESSION['tarefas']) ? $_SESSION['tarefas'] : array();
    $_SESSION['tarefas'][] = $tarefa;

    //echo '<script>alert("Tarefa adicionada");</script>';
}
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de tarefas em PHP | sem banco de dados</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="content">
            <form class="formulario" method="post"> 
            <!--  Atributo 'name' para identificar o campo -->
                <input type="text" name="tarefa" placeholder="Digite sua nova tarefa..."> 
                <!-- 'type="submit"' para enviar o formulário -->
                <input type="submit" name="acao" value="Criar tarefa"> 
            </form>
        

            <main>  

                <h1>Novas tarefas</h1>
                <hr>

                <?php 
                // Verificar se a sessão de tarefas existe antes de tentar exibir
                if (isset($_SESSION['tarefas'])) {
                    foreach ($_SESSION['tarefas'] as $key => $value) {
                        echo '<p>' . $value . '</p>'; // Adicionado ponto e vírgula no final do echo
                    }
                }
                ?>
            </main>
        </div>
    </body>
</html>
