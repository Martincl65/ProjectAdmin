<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Response")
 */
class Response
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
     * @ORM\Column(type="text", name="content")
     */
    private $content;
    /**
     * @var Developer
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Developer")
     * @ORM\JoinColumn(nullable=false, name="id_developer")
     */
    private $developer;
    /**
     * @var Exercise
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Exercise")
     * @ORM\JoinColumn(nullable=false, name="id_exercise")
     */
    private $exercise;

    /**
     * @return int id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(){
        return $this->content;
    }

    /**
     * @return Developer
     */
    public function getDeveloper(){
        return $this->developer;
    }

    /**
     * @return Exercise
     */
    public function getExercise(){
        return $this->exercise;
    }


    /**
     * @param string $content
     */
    public function setContent($content){
        $this->content = $content;
    }

    /**
     * @param Developer $developer
     */
    public function setLevel(Developer $developer){
        $this->developer = $developer;
    }

    /**
     * @param Exercise $exercise
     */
    public function setExercise(Exercise $exercise){
        $this->exercise = $exercise;
    }
}