<?php

namespace Omnipay\Dotpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Dotpay Purchase Response.
 */
class Response extends AbstractResponse implements RedirectResponseInterface
{

    /**
     * @inheritdoc
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * @inheritdoc
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * @inheritdoc
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->request->getAction();
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * @inheritdoc
     * @return mixed
     */
    public function getRedirectData()
    {
        return $this->getData();
    }
}
