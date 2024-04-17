<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="urls")
 */
class Url
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $urlOriginal;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $urlGerada;

    /**
     * @ORM\Column(type="string", length=10)
     * A = Ativo, D = Desativado
     */
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUrlOriginal()
    {
        return $this->urlOriginal;
    }

    /**
     * @param mixed $urlOriginal
     */
    public function setUrlOriginal($urlOriginal): void
    {
        $this->urlOriginal = $urlOriginal;
    }

    /**
     * @return mixed
     */
    public function getUrlGerada(): string
    {
        return $this->urlGerada;
    }

    /**
     * @param mixed $urlGerada
     */
    public function setUrlGerada($urlGerada): void
    {
        $this->urlGerada = $urlGerada;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}
