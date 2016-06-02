<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Language")
 */
class Language
{
    /**
     * @var int
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="label")
     */
    private $label;

    /**
     * @return int id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string label
     */
    public function getLabel(){
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label){
        $this->label = $label;
    }

}