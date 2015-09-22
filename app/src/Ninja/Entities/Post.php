<?php

namespace Ninja\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity
 * @ORM\Table(name="posts")
 **/
class Post
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $content;

    public function __construct()
    {
        $this->date = new \DateTime('now');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
}
