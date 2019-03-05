<?php

namespace SicrediAPI;

/**
 * @package Library
 * @category Pagamento
 * @author Carlos W. Gama (carloswgama@gmail.com)
 * @license MIT
 * @version 2.1.0
 * @since 2.1.0
 * Classe de pagamento de Recursivo/Assinaturas no PagSeguro
 */
class Autenticacao
{
    //===================================================
    // 					URL
    //===================================================
    /**
     * URL para a API em produção
     * @access private
     * @var string
     */
    private $urlBase = 'https://cobrancaonline.sicredi.com.br/sicredi-cobranca-ws-ecomm-api/ecomm/v1/boleto';

    public function __construct($email, $token, $isSandbox = false)
    {
        $this->email = $email;
        $this->token = $token;
        $this->isSandbox = $isSandbox;
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