<?php

$id = 0;


if (isset($_GET['u'])) $id = intval($_GET['u']);


if ($id == 0) header('Location: /?p=e404');


if (isset($_GET['a'])) $status = intval($_GET['a']);
if ($status != 0) $a = 'active';
else $status = 'inactive';

$sql = "SELECT user_id FROM users WHERE user_id = '{$id}' AND user_status != 'deleted'";

$res = $conn->query($sql);


if ($res->num_rows != 1) header('Location: /?p=e404');


$sql = "UPDATE users SET user_status = '{$status}' WHERE user_id = '{$id}' AND user_status != 'deleted'";

$conn->query($sql);

header ("Location: /?p=view&u={$id}");

?>