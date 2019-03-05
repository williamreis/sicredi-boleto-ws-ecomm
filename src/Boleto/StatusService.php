<?php

namespace SicrediBoletoWS;

/**
 * @package Library
 * @category Pagamento
 * @author William Reis (williams.reis@gmail.com)
 * @license MIT
 * @version 1.1.0
 * @since 1.1.0
 */
class StatusService
{
    private $urlBase;

    //= 'https://cobrancaonline.sicredi.com.br/sicredi-cobranca-ws-ecomm-api/ecomm/v1/boleto'

    public function __construct($url)
    {
        $this->urlBase = $url;
    }

    /** Cria um ID para comunicação com Checkout Transparente
     * @return id string
     */
    public function health()
    {
        $url = $this->urlBase . '/health';
        \SicrediAPI\Resources\Http::post($url, $data = null, $timeout = 20, $charset = 'ISO-8859-1');
    }
}