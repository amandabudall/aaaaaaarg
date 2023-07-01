<?php
include('listar_telefone.php');
?> 



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefônica</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Agenda Telefônica</h1>

    <h2>Inserir Contato</h2>
    <form method="post" action="inserir.php">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="tel" name="telefone" placeholder="Telefone" required>
        <input type="submit" value="Inserir">
    </form>

    <h2>Lista de Contatos</h2>
   
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include("listar_telefone.php");

            //verifica se a variável tem os valores da tabela.
            if (!empty($lista_usuarios)) {
                //seleciona linha por linha.
                foreach ($lista_usuarios as $linha) { ?>
                    <tr>
                        <td> <?php echo '<img height="40px" width="40px" src="' .$linha['imagem_usuario']. '">'; ?> </td>
                        <td> <?php echo $linha['id']; ?></td>
                        <td> <?php echo $linha['nome']; ?></td>
                        <td> <?php echo $linha['email']; ?></td>
                        <td> <?php echo $linha['telefone']; ?></td>
                        <td> <a href="update.php?codigo=<?php echo $linha['pk_usuario'];?> ">
                                <input type="button" value="Editar">
                            </a>
                        </td>
                        <td> <a href="excluir_usuario.php?codigo=<?php echo $linha['pk_usuario'];?> ">
                                <input type="button" value="Excluir">
                            </a>
                        </td>
                    </tr>
            <?php }
            }
            ?>
        </tbody>
        
        <!-- Aqui você precisa incluir o código PHP para listar os contatos do banco de dados -->
    </table>

    <h2>Alterar Contato</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value=" ">
        <input type="text" name="nome" value=" " required>
        <input type="email" name="email" value=" " required>
        <input type="tel" name="telefone" value=" " required>
        <input type="submit" value="Salvar">
    </form>

    <h2>Excluir Contato</h2>
    <form method="post" action="excluir.php">
        <input type="hidden" name="id" value=" ">
        <input type="submit" value="Excluir">
    </form>
</body>
</html>