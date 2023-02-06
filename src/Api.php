<?php


namespace Moolynet\Api;

class Api implements Interfaces\IApi
{
    /**
     * @var Interfaces\IApiTransport $transport
     */
    protected $transport;

    /**
     * @var $lastApiResult ApiRequestResult|null
     */
    private $lastApiResult;

    /**
     * CurrentUserFCTApi constructor.
     * @param Interfaces\IApiTransport|null $transport
     */
    public function __construct($transport = null)
    {
        if ($transport == null) {
            $this->transport = new ApiGuzzleTransport();
        } else {
            $this->transport = $transport;
        }
    }

    /**
     * @param Interfaces\IApiRequestParameters $requestParams
     * @return Interfaces\IApiRequestResult
     */
    public function makeRequest(Interfaces\IApiRequestParameters $requestParams)
    {
        $this->lastApiResult = $this->transport->makeRequest($requestParams);
        $arData = $this->lastApiResult->getData();
        if (is_array($arData) ){
            if (isset($arData['result_code'])) {
                $this->lastApiResult->setResultCode((int)$arData['result_code']);
                unset($arData['result_code']);
            }
            if (isset($arData['result_code'])) {
                $this->lastApiResult->setResultCode((int)$arData['result_code']);
                unset($arData['result_code']);
            }
            if (isset($arData['result_message'])) {
                $this->lastApiResult->setResultMessage($arData['result_message']);
                unset($arData['result_message']);
            }
            if (isset($arData['result_output'])) {
                unset($arData['result_output']);
            }
            $this->lastApiResult->setData($arData);
        }

        return $this->lastApiResult;
    }


    /**
     * get Last Error of FCT api
     * @return string|null
     */
    public function getLastError()
    {
        if (
            $this->lastApiResult->getRequestStatusCode() != ApiConsts::REQUEST_STATUS_CODE__OK
            || $this->lastApiResult->getResultCode() != ApiConsts::RESULTS_CODE__SUCCESS
        ) {
            return $this->lastApiResult->getResultMessage();
        } else {
            return null;
        }
    }


}