<?php

namespace TecnoSpeed\Plugnotas\Nfse\Servico;

use FerFabricio\Hydrator\Hydrate;
use Respect\Validation\Validator as v;
use TecnoSpeed\Plugnotas\Abstracts\BuilderAbstract;
use TecnoSpeed\Plugnotas\Error\ValidationError;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Ibs;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Cbs;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Total;
use TecnoSpeed\Plugnotas\Nfse\Servico\Ibscbs\Tributacao;

class Ibscbs extends BuilderAbstract
{
    private $finalidade;
    private $operacaoPessoal;
    private $codigoOperacao;
    private $tipoOperacao;
    private $tipoEnteGovernamental;
    private $referenciaNfse;
    private $tributacao;
    private $tipoImunidade;
    private $cBenef;
    private $ibs;
    private $cbs;
    private $total;

    public function setFinalidade($finalidade)
    {
        if ($finalidade !== null && !v::intVal()->validate($finalidade)) {
            throw new ValidationError(
                'A finalidade deve ser um valor inteiro.'
            );
        }
        $this->finalidade = $finalidade;
    }

    public function getFinalidade()
    {
        return $this->finalidade;
    }

    public function setOperacaoPessoal($operacaoPessoal)
    {
        if ($operacaoPessoal !== null && !v::intVal()->validate($operacaoPessoal)) {
            throw new ValidationError(
                'A operação pessoal deve ser um valor inteiro.'
            );
        }
        $this->operacaoPessoal = $operacaoPessoal;
    }

    public function getOperacaoPessoal()
    {
        return $this->operacaoPessoal;
    }

    public function setCodigoOperacao($codigoOperacao)
    {
        if ($codigoOperacao !== null && !v::stringType()->length(0, 6)->validate($codigoOperacao)) {
            throw new ValidationError(
                'O código da operação deve ter no máximo 6 caracteres.'
            );
        }
        $this->codigoOperacao = $codigoOperacao;
    }

    public function getCodigoOperacao()
    {
        return $this->codigoOperacao;
    }

    public function setTipoOperacao($tipoOperacao)
    {
        if ($tipoOperacao !== null && !v::intVal()->validate($tipoOperacao)) {
            throw new ValidationError(
                'O tipo de operação deve ser um valor inteiro.'
            );
        }
        $this->tipoOperacao = $tipoOperacao;
    }

    public function getTipoOperacao()
    {
        return $this->tipoOperacao;
    }

    public function setTipoEnteGovernamental($tipoEnteGovernamental)
    {
        if ($tipoEnteGovernamental !== null && !v::intVal()->validate($tipoEnteGovernamental)) {
            throw new ValidationError(
                'O tipo de ente governamental deve ser um valor inteiro.'
            );
        }
        $this->tipoEnteGovernamental = $tipoEnteGovernamental;
    }

    public function getTipoEnteGovernamental()
    {
        return $this->tipoEnteGovernamental;
    }

    public function setReferenciaNfse($referenciaNfse)
    {
        if ($referenciaNfse !== null && !is_array($referenciaNfse) && !v::stringType()->validate($referenciaNfse)) {
            throw new ValidationError(
                'A referência NFSe deve ser uma string ou array de strings.'
            );
        }
        // Se for string, converte para array
        if (is_string($referenciaNfse) && !empty($referenciaNfse)) {
            $this->referenciaNfse = [$referenciaNfse];
        } else {
            $this->referenciaNfse = $referenciaNfse;
        }
    }

    public function getReferenciaNfse()
    {
        return $this->referenciaNfse;
    }

    public function setTributacao(Tributacao $tributacao)
    {
        $this->tributacao = $tributacao;
    }

    public function getTributacao()
    {
        return $this->tributacao;
    }

    public function setTipoImunidade($tipoImunidade)
    {
        if ($tipoImunidade !== null && !v::in([0, 1, 2, 3, 4, 5, 6])->validate($tipoImunidade)) {
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
        if ($cBenef !== null && !v::stringType()->length(0, 10)->validate($cBenef)) {
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
        if (array_key_exists('tributacao', $data) && $data['tributacao'] !== null) {
            $data['tributacao'] = Tributacao::fromArray($data['tributacao']);
        }

        if (array_key_exists('ibs', $data) && $data['ibs'] !== null) {
            $data['ibs'] = Hydrate::toObject(Ibs::class, $data['ibs']);
        }

        if (array_key_exists('cbs', $data) && $data['cbs'] !== null) {
            $data['cbs'] = Hydrate::toObject(Cbs::class, $data['cbs']);
        }

        if (array_key_exists('total', $data) && $data['total'] !== null) {
            $data['total'] = Hydrate::toObject(Total::class, $data['total']);
        }

        return Hydrate::toObject(Ibscbs::class, $data);
    }
}
