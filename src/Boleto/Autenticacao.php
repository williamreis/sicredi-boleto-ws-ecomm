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
class Autenticacao
{
    private $token;
    private $chaveTransacao;
    private $dataExpiracao;
    private $failure;

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $chaveTransacao
     */
    public function setChaveTransacao($chaveTransacao)
    {
        $this->chaveTransacao = $chaveTransacao;
    }

    /**
     * @return string
     */
    public function getChaveTransacao()
    {
        return $this->chaveTransacao;
    }

    /**
     * @param string $dataExpiracao
     */
    public function setDataExpiracao($dataExpiracao)
    {
        $this->dataExpiracao = $dataExpiracao;
    }

    /**
     * @return string
     */
    public function getDataExpiracao()
    {
        return $this->dataExpiracao;
    }

    /**
     * @param string $failure
     */
    public function setFailure($failure)
    {
        $this->failure = $failure->codigo . ' - ' . $failure->mensagem . ' - ' . $failure->parametro;
    }

    /**
     * @return string
     */
    public function getFailure()
    {
        return $this->failure;
    }

    /** Credencial para Transação
     * @return status array
     */
    public function credencials($data)
    {
        $response = Http::post('autenticacao', $this->data());
        $this->statusResponse($response);
    }

    /**
     * @param string statusResponse
     */
    public function statusResponse($response)
    {
        if ($response->getStatus() == '200') {
            $dados = json_decode($response->getResponse());
            $this->setChaveTransacao($dados->chaveTransacao);
            $this->setDataExpiracao($dados->failure);
            return true;
        } else {
            $dados = json_decode($response->getResponse());
            $this->setFailure($dados);
            return false;
        }
    }
}