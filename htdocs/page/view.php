<?php

$page_title = 'Perfil';
$id = 0;


if (isset($_GET['u'])) $id = intval($_GET['u']);


if ($id == 0) header('Location: /?p=e404');


$sql = <<<SQL

SELECT 
    *,
    DATE_FORMAT(date, '%d/%m/%Y às %H:%i:%s') AS user_date,
    DATE_FORMAT(birth, '%d/%m/%Y') AS user_bith
FROM users 
WHERE 
user_id = '{$id}' 
    AND user_status != 'deleted'

SQL;


$res = $conn->query($sql);


if ($res->num_rows != 1) header('Location: /?p=e404');


$user = $res->fetch_assoc();


$parts = explode(' ', $user['user_name']);
$user['viewname'] = $parts[0] . ' ' . $parts[count($parts) - 1];


$user['age'] = get_age($user['user_birth']);


if ($user['user_status'] == 'active') {
    $user_status = '<span class="active">ATIVO</span> [<a href="/?p=status&u=' . $id . '&a=0">Desativar</a>]';
} else {
    $user_status = '<span class="inactive">INATIVO</span> [<a href="/?p=status&u=' . $id . '&a=1">Ativar</a>]';
}

switch ($user['user_type']) {
    case 'author':
        $user_type = "Autor";
        break;
    case 'moderator':
        $user_type = "Moderador";
        break;
    case 'admin':
        $user_type = "Administrador";
        break;
    default:
        $user_type = "Usuário";
}

$user_bio = nl2br(htmlspecialchars($user['user_bio']));

$page_content = <<<HTML

<div class="user-box">

    <div class="user-image"><img src="{$user['user_avatar']}" alt="{$user['user_name']}"></div>
    <div class="user-data">
        <h3>{$user['viewname']}</h3>
        <p>{$user_bio}</p>
        <ul>
            <li><strong>Nome:</strong> {$user['user_name']}</li>
            <li><strong>E-mail:</strong> {$user['user_email']} [<a href="mailto:{$user['user_email']}" target="_blank" title="Enviar e-mail para {$user['user_name']}">&rarr;&#9993;</a>]</li>
            <li><strong>Nascimento:</strong> {$user['user_birth']} - {$user['age']} anos</li>
        </ul>
        <hr>
        <ul>
            <li><strong>ID:</strong> {$user['user_id']}</li>
            <li><strong>Data:</strong> {$user['user_date']}</li>
            <li><strong>Tipo de usuário:</strong> {$user_type}</li>
            <li><strong>Status:</strong> {$user_status}</li>
        </ul>
    </div>
    <div class="user-tools">
        <a href="/?p=edit&u={$id}">Editar</a>
        <a href="/?p=delete&u={$id}">Apagar</a>
    </div>

</div>

HTML;

?>