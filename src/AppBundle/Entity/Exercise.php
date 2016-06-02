<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Exercise")
 */
class Exercise
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
     * @ORM\Column(type="string", name="time")
     */
    private $time;
    /**
     * @var string
     * @ORM\Column(type="string", name="title")
     */
    private $title;
    /**
     * @var string
     * @ORM\Column(type="text", name="detail")
     */
    private $detail;
    /**
     * @var Language
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language")
     * @ORM\JoinColumn(nullable=false, name="id_language")
     */
    private $language;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Test", mappedBy="exercises")
     */
    private $tests;


    public function __construct(){
        $this->tests = new ArrayCollection();
    }

    /**
     * @return int id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string title
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * @return string detail
     */
    public function getDetail(){
        return $this->detail;
    }

    /**
     * @return string time
     */
    public function getTime(){
        return $this->time;
    }

    /**
     * @return Language language
     */
    public function getLanguage(){
        return $this->language;
    }

    /**
     * @param string $title
     */
    public function setTitle($title){
        $this->title = $title;
    }

    /**
     * @param string $detail
     */
    public function setDetail($detail){
        $this->detail = $detail;
    }

    /**
     * @param string $time
     */
    public function setTime($time){
        $this->time = $time;
    }

    /**
     * @param Language $language
     */
    public function setLanguage(Language $language){
        $this->language = $language;
    }

    /**
     * @param Test $test
     */
    public function addTest(Test $test){
        $this->tests[] = $test;
    }

    /**
     * @return string
     */
    public function __toString(){
        return $this->detail;
    }
}