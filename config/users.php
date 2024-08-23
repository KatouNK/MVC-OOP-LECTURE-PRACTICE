<?php

return [
    [
        'username' => 'admin',
        'password' => password_hash('admin_password', PASSWORD_BCRYPT),
        'role' => 'admin',
        'attendance' => null,
    ],
    [
        'username' => 'user',
        'password' => password_hash('user_password', PASSWORD_BCRYPT),
        'role' => 'user',
        'attendance' => null,
    ],
];
