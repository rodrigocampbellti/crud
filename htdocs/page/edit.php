<?php


$page_title = 'Editar perfil';
$page_content = "<h2>Editar usuário</h2>";
$id = 0;


if (isset($_GET['u'])) $id = intval($_GET['u']);

if ($id == 0) header('Location: /?p=e404');

$sql = <<<SQL

SELECT 
    *,
    DATE_FORMAT(user_date, '%d/%m/%Y às %H:%i:%s') AS date_br,
    DATE_FORMAT(user_birth, '%d/%m/%Y') AS birth_br
FROM users 
WHERE 
user_id = '{$id}' 
    AND user_status != 'deleted'

SQL;

$res = $conn->query($sql);

if ($res->num_rows != 1) header('Location: /?p=e404');

$user = $res->fetch_assoc();

$user_form = array(
    'action' => $_SERVER['REQUEST_URI'],
    'name' => $user['user_name'],
    'email' => $user['user_email'],
    'avatar' => $user['user_avatar'],
    'birth' => $user['user_birth'],
    'bio' => $user['user_bio'],
    'type' => $user['user_type'],
    'password' => false
);

require('page/_form.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") :

    $sql = <<<SQL

UPDATE users SET
user_name = '{$_POST['user_name']}',
user_email = '{$_POST['user_email']}',
user_avatar = '{$_POST['user_avatar']}',
user_birth = '{$_POST['user_birth']}',
user_bio = '{$_POST['user_bio']}',
user_type = '{$_POST['user_type']}'
WHERE user_id = '{$id}'
    AND user_status != 'deleted';

SQL;

    $conn->query($sql);

    $page_content .= <<<HTML

<p>Dados do usuário salvos com sucesso!</p>
<p class="center">
    <a href="/?p=view&u={$id}">Ver perfil</a> &nbsp;|&nbsp;
    <a href="/">Listar usuários</a>
</p>

HTML;

else :

    $page_content .= <<<HTML

<p>Preencha todos os campos com atenção.</p>
{$form}


HTML;

endif;

?>