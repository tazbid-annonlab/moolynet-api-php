<?php


namespace Moolynet\Api\Interfaces;


interface IApiRequestParameters
{

    /**
     * @param string|null $sApiURL
     * @return IApiRequestParameters
     */
    public function setApiURL($sApiURL = null);

    /**
     * @param string|null $sApiKey
     * @return IApiRequestParameters
     */
    public function setApiKey($sApiKey = null);

    /**
     * @param string|null $sMethod
     * @return IApiRequestParameters
     */
    public function setMethod($sMethod = null);

    /**
     * @param string|null $sFunctionName
     * @return IApiRequestParameters
     */
    public function setFunctionName($sFunctionName = null);

    /**
     * @param array|null $arParameters
     * @return IApiRequestParameters
     */
    public function setParameters($arParameters = null);

    /**
     * @param string $sParameterName
     * @param string|null $sValue
     * @return IApiRequestParameters
     */
    public function setParameter($sParameterName, $sValue = null);

    /**
     * @param string $sParameterName
     * @return IApiRequestParameters
     */
    public function removeParameter($sParameterName);

    /**
     * @return string|null
     */
    public function getApiURL();

    /**
     * @return string|null
     */
    public function getApiKey();

    /**
     * @return string|null
     */
    public function getMethod();

    /**
     * @return string|null
     */
    public function getFunctionName();

    /**
     * @return array|null
     */
    public function getParameters();

    /**
     * @param string $sParameterName
     * @return string|null
     */
    public function getParameter($sParameterName);
}