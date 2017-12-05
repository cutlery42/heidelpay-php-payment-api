<?php

namespace Heidelpay\PhpPaymentApi\PaymentMethods;

/**
 * Giropay Payment Class
 *
 * Giropay is a payment method from giropay GmbH in Germany.
 *
 * @license Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link  http://dev.heidelpay.com/heidelpay-php-api/
 *
 * @author  Ronja Wann
 *
 * @package  Heidelpay
 * @subpackage PhpPaymentApi
 * @category PhpPaymentApi
 */
class GiropayPaymentMethod extends AbstractPaymentMethod
{
    /**
     * Payment code for this payment method
     *
     * @var string payment code
     */
    protected $_paymentCode = 'OT';

    /**
     * Weather this Payment method can authorise transactions or not
     *
     * @var boolean canAuthorise
     */
    protected $_canAuthorise = true;

    /**
     * Weather this Payment method can refund transactions or not
     *
     * @var boolean canRefund
     */
    protected $_canRefund = true;

    /**
     * Payment brand name for this payment method
     *
     * @var string brand name
     */
    protected $_brand = 'GIROPAY';
}
