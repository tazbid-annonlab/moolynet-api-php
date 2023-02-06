<?php


namespace Moolynet\Api\Interfaces;


interface IApiTransport
{

    /**
     * @param IApiRequestParameters $requestParams
     * @return IApiRequestResult
     */
    public function makeRequest(IApiRequestParameters $requestParams);

}