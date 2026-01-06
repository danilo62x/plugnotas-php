<?php

namespace TecnoSpeed\Plugnotas\Nfse\Servico;

use FerFabricio\Hydrator\Hydrate;
use Respect\Validation\Validator as v;
use TecnoSpeed\Plugnotas\Abstracts\BuilderAbstract;
use TecnoSpeed\Plugnotas\Error\ValidationError;

class IbsCbs extends BuilderAbstract
{
    private $finalidadeNFSe;
    private $operacaoPessoal;
    private $codigoOperacao;
    private $tipoOperacao;
    private $tipoEnteGovernamental;
    private $referenciasNFSe;
    private $destinatario;
    private $valores;
    private $operacao;
    private $tributacao;

    public function setFinalidadeNFSe($finalidadeNFSe)
    {
        $this->finalidadeNFSe = $finalidadeNFSe;
    }

    public function getFinalidadeNFSe()
    {
        return $this->finalidadeNFSe;
    }

    public function setOperacaoPessoal($operacaoPessoal)
    {
        $this->operacaoPessoal = $operacaoPessoal;
    }

    public function getOperacaoPessoal()
    {
        return $this->operacaoPessoal;
    }

    public function setCodigoOperacao($codigoOperacao)
    {
        $this->codigoOperacao = $codigoOperacao;
    }

    public function getCodigoOperacao()
    {
        return $this->codigoOperacao;
    }

    public function setTipoOperacao($tipoOperacao)
    {
        $this->tipoOperacao = $tipoOperacao;
    }

    public function getTipoOperacao()
    {
        return $this->tipoOperacao;
    }

    public function setTipoEnteGovernamental($tipoEnteGovernamental)
    {
        $this->tipoEnteGovernamental = $tipoEnteGovernamental;
    }

    public function getTipoEnteGovernamental()
    {
        return $this->tipoEnteGovernamental;
    }

    public function setReferenciasNFSe(array $referenciasNFSe)
    {
        $this->referenciasNFSe = $referenciasNFSe;
    }

    public function getReferenciasNFSe()
    {
        return $this->referenciasNFSe;
    }

    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;
    }

    public function getDestinatario()
    {
        return $this->destinatario;
    }

    public function setValores($valores)
    {
        $this->valores = $valores;
    }

    public function getValores()
    {
        return $this->valores;
    }

    public function setOperacao($operacao)
    {
        $this->operacao = $operacao;
    }

    public function getOperacao()
    {
        return $this->operacao;
    }

    public function setTributacao($tributacao)
    {
        $this->tributacao = $tributacao;
    }

    public function getTributacao()
    {
        return $this->tributacao;
    }

    public static function fromArray($data)
    {
        return Hydrate::toObject(IbsCbs::class, $data);
    }
}