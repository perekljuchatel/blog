<?php

namespace Ninja\Entities;

/**
 * @Entity
 * @Table(name="posts")
 **/
class Post
{

    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @Column(type="datetime")
     */
    protected $date;

    /**
     * @var string
     *
     * @Column(type="string")
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
