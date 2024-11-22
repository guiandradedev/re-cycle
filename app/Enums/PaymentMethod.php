<?php

namespace App\Enums;

enum PaymentMethod: string
{
    use EnumToArray;
    
    case CREDIT_CARD = "Cartão de Crédito";
    case DEBIT_CARD = "Cartão de Débito";
    case BANK_TRANSFER = "Transferência Bancária";
    case BOLETO = "Boleto";
    case PIX = "Pix";
    case CASH = "Dinheiro";
    case PAYPAL = "PayPal";
    case INTERN = "Pagamento interno";
}
