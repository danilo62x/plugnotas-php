<?php

namespace TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Tributacao;

use FerFabricio\Hydrator\Hydrate;
use Respect\Validation\Validator as v;
use TecnoSpeed\Plugnotas\Abstracts\BuilderAbstract;
use TecnoSpeed\Plugnotas\Error\ValidationError;

class Diferimento extends BuilderAbstract
{
    private $estadual;
    private $municipal;
    private $cbs;

    public function setEstadual($estadual)
    {
        if ($estadual !== null && !v::floatVal()->validate($estadual)) {
            throw new ValidationError(
                'O diferimento estadual deve ser um valor numérico.'
            );
        }
        $this->estadual = $estadual;
    }

    public function getEstadual()
    {
        return $this->estadual;
    }

    public function setMunicipal($municipal)
    {
        if ($municipal !== null && !v::floatVal()->validate($municipal)) {
            throw new ValidationError(
                'O diferimento municipal deve ser um valor numérico.'
            );
        }
        $this->municipal = $municipal;
    }

    public function getMunicipal()
    {
        return $this->municipal;
    }

    public function setCbs($cbs)
    {
        if ($cbs !== null && !v::floatVal()->validate($cbs)) {
            throw new ValidationError(
                'O diferimento CBS deve ser um valor numérico.'
            );
        }
        $this->cbs = $cbs;
    }

    public function getCbs()
    {
        return $this->cbs;
    }

    public static function fromArray($data)
    {
        return Hydrate::toObject(Diferimento::class, $data);
    }
}
