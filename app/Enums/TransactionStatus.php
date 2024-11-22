<?php

namespace App\Enums;

enum TransactionStatus: string
{
    use EnumToArray;

    case PENDING = "Pendente";
    case COMPLETED = "Concluída";
    case FAILED = "Falha";
    case CANCELLED = "Cancelada";
}
