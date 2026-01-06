<?php

namespace TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Tributacao;

use FerFabricio\Hydrator\Hydrate;
use Respect\Validation\Validator as v;
use TecnoSpeed\Plugnotas\Abstracts\BuilderAbstract;
use TecnoSpeed\Plugnotas\Error\ValidationError;

class Regular extends BuilderAbstract
{
    private $cst;
    private $cct;

    public function setCst($cst)
    {
        if ($cst !== null && !v::stringType()->length(0, 3)->validate($cst)) {
            throw new ValidationError(
                'O CST regular deve ter no máximo 3 caracteres.'
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
                'O CCT regular deve ter no máximo 6 caracteres.'
            );
        }
        $this->cct = $cct;
    }

    public function getCct()
    {
        return $this->cct;
    }

    public static function fromArray($data)
    {
        return Hydrate::toObject(Regular::class, $data);
    }
}
