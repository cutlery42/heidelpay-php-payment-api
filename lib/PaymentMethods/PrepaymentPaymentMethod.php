<?php

namespace Heidelpay\PhpPaymentApi\PaymentMethods;

use Heidelpay\PhpPaymentApi\TransactionTypes\AuthorizeTransactionType;
use Heidelpay\PhpPaymentApi\TransactionTypes\ReversalTransactionType;
use Heidelpay\PhpPaymentApi\TransactionTypes\RefundTransactionType;

/**
 * Prepayment Payment Class
 *
 * @license Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link  http://dev.heidelpay.com/heidelpay-php-api/
 *
 * @author  Jens Richter
 *
 * @package  Heidelpay
 * @subpackage PhpPaymentApi
 * @category PhpPaymentApi
 */
class PrepaymentPaymentMethod
{
    use BasicPaymentMethodTrait;
    use AuthorizeTransactionType;
    use ReversalTransactionType;
    use RefundTransactionType;

    /**
     * Payment code for this payment method
     *
     * @var string payment code
     */
    protected $_paymentCode = 'PP';

    /**
     * Payment brand name for this payment method
     *
     * @var string brand name
     */
    protected $_brand;
}
