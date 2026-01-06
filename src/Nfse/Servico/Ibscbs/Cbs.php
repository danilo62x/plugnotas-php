<?php

namespace TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs;

use Respect\Validation\Validator as v;
use TecnoSpeed\Plugnotas\Abstracts\BuilderAbstract;
use TecnoSpeed\Plugnotas\Error\ValidationError;

class Cbs extends BuilderAbstract
{
    private $aliquota;
    private $valor;
    private $valorCredito;

    public function setAliquota($aliquota)
    {
        if (!v::numeric()->validate($aliquota)) {
            throw new ValidationError(
                'É necessário informar um valor numérico para aliquota da CBS.'
            );
        }
        $this->aliquota = (float)$aliquota;
    }

    public function getAliquota()
    {
        return $this->aliquota;
    }

    public function setValor($valor)
    {
        if (!v::numeric()->validate($valor)) {
            throw new ValidationError(
                'É necessário informar um valor numérico para o campo valor da CBS.'
            );
        }
        $this->valor = (float)$valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValorCredito($valorCredito)
    {
        if (!v::numeric()->validate($valorCredito)) {
            throw new ValidationError(
                'É necessário informar um valor numérico para o campo valorCredito da CBS.'
            );
        }
        $this->valorCredito = (float)$valorCredito;
    }

    public function getValorCredito()
    {
        return $this->valorCredito;
    }
}
