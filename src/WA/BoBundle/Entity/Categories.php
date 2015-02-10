<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\CategoriesRepository")
 */
class Categories
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
     * @Assert\NotBlank(message = "La description est vide")
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "La description doit faire au moins {{ limit }} caractères",
     *      maxMessage = "La description nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=300, nullable=true)
     */
    private $slug;

    /**
     * @var integer
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    private $parentId;

    /**
     * @var integer
     * @Assert\NotBlank(message = "La position est vide")
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="lft", type="integer", nullable=true)
     */
    private $lft;

    /**
     * @var integer
     *
     * @ORM\Column(name="lvl", type="integer", nullable=true)
     */
    private $lvl;

    /**
     * @var integer
     *
     * @ORM\Column(name="rgt", type="integer", nullable=true)
     */
    private $rgt;

    /**
     * @var integer
     *
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime", nullable=true)
     */
    private $dateUpdated;


    /**
     *  @var string
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=true)
     */
    private $image;


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
     * @return Categories
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
     * Set description
     *
     * @param string $description
     * @return Categories
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Categories
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Categories
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Categories
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
     * Set lft
     *
     * @param integer $lft
     * @return Categories
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer 
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     * @return Categories
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer 
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     * @return Categories
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer 
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     * @return Categories
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return integer 
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Categories
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
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Categories
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @ORM\OneToMany(targetEntity="Movies", mappedBy="categories")
     */
    protected $movies;

    /**
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 900,
     *     minHeight = 200,
     *     maxHeight = 900,
     * )
     */
    public $file;

    // ...

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add movies
     *
     * @param \WA\BoBundle\Entity\Movies $movies
     * @return Categories
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


    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/categories';
    }

    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->image = $this->file->getClientOriginalName();

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Categories
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
