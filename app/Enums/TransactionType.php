<?php

namespace App\Enums;

enum TransactionType: string
{
    use EnumToArray;

    case PAYMENT = "Pagamento";
    case REFUND = "Reembolso";
    case TRANSFER = "Transferência";
    case PURCHASE = "Compra";
}
