<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Tags
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\TagsRepository")
 */
class Tags
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message = "Le word est vide")
     *  @Assert\Length(
     *      min = "3",
     *      max = "10",
     *      minMessage = "Le word doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le word nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="word", type="string", length=400, nullable=true)
     */
    private $word;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Assert\NotBlank(message = "Le movie est vide")
     * @ORM\ManyToMany(targetEntity="Movies", mappedBy="tags")
     */
    private $movies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set word
     *
     * @param string $word
     * @return Tags
     */
    public function setWord($word)
    {
        $this->word = $word;

        return $this;
    }

    /**
     * Get word
     *
     * @return string 
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * Add movies
     *
     * @param \WA\BoBundle\Entity\Movies $movies
     * @return Tags
     */
    public function addMovie(\WA\BoBundle\Entity\Movies $movies)
    {
        $this->movies[] = $movies;

        return $this;
    }

    /**
     * Remove movies
     *
     * @param \WA\BoBundle\Entity\Movies $movies
     */
    public function removeMovie(\WA\BoBundle\Entity\Movies $movies)
    {
        $this->movies->removeElement($movies);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovies()
    {
        return $this->movies;
    }

    public function __toString()
    {
        return $this->getWord();
    }
}
