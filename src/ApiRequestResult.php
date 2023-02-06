<?php


namespace Moolynet\Api;

use Moolynet\Api\Interfaces\IApiRequestResult;

class ApiRequestResult implements IApiRequestResult
{

    private $iRequestStatusCode = null;
    private $iResultCode = null;
    private $sResultMessage = null;
    private $arData = null;

    /**
     * @inheritDoc
     */
    public function __construct(
        $iRequestStatusCode = null,
        $iResultCode = null,
        $sResultMessage = null,
        $arData = null
    )
    {
        $this->iRequestStatusCode = $iRequestStatusCode;
        $this->iResultCode = $iResultCode;
        $this->sResultMessage = $sResultMessage;
        $this->arData = $arData;
    }

    /**
     * @inheritDoc
     */
    public function setRequestStatusCode($iRequestStatusCode = null)
    {
        $this->iRequestStatusCode = $iRequestStatusCode;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setResultCode($iResultCode = null)
    {
        $this->iResultCode = $iResultCode;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setResultMessage($sResultMessage = null)
    {
        $this->sResultMessage = $sResultMessage;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setData($arData = null)
    {
        $this->arData = $arData;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDataParameter($sParameterName, $sValue = null)
    {
        if (!is_null($sValue)) {
            $this->arData[$sParameterName] = $sValue;
        } else {
            if (is_array($this->arData)) {
                unset($this->arData[$sParameterName]);
            }
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeParameter($sParameterName)
    {
        return $this->setDataParameter($sParameterName);
    }

    /**
     * @inheritDoc
     */
    public function getRequestStatusCode()
    {
        return $this->iRequestStatusCode;
    }

    /**
     * @inheritDoc
     */
    public function getResultCode()
    {
        return $this->iResultCode;
    }

    /**
     * @inheritDoc
     */
    public function getResultMessage()
    {
        return $this->sResultMessage;
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return $this->arData;
    }

    /**
     * @inheritDoc
     */
    public function getDataParameter($sParameterName)
    {
        if (is_array($this->arData) && isset($this->arData[$sParameterName])) {
            return $this->arData[$sParameterName];
        } else {
            return null;
        }
    }


}