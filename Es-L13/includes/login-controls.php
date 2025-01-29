<?php

declare(strict_types= 1);

function is_input_empty(string $username, string $password): bool
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}
function is_username_wrong(bool|array $result): bool
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $password, string $hashedPwd): bool
{
    if (!password_verify($password, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}
