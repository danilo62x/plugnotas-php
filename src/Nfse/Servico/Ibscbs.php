<?php

namespace TecnoSpeed\Plugnotas\Nfse\Servico;

use FerFabricio\Hydrator\Hydrate;
use Respect\Validation\Validator as v;
use TecnoSpeed\Plugnotas\Abstracts\BuilderAbstract;
use TecnoSpeed\Plugnotas\Error\ValidationError;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Ibs;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Cbs;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Total;

class Ibscbs extends BuilderAbstract
{
    private $tipoImunidade;
    private $cBenef;
    private $ibs;
    private $cbs;
    private $total;

    public function setTipoImunidade($tipoImunidade)
    {
        if (!v::in([0, 1, 2, 3, 4, 5, 6])->validate($tipoImunidade)) {
            throw new ValidationError(
                'Tipo de imunidade inválido. Valores aceitos: 0 a 6.'
            );
        }
        $this->tipoImunidade = $tipoImunidade;
    }

    public function getTipoImunidade()
    {
        return $this->tipoImunidade;
    }

    public function setCBenef($cBenef)
    {
        if (!v::stringType()->length(0, 10)->validate($cBenef)) {
            throw new ValidationError(
                'O código do benefício fiscal deve ter no máximo 10 caracteres.'
            );
        }
        $this->cBenef = $cBenef;
    }

    public function getCBenef()
    {
        return $this->cBenef;
    }

    public function setIbs(Ibs $ibs)
    {
        $this->ibs = $ibs;
    }

    public function getIbs()
    {
        return $this->ibs;
    }

    public function setCbs(Cbs $cbs)
    {
        $this->cbs = $cbs;
    }

    public function getCbs()
    {
        return $this->cbs;
    }

    public function setTotal(Total $total)
    {
        $this->total = $total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public static function fromArray($data)
    {
        if (array_key_exists('ibs', $data)) {
            $data['ibs'] = Hydrate::toObject(Ibs::class, $data['ibs']);
        }

        if (array_key_exists('cbs', $data)) {
            $data['cbs'] = Hydrate::toObject(Cbs::class, $data['cbs']);
        }

        if (array_key_exists('total', $data)) {
            $data['total'] = Hydrate::toObject(Total::class, $data['total']);
        }

        return Hydrate::toObject(Ibscbs::class, $data);
    }
}
