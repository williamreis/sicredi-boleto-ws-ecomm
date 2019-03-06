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
class Emissao
{

    private $agencia;
    private $cedente;
    private $nossoNumero;
    private $codigoPagador;
    private $tipoPessoa;
    private $cpfCnpj;
    private $nome;
    private $endereco;
    private $cidade;
    private $uf;

    private $sacado;
    private $avalista;
    private $numeroDocumento;
    private $dataVencimento;
    private $valorBoleto;
    private $demonstrativos = array();
    private $instrucoes = array();

    /**
     * @param string $agencia
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }

    /**
     * @return string
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    public function getPosto()
    {
        return $this->posto;
    }

    public function setPosto($posto)
    {
        $this->posto = $posto;
    }

    /**
     * @param Cedente $cedente
     */
    public function setCedente($cedente)
    {
        $this->cedente = $cedente;
    }

    /**
     * @return Cedente
     */
    public function getCedente()
    {
        return $this->cedente;
    }

    /**
     * @param mixed $nossoNumero
     */
    public function setNossoNumero($nossoNumero)
    {
        $this->nossoNumero = $nossoNumero;
    }

    /**
     * @return string
     */
    public function getNossoNumero()
    {
        return $this->nossoNumero;
    }

    /**
     * @param string $codigoPagador
     */
    public function setCodigoPagador($codigoPagador)
    {
        $this->codigoPagador = $codigoPagador;
    }

    /**
     * @return string
     */
    public function getCodigoPagador()
    {
        return $this->codigoPagador;
    }

    /**
     * @param string $tipoPessoa
     */
    public function setTipoPessoa($tipoPessoa)
    {
        $this->tipoPessoa = $tipoPessoa;
    }

    /**
     * @return string
     */
    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }

    /**
     * @param string $cpfCnpj
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param \DateTime $dataVencimento
     */
    public function setDataVencimento(\DateTime $dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;
    }

    /**
     * @return \DateTime
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @param array $demonstrativos
     */
    public function setDemonstrativos($demonstrativos)
    {
        $this->demonstrativos = $demonstrativos;
    }

    public function addDemostrativo($demonstrativo)
    {
        $this->demonstrativos[] = $demonstrativo;
    }

    /**
     * @return array
     */
    public function getDemonstrativos()
    {
        return $this->demonstrativos;
    }


    /**
     * @param array $instrucoes
     */
    public function setInstrucoes($instrucoes)
    {
        $this->instrucoes = $instrucoes;
    }

    public function addInstrucao($instrucao)
    {
        $this->instrucoes[] = $instrucao;
    }

    /**
     * @return array
     */
    public function getInstrucoes()
    {
        return $this->instrucoes;
    }


    /**
     * @param mixed $numeroDocumento
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    /**
     * @return mixed
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @param Sacado $sacado
     */
    public function setSacado($sacado)
    {
        $this->sacado = $sacado;
    }

    /**
     * @return Sacado
     */
    public function getSacado()
    {
        return $this->sacado;
    }

    /**
     * @param Avalista $avalista
     */
    public function setAvalista($avalista)
    {
        $this->avalista = $avalista;
    }

    /**
     * @return Avalista
     */
    public function getAvalista()
    {
        return $this->avalista;
    }

    /**
     * @param float $valorBoleto
     */
    public function setValorBoleto($valorBoleto)
    {
        $this->valorBoleto = $valorBoleto;
    }

    /**
     * @return float
     */
    public function getValorBoleto()
    {
        return $this->valorBoleto;
    }
}