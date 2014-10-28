<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cinema
 *
 * @ORM\Table(name="cinema")
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\CinemaRepository")
 */
class Cinema
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
     * @Assert\NotBlank(message = "Le titre est vide")
     * @Assert\Length(
     *      min = "3",
     *      max = "10",
     *      minMessage = "Le titre doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le titre nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="title", type="string", length=250, nullable=true)
     */
    private $title;

    /**
     * @var string
     * @Assert\NotBlank(message = "La ville est vide")
     * @Assert\Length(
     *      min = "3",
     *      max = "10",
     *      minMessage = "La ville doit faire au moins {{ limit }} caractères",
     *      maxMessage = "La ville nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="ville", type="string", length=250, nullable=true)
     */
    private $ville;

    /**
     * @var integer
     * @Assert\NotBlank(message = "La position est vide")
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position = '0';

    /**
     * @var \DateTime
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Assert\NotBlank(message = "Le movie est vide")
     * @ORM\ManyToMany(targetEntity="Movies", inversedBy="cinemas")
     * @ORM\JoinTable(name="cinema_movies",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cinemas_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   }
     * )
     */
    private $movies;

    /**
     * @ORM\OneToMany(targetEntity="Sessions", mappedBy="cinema")
     */
    protected $sessions;

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
     * Set title
     *
     * @param string $title
     * @return Cinema
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Cinema
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Cinema
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Cinema
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Add movies
     *
     * @param \WA\BoBundle\Entity\Movies $movies
     * @return Cinema
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
        return $this->getTitle();
    }

    /**
     * Add sessions
     *
     * @param \WA\BoBundle\Entity\Sessions $sessions
     * @return Cinema
     */
    public function addSession(\WA\BoBundle\Entity\Sessions $sessions)
    {
        $this->sessions[] = $sessions;

        return $this;
    }

    /**
     * Remove sessions
     *
     * @param \WA\BoBundle\Entity\Sessions $sessions
     */
    public function removeSession(\WA\BoBundle\Entity\Sessions $sessions)
    {
        $this->sessions->removeElement($sessions);
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}
