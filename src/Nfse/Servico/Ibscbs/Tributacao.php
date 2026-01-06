<?php

namespace TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs;

use FerFabricio\Hydrator\Hydrate;
use Respect\Validation\Validator as v;
use TecnoSpeed\Plugnotas\Abstracts\BuilderAbstract;
use TecnoSpeed\Plugnotas\Error\ValidationError;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Tributacao\Regular;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Tributacao\Diferimento;

class Tributacao extends BuilderAbstract
{
    private $cst;
    private $cct;
    private $creditoPresumido;
    private $regular;
    private $diferimento;

    public function setCst($cst)
    {
        if ($cst !== null && !v::stringType()->length(0, 3)->validate($cst)) {
            throw new ValidationError(
                'O CST deve ter no máximo 3 caracteres.'
            );
        }
        $this->cst = $cst;
    }

    public function getCst()
    {
        return $this->cst;
    }

    public function setCct($cct)
    {
        if ($cct !== null && !v::stringType()->length(0, 6)->validate($cct)) {
            throw new ValidationError(
                'O CCT deve ter no máximo 6 caracteres.'
            );
        }
        $this->cct = $cct;
    }

    public function getCct()
    {
        return $this->cct;
    }

    public function setCreditoPresumido($creditoPresumido)
    {
        if ($creditoPresumido !== null && !v::stringType()->length(0, 2)->validate($creditoPresumido)) {
            throw new ValidationError(
                'O crédito presumido deve ter no máximo 2 caracteres.'
            );
        }
        $this->creditoPresumido = $creditoPresumido;
    }

    public function getCreditoPresumido()
    {
        return $this->creditoPresumido;
    }

    public function setRegular(Regular $regular)
    {
        $this->regular = $regular;
    }

    public function getRegular()
    {
        return $this->regular;
    }

    public function setDiferimento(Diferimento $diferimento)
    {
        $this->diferimento = $diferimento;
    }

    public function getDiferimento()
    {
        return $this->diferimento;
    }

    public static function fromArray($data)
    {
        if (array_key_exists('regular', $data) && $data['regular'] !== null) {
            $data['regular'] = Hydrate::toObject(Regular::class, $data['regular']);
        }

        if (array_key_exists('diferimento', $data) && $data['diferimento'] !== null) {
            $data['diferimento'] = Hydrate::toObject(Diferimento::class, $data['diferimento']);
        }

        return Hydrate::toObject(Tributacao::class, $data);
    }
}
