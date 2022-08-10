<?php


$page_title = 'Listagem';
$page_content = "<h2>Usuários do Aplicativo</h2>";

$sql = "SELECT user_id, user_name, user_email FROM users WHERE user_status != 'deleted' ORDER BY user_date DESC;";
$res = $conn->query($sql);


$total = $res->num_rows;


if ($total > 0) {


    $page_content .= <<<HTML

<div class="list-overflow">
    <table class="user-list">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Opções</th>
        </tr>

HTML;


    while ($user = $res->fetch_assoc()) :

        $page_content .= <<<HTML

    <tr>
        <td>{$user['user_id']}</td>
        <td>{$user['user_name']}</td>
        <td>{$user['user_email']}</td>
        <td>
            <a title="Ver perfil de {$user['user_name']}." href="/?p=view&u={$user['user_id']}"><i class="fa-solid fa-address-card fa-fw"></i></a>
            <a class="user-edt" title="Editar perfil de {$user['user_name']}." href="/?p=edit&u={$user['user_id']}"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
            <a title="Apagar perfil de {$user['user_name']}." href="/?p=delete&u={$user['user_id']}"><i class="fa-solid fa-trash-can fa-fw"></i></a>
        </td>
    </tr>

HTML;

    endwhile;

    $page_content .= <<<HTML
    
    </table>
    <div class="options">
        <strong>Opções: </strong>
        <i class="fa-solid fa-address-card fa-fw"></i> Ver perfil,
        <i class="fa-solid fa-pen-to-square fa-fw"></i>Editar perfil
        <i class="fa-solid fa-trash-can fa-fw"></i>Apagar usuário.
    </div>

</div>
<p>Total de ${total} usuários cadastrados.</p>

HTML;
} else {

    $page_content .= "<p>Nenhum usuário foi encontrado.</p>";
}

?>