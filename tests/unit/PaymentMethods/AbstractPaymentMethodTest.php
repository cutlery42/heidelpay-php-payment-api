<?php

namespace Heidelpay\Tests\PhpApi\Unit\PaymentMethods;

use Heidelpay\PhpApi\Adapter\CurlAdapter;
use Heidelpay\PhpApi\Request;
use Heidelpay\PhpApi\PaymentMethods\SofortPaymentMethod;
use Heidelpay\PhpApi\Exceptions\UndefinedTransactionModeException;
use Heidelpay\Tests\PhpApi\Helper\BasePaymentMethodTest;

/**
 * This test class contains tests focusing on the base trait.
 *
 * @license Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link  http://dev.heidelpay.com/heidelpay-php-api/
 *
 * @author  Jens Richter
 *
 * @package  Heidelpay
 * @subpackage PhpApi
 * @category UnitTest
 */
class AbstractPaymentMethodTest extends BasePaymentMethodTest
{
    //<editor-fold desc="Init">

    /**
     * PaymentObject
     *
     * @var SofortPaymentMethod
     */
    protected $paymentObject;

    /**
     * Set up function will create a sofort object for each test case
     *
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    // @codingStandardsIgnoreStart
    public function _before()
    {
        // @codingStandardsIgnoreEnd
        $Abstract = new SofortPaymentMethod();

        $this->paymentObject = $Abstract;
    }

    //</editor-fold>

    //<editor-fold desc="Tests">

    /**
     * Request setter/getter test
     *
     * @test
     */
    public function request()
    {
        $Request = new Request();
        $this->paymentObject->setRequest($Request);

        $this->assertEquals($Request, $this->paymentObject->getRequest());
    }

    /**
     * Response setter/getter test
     *
     * @test
     */
    public function response()
    {
        $this->assertEquals(null, $this->paymentObject->getResponse());
    }

    /**
     * Adapter setter/getter test
     *
     * @test
     */
    public function adapter()
    {
        $Adapter = new CurlAdapter();
        $this->paymentObject->setAdapter($Adapter);

        $this->assertSame($Adapter, $this->paymentObject->getAdapter());
    }

    /**
     * getPaymentUrl test
     *
     * @test
     */
    public function getPaymentUrl()
    {
        $this->paymentObject->getRequest()->getTransaction()->set('mode', 'LIVE');
        $this->assertSame('https://heidelpay.hpcgw.net/ngw/post', $this->paymentObject->getPaymentUrl());
    }

    /**
     * getPaymentUrl exception test
     *
     * @test
     */
    public function getPaymentUrlException()
    {
        $this->paymentObject->getRequest()->getTransaction()->set('mode', null);
        $this->expectException(UndefinedTransactionModeException::class);
        $this->paymentObject->getPaymentUrl();
    }

    /**
     * Test if jsonSerialize returns elements.
     *
     * @test
     */
    public function jsonSerializeTest()
    {
        $objectAsJson = $this->paymentObject->jsonSerialize();
        $this->assertNotEmpty($objectAsJson);
        $this->assertArrayHasKey('_paymentCode', $objectAsJson);
        $this->assertArrayHasKey('_brand', $objectAsJson);
        $this->assertArrayHasKey('_liveUrl', $objectAsJson);
        $this->assertArrayHasKey('_sandboxUrl', $objectAsJson);
        $this->assertArrayHasKey('_adapter', $objectAsJson);
        $this->assertArrayHasKey('_request', $objectAsJson);
        $this->assertArrayHasKey('_requestArray', $objectAsJson);
        $this->assertArrayHasKey('_response', $objectAsJson);
        $this->assertArrayHasKey('_responseArray', $objectAsJson);
        $this->assertArrayHasKey('_dryRun', $objectAsJson);
    }

    /**
     * Test to verify that toJson returns valid JSON.
     *
     * @test
     */
    public function toJsonTest()
    {
        $this->assertJson($this->paymentObject->toJson());
    }

    //</editor-fold>
}
