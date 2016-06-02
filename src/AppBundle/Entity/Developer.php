<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Developer")
 */
class Developer
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
     * @ORM\Column(type="string", name="lastName")
     */
    private $lastName;
    /**
     * @var string
     * @ORM\Column(type="string", name="firstName")
     */
    private $firstName;
    /**
     * @var string
     * @ORM\Column(type="string", name="username")
     */
    private $username;
    /**
     * @var int
     * @ORM\Column(type="string", name="password")
     */
    private $password;
    /**
     * @var Test
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Test")
     * @ORM\JoinColumn(nullable=false, name="id_test")
     */
    private $test;

    /**
     * @return int id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string lastName
     */
    public function getLastName(){
        return $this->lastName;
    }

    /**
     * @return string firstName
     */
    public function getFirstName(){
        return $this->firstName;
    }

    /**
     * @return string username
     */
    public function getUsername(){
        return $this->username;
    }

    /**
     * @return string password
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * @return Test test
     */
    public function getTest(){
        return $this->test;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    /**
     * @param string $username
     */
    public function setUsername($username){
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password){
        $this->password = sha1($password);
    }

    /**
     * @param Test $test
     */
    public function setTest(Test $test){
        $this->test = $test;
    }
}