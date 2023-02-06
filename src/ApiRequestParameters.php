<?php


namespace Moolynet\Api;

use Moolynet\Api\Interfaces\IApiRequestParameters;

class ApiRequestParameters implements IApiRequestParameters
{
    private $sApiURL;
    private $sApiKey;
    private $sMethod;
    private $sFunctionName;
    private $arParameters;


    /**
     * @param string|null $sApiURL
     * @return IApiRequestParameters
     */
    public function setApiURL($sApiURL = null)
    {
        $this->sApiURL = $sApiURL;
        return $this;
    }

    /**
     * @param string|null $sApiKey
     * @return IApiRequestParameters
     */
    public function setApiKey($sApiKey = null)
    {
        $this->sApiKey = $sApiKey;
        return $this;
    }

    /**
     * @param string|null $sMethod
     * @return IApiRequestParameters
     */
    public function setMethod($sMethod = null)
    {
        $this->sMethod = $sMethod;
        return $this;
    }

    /**
     * @param string|null $sFunctionName
     * @return IApiRequestParameters
     */
    public function setFunctionName($sFunctionName = null)
    {
        $this->sFunctionName = $sFunctionName;
        return $this;
    }

    /**
     * @param array|null $arParameters
     * @return IApiRequestParameters
     */
    public function setParameters($arParameters = null)
    {
        $this->arParameters = $arParameters;
        return $this;
    }

    /**
     * @param string $sParameterName
     * @param string|null $sValue
     * @return IApiRequestParameters
     */
    public function setParameter($sParameterName, $sValue = null)
    {
        if (!is_null($sValue)) {
            $this->arParameters[$sParameterName] = $sValue;
        } else {
            if (is_array($this->arParameters)) {
                unset($this->arParameters[$sParameterName]);
            }
        }
        return $this;
    }

    /**
     * @param string $sParameterName
     * @return IApiRequestParameters
     */
    public function removeParameter($sParameterName)
    {
        return $this->setParameter($sParameterName);
    }


    /**
     * @return string | null
     */
    public function getApiURL()
    {
        return $this->sApiURL;
    }

    /**
     * @return string | null
     */
    public function getApiKey()
    {
        return $this->sApiKey;
    }

    /**
     * @return string | null
     */
    public function getMethod()
    {
        return $this->sMethod;
    }

    /**
     * @return string | null
     */
    public function getFunctionName()
    {
        return $this->sFunctionName;
    }

    /**
     * @return array | null
     */
    public function getParameters()
    {
        return $this->arParameters;
    }

    /**
     * @param string $sParameterName
     * @return string|null
     */
    public function getParameter($sParameterName)
    {
        if (is_array($this->arParameters) && isset($this->arParameters[$sParameterName])) {
            return $this->arParameters[$sParameterName];
        } else {
            return null;
        }
    }

}