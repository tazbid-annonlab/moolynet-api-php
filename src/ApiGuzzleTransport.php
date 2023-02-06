<?php


namespace Moolynet\Api;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Moolynet\Api\Interfaces\IApiRequestParameters;
use Moolynet\Api\Interfaces\IApiTransport;

class ApiGuzzleTransport implements IApiTransport
{

    /**
     * @inheritDoc
     */
    public function makeRequest(IApiRequestParameters $requestParams)
    {
        $result = new ApiRequestResult();

        $arParameters = [
            'api_action' => $requestParams->getFunctionName(),
            'api_output' => 'json',
        ];

        if (!$requestParams->getApiURL()) {
            return $result
                ->setRequestStatusCode(ApiConsts::REQUEST_STATUS_CODE__FORBIDDEN)
                ->setResultCode(ApiConsts::RESULTS_CODE__FAIL)
                ->setResultMessage("Missed mandatory parameters: api url");
        }
        if (!$requestParams->getMethod()) {
            return $result
                ->setRequestStatusCode(ApiConsts::REQUEST_STATUS_CODE__FORBIDDEN)
                ->setResultCode(ApiConsts::RESULTS_CODE__FAIL)
                ->setResultMessage("Missed mandatory parameters: api method");
        }
        if (!$arParameters['api_action']) {
            return $result
                ->setRequestStatusCode(ApiConsts::REQUEST_STATUS_CODE__FORBIDDEN)
                ->setResultCode(ApiConsts::RESULTS_CODE__FAIL)
                ->setResultMessage("Missed mandatory parameters: api function");
        }
        $in_params = $requestParams->getParameters();
        if (is_array($in_params)) {
            foreach ($in_params as $key => $param) {
                $arParameters[$key] = $param;
            }
        }
        $arParameters['api_key'] = $requestParams->getApiKey();

        $client = new Client();
        try {
            $url = $requestParams->getApiURL();
            $arReqOptions = [];
            if ($requestParams->getMethod() == ApiConsts::REQUEST_METHOD_GET) {
                $arReqOptions['query'] = $arParameters;
            } elseif ($requestParams->getMethod() == ApiConsts::REQUEST_METHOD_POST) {
                $arReqOptions['form_params'] = $arParameters;
            }
            $res = $client->request(
                $requestParams->getMethod(),
                $url,
                $arReqOptions
            );
            if ($statusCode = $res->getStatusCode() == ApiConsts::REQUEST_STATUS_CODE__OK) {
                $result->setRequestStatusCode(ApiConsts::REQUEST_STATUS_CODE__OK);
                $sBody = $res->getBody()->getContents();
                $arData = json_decode($sBody, true);
                if ($arData == null) {
                    $result
                        ->setResultCode(ApiConsts::RESULTS_CODE__FAIL)
                        ->setResultMessage($sBody);
                } else {
                }
                $result->setData($arData);
            } else {
                $result
                    ->setRequestStatusCode($statusCode)
                    ->setResultMessage($res->getReasonPhrase())
                    ->setResultCode(0);
            }
        } catch (GuzzleException $e) {
            $result
                ->setRequestStatusCode($e->getCode())
                ->setResultCode(0)
                ->setResultMessage($e->getMessage());
        } catch (Exception $e) {
            $result
                ->setRequestStatusCode($e->getCode())
                ->setResultCode(0)
                ->setResultMessage($e->getMessage());
        }
        return $result;
    }
}