<?php

namespace App\Enums;

enum ProfileRoleEnum:string {
    case Admin = 'admin';
    case User = 'user';
    case Temp = 'temp';
}
