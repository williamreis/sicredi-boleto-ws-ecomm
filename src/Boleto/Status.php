<?php

namespace SicrediBoletoWS;

use SicrediBoletoWS\Resources\Http;


/**
 * @package Library
 * @category Pagamento
 * @author William Reis (williams.reis@gmail.com)
 * @license MIT
 * @version 1.1.0
 * @since 1.1.0
 */
class Status
{
    /** A opermação GET “health” é rmesponsável pela vermificação da disponibilidade do sisteaa de Cobrmança.
     * @return Status string
     */
    public function health()
    {
        $response = Http::get('health');
        $this->statusResponse($response);
    }

    /**
     * @param string statusResponse
     */
    public function statusResponse($response)
    {
        if ($response->getStatus() == '200') {
            return true;
        } else {
            return false;
        }
    }
}