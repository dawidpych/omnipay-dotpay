<?php

namespace Omnipay\Dotpay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Dotpay\Message\PurchaseRequest;

/**
 * Dotpay Gateway.
 *
 * @link https://ssl.dotpay.pl/s2/login/cloudfs1/magellan_media/common_file/55acab1fdadfce6f45d351ee/dotpay_instrukcja_techniczna_1.23.9.1_pl.pdf
 */
class Gateway extends AbstractGateway
{
    /**
     * Return name of gateway.
     *
     * @return string
     */
    public function getName()
    {
        return 'Dotpay';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'accountId' => '',
            'pid' => '',
            'type' => '0',
            'action' => 'https://ssl.dotpay.pl/test_payment/',
            'lang' => 'pl',
            'apiVersion' => 'dev',
            'channel' => 123
        );
    }

    /**
     * Return account ID in Dotpay service.
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->getParameter('accountId');
    }

    /**
     * Set account ID in Dotpay service.
     * minimal value 1
     * maximal value 999999
     *
     * @param $value
     * @return $this
     */
    public function setAccountId($value)
    {
        return $this->setParameter('accountId', $value);
    }

    /**
     * Get PIN for Dotpay.
     *
     * @return string
     */
    public function getPid()
    {
        return $this->getParameter('pid');
    }

    /**
     * Set PIN for Dotpay.
     *
     * @param $value
     * @return $this
     */
    public function setPid($value)
    {
        return $this->setParameter('pid', $value);
    }

    /**
     * Get `type` parametr for Dotpay service.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->getParameter('type');
    }

    /**
     * This parameter specifies the method to appeal response to the shop service.
     * Value of parameter affects the behavior of the {@link setReturnUrl()} parameter.
     * Available values:
     * 0 - After payment, the Purchaser will be made available return to the site of the Seller,
     * 1 - After payment created an implicit connection to the Buyer. The address in the URL parameter will be sent (POST)
     * the data presented in the chapter. AFTER RECEIVING PAYMENT INFORMATION (NOTICE URLC).
     * 2 - No response, nothing is sent, the lack of a button (default).
     * 3 - shares will be performed for type = 0, and type = 1, ie. Both will be uploads the data presented in the chapter.
     * AFTER RECEIVING INFORMATION
     * PAYMENT (NOTIFICATION URLC) in conjunction closed (by POST) and displays the return to service
     * Seller. If you use a notification mechanism
     * URLC no need to use this value.
     * 4 - You will be redirected to the direct channel provider of payment
     * (Eg. The Bank), as well as the payment and logout
     * in the service provider channel Buyer will be redirected
     * directly to the site of the Seller. This functionality is available
     * Only after sending the full set of parameters required for the
     * the payment channel and the respective side configuration dotpay.
     *
     * @param $value
     * @return $this
     */
    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    /**
     * Get url to Dotpay service.
     *
     * @return mixed
     */
    public function getAction()
    {
        return $this->getParameter('action');
    }

    /**
     * Set url to Dotpay service.
     *
     * @param $value
     * @return $this
     */
    public function setAction($value)
    {
        return $this->setParameter('action', $value);
    }

    /**
     * Set language for payment.
     *
     * @return mixed
     */
    public function getLang()
    {
        return $this->getParameter('lang');
    }

    /**
     * Get language of payment.
     *
     * @param $value
     * @return $this
     */
    public function setLang($value)
    {
        return $this->setParameter('lang', $value);
    }

    /**
     * Set api version.
     *
     * @return mixed
     */
    public function getApiVersion()
    {
        return $this->getParameter('apiVersion');
    }

    /**
     * Get api version.
     * Default value is 'dev'.
     *
     * @param $value
     * @return $this
     */
    public function setApiVersion($value)
    {
        return $this->setParameter('apiVersion', $value);
    }

    /**
     * Get channel payment.
     *
     * @return mixed
     */
    public function getChannel()
    {
        return $this->getParameter('channel');
    }

    /**
     * Set channel payment.
     * More info in {@link https://ssl.dotpay.pl/s2/login/cloudfs1/magellan_media/common_file/55acab1fdadfce6f45d351ee/dotpay_instrukcja_techniczna_1.23.9.1_pl.pdf Dotpay documentation }
     *
     * @param $value
     * @return $this
     */
    public function setChannel($value)
    {
        return $this->setParameter('channel', $value);
    }

    /**
     * @inheritdoc
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TwoCheckout\Message\Request', $parameters);
    }

    /**
     * @inheritdoc
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TwoCheckout\Message\CompletePurchaseRequest', $parameters);
    }
}
