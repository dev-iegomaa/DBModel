<?php

require_once 'User.php';

$user = new User;

$user->insert('omar', 'omar@admin.com', '123');
echo '<pre>';
print_r($user->select());
echo '</pre>';

$user->update(1, 'omar samy', 'omarsamy@yahoo.com', '123');
echo '<pre>';
print_r($user->select());
echo '</pre>';

$user->delete(1);
echo '<pre>';
print_r($user->select());
echo '</pre>';
