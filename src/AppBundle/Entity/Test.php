<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Test")
 */
class Test
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
     * @ORM\Column(type="text", name="detail")
     */
    private $detail;

    /**
     * @var Level
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Level")
     * @ORM\JoinColumn(nullable=false, name="id_level")
     */
    private $level;

    /**
     * @var string
     * @ORM\Column(type="string", name="title")
     */
    private $title;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Exercise", inversedBy="tests")
     * @ORM\JoinTable(
     *     name="Asso_Test_Exercise",
     *     joinColumns={@ORM\JoinColumn(name="id_test", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_exercise", referencedColumnName="id")}
     * )
     */
    private $exercises;


    public function __construct(){
        $this->exercises = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDetail(){
        return $this->detail;
    }

    /**
     * @return Level
     */
    public function getLevel(){
        return $this->level;
    }

    /**
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * @return ArrayCollection
     */
    public function getExercises(){
        return $this->exercises;
    }

    /**
     * @param string $detail
     */
    public function setDetail($detail){
        $this->detail = $detail;
    }

    /**
     * @param Level $level
     */
    public function setLevel(Level $level){
        $this->level = $level;
    }

    /**
     * @param string $title
     */
    public function setTitle($title){
        $this->title = $title;
    }

    /**
     * @param ArrayCollection $exercises
     */
    public function setExercises($exercises){
        $this->exercises = $exercises;
    }

    /**
     * @param Exercise $exercise
     */
    public function addExercise(Exercise $exercise){
        $exercise->addTest($this);
        $this->exercises[] = $exercise;
    }
}