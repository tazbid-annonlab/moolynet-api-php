<?php


namespace Moolynet\Api\Interfaces;


interface IApi
{

    /**
     * @param IApiRequestParameters $requestParams
     * @return IApiRequestResult
     */
    public function makeRequest(IApiRequestParameters $requestParams);

}