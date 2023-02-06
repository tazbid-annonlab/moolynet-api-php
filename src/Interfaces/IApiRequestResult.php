<?php


namespace Moolynet\Api\Interfaces;


interface IApiRequestResult
{
    /**
     * IApiRequestResult constructor.
     * @param int|null $iRequestStatusCode
     * @param int|null $iResultCode
     * @param string|null $sResultMessage
     * @param array|null $arData
     */
    public function __construct(
        $iRequestStatusCode = null,
        $iResultCode = null,
        $sResultMessage = null,
        $arData = null
    );

    /**
     * @param int|null $iRequestStatusCode
     * @return IApiRequestResult
     */
    public function setRequestStatusCode($iRequestStatusCode = null);

    /**
     * @param int|null $iResultCode
     * @return IApiRequestResult
     */
    public function setResultCode($iResultCode = null);

    /**
     * @param string|null $sResultMessage
     * @return IApiRequestResult
     */
    public function setResultMessage($sResultMessage = null);

    /**
     * @param array|null $arData
     * @return IApiRequestResult
     */
    public function setData($arData = null);

    /**
     * @param string $sParameterName
     * @param string|null $sValue
     * @return IApiRequestResult
     */
    public function setDataParameter($sParameterName, $sValue = null);

    /**
     * @param string $sParameterName
     * @return IApiRequestResult
     */
    public function removeParameter($sParameterName);

    /**
     * @return int | null
     */
    public function getResultCode();

    /**
     * @return int | null
     */
    public function getRequestStatusCode();

    /**
     * @return string | null
     */
    public function getResultMessage();

    /**
     * @return array | null
     */
    public function getData();

    /**
     * @param string $sParameterName
     * @return string | null
     */
    public function getDataParameter($sParameterName);
}