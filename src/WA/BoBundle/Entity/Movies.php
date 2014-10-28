<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Movies
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\MoviesRepository")
 */
class Movies
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
     * @Assert\NotBlank(message = "Le type film est vide", groups={"fullform"})
     * @ORM\Column(name="type_film", type="string", length=250, nullable=true)
     */
    private $typeFilm;

    /**
     * @var string
     * @Assert\NotBlank(message = "Le titre est vide")
     * @Assert\Length(
     *      min = "3",
     *      max = "30",
     *      minMessage = "Le titre doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le titre nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="title", type="string", length=250, nullable=true)
     */
    private $title;

    /**
     * @var string
     * @Assert\NotBlank(message = "Le synopsis est vide")
     * @Assert\Length(
     *      min = "3",
     *      max = "100",
     *      minMessage = "Le synopsis doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le synopsis nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="synopsis", type="text", nullable=true)
     */
    private $synopsis;

    /**
     * @var string
     * @Assert\NotBlank(message = "La description est vide", groups={"fullform"})
     * @Assert\Length(
     *      min = "3",
     *      max = "100",
     *      minMessage = "La description doit faire au moins {{ limit }} caractères",
     *      maxMessage = "La description nom ne peut pas être plus long que {{ limit }} caractères",
     * groups={"fullform"})
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="image", type="string", length=400, nullable=true)
     */
    private $image;

    /**
     * @var string
     * @Assert\NotBlank(message = "Le trailer est vide", groups={"fullform"})
     * @Assert\Url(message = "Le trailer est incorrecte", groups={"fullform"})
     * @ORM\Column(name="trailer", type="text", nullable=true)
     */
    private $trailer;

    /**
     * @var string
     * @Assert\NotBlank(message = "La langue est vide", groups={"fullform"})
     * @ORM\Column(name="languages", type="string", length=11, nullable=true)
     */
    private $languages;

    /**
     * @var string
     * @Assert\NotBlank(message = "Le distributeur est vide", groups={"fullform"})
     * @ORM\Column(name="distributeur", type="string", length=250, nullable=true)
     */
    private $distributeur;

    /**
     * @var string
     * @Assert\NotBlank(message = "La bo est vide", groups={"fullform"})
     * @ORM\Column(name="bo", type="string", length=250, nullable=true)
     */
    private $bo;

    /**
     * @var integer
     * @Assert\NotBlank(message = "L'année est vide", groups={"fullform"})
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * groups={"fullform"})
     * @ORM\Column(name="annee", type="integer", nullable=true)
     */
    private $annee;

    /**
     * @var float
     * @Assert\NotBlank(message = "Le budget est vide", groups={"fullform"})
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * groups={"fullform"})
     * @ORM\Column(name="budget", type="float", precision=10, scale=0, nullable=true)
     */
    private $budget;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_release", type="date", nullable=true)
     */
    private $dateRelease;

    /**
     * @var float
     * @Assert\NotBlank(message = "La note est vide", groups={"fullform"})
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * groups={"fullform"})
     * @ORM\Column(name="note_presse", type="float", precision=10, scale=0, nullable=true)
     */
    private $notePresse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=true)
     */
    private $visible;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cover", type="boolean", nullable=true)
     */
    private $cover;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shop", type="boolean", nullable=true)
     */
    private $shop;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views = '0';

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
     * @var \DateTime
     *
     * @ORM\Column(name="date_deleted", type="datetime", nullable=true)
     */
    private $dateDeleted;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=250, nullable=true)
     */
    private $ref;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="taxe", type="float", precision=10, scale=0, nullable=true)
     */
    private $taxe;

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_mode", type="integer", nullable=true)
     */
    private $shopMode;

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_type_dvd", type="integer", nullable=true)
     */
    private $shopTypeDvd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_date", type="date", nullable=true)
     */
    private $shopDate;

    /**
     * @var \Categories
     * @Assert\NotBlank(message = "La category est vide")
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="movies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_id", referencedColumnName="id")
     * })
     */
    private $categories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Assert\NotBlank(message = "L'actor est vide")
     * @ORM\ManyToMany(targetEntity="Actors", mappedBy="movies")
     */
    private $actors;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Assert\NotBlank(message = "Le cinema est vide")
     * @ORM\ManyToMany(targetEntity="Cinema", mappedBy="movies")
     */
    private $cinemas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Assert\NotBlank(message = "Le director est vide")
     * @ORM\ManyToMany(targetEntity="Directors", mappedBy="movies")
     */
    private $directors;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Movies", inversedBy="movies")
     * @ORM\JoinTable(name="related_movies",
     *   joinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="movies_id_related", referencedColumnName="id")
     *   }
     * )
     */
    private $moviesRelated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Assert\NotBlank(message = "Le tag est vide")
     * @ORM\ManyToMany(targetEntity="Tags", inversedBy="movies")
     * @ORM\JoinTable(name="tags_movies",
     *   joinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tags_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="movies")
     * @ORM\JoinTable(name="user_favoris",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   }
     * )
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Sessions", mappedBy="movies")
     */
    protected $sessions;

    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="movies")
     */
    protected $comments;

    /**
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 900,
     *     minHeight = 200,
     *     maxHeight = 900
     * )
     */
    public $file;

    // ...

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cinemas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->directors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moviesRelated = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set typeFilm
     *
     * @param string $typeFilm
     * @return Movies
     */
    public function setTypeFilm($typeFilm)
    {
        $this->typeFilm = $typeFilm;

        return $this;
    }

    /**
     * Get typeFilm
     *
     * @return string 
     */
    public function getTypeFilm()
    {
        return $this->typeFilm;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Movies
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
     * Set synopsis
     *
     * @param string $synopsis
     * @return Movies
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Movies
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
     * Set image
     *
     * @param string $image
     * @return Movies
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

    /**
     * Set trailer
     *
     * @param string $trailer
     * @return Movies
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }

    /**
     * Get trailer
     *
     * @return string 
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * Set languages
     *
     * @param string $languages
     * @return Movies
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages
     *
     * @return string 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set distributeur
     *
     * @param string $distributeur
     * @return Movies
     */
    public function setDistributeur($distributeur)
    {
        $this->distributeur = $distributeur;

        return $this;
    }

    /**
     * Get distributeur
     *
     * @return string 
     */
    public function getDistributeur()
    {
        return $this->distributeur;
    }

    /**
     * Set bo
     *
     * @param string $bo
     * @return Movies
     */
    public function setBo($bo)
    {
        $this->bo = $bo;

        return $this;
    }

    /**
     * Get bo
     *
     * @return string 
     */
    public function getBo()
    {
        return $this->bo;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     * @return Movies
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set budget
     *
     * @param float $budget
     * @return Movies
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return float 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Movies
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set dateRelease
     *
     * @param \DateTime $dateRelease
     * @return Movies
     */
    public function setDateRelease($dateRelease)
    {
        $this->dateRelease = $dateRelease;

        return $this;
    }

    /**
     * Get dateRelease
     *
     * @return \DateTime 
     */
    public function getDateRelease()
    {
        return $this->dateRelease;
    }

    /**
     * Set notePresse
     *
     * @param float $notePresse
     * @return Movies
     */
    public function setNotePresse($notePresse)
    {
        $this->notePresse = $notePresse;

        return $this;
    }

    /**
     * Get notePresse
     *
     * @return float 
     */
    public function getNotePresse()
    {
        return $this->notePresse;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Movies
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set cover
     *
     * @param boolean $cover
     * @return Movies
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return boolean 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set shop
     *
     * @param boolean $shop
     * @return Movies
     */
    public function setShop($shop)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return boolean 
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Movies
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
     * Set views
     *
     * @param integer $views
     * @return Movies
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Movies
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
     * @return Movies
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

    /**
     * Set dateDeleted
     *
     * @param \DateTime $dateDeleted
     * @return Movies
     */
    public function setDateDeleted($dateDeleted)
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    /**
     * Get dateDeleted
     *
     * @return \DateTime 
     */
    public function getDateDeleted()
    {
        return $this->dateDeleted;
    }

    /**
     * Set ref
     *
     * @param string $ref
     * @return Movies
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Movies
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Movies
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set taxe
     *
     * @param float $taxe
     * @return Movies
     */
    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;

        return $this;
    }

    /**
     * Get taxe
     *
     * @return float 
     */
    public function getTaxe()
    {
        return $this->taxe;
    }

    /**
     * Set shopMode
     *
     * @param integer $shopMode
     * @return Movies
     */
    public function setShopMode($shopMode)
    {
        $this->shopMode = $shopMode;

        return $this;
    }

    /**
     * Get shopMode
     *
     * @return integer 
     */
    public function getShopMode()
    {
        return $this->shopMode;
    }

    /**
     * Set shopTypeDvd
     *
     * @param integer $shopTypeDvd
     * @return Movies
     */
    public function setShopTypeDvd($shopTypeDvd)
    {
        $this->shopTypeDvd = $shopTypeDvd;

        return $this;
    }

    /**
     * Get shopTypeDvd
     *
     * @return integer 
     */
    public function getShopTypeDvd()
    {
        return $this->shopTypeDvd;
    }

    /**
     * Set shopDate
     *
     * @param \DateTime $shopDate
     * @return Movies
     */
    public function setShopDate($shopDate)
    {
        $this->shopDate = $shopDate;

        return $this;
    }

    /**
     * Get shopDate
     *
     * @return \DateTime 
     */
    public function getShopDate()
    {
        return $this->shopDate;
    }

    /**
     * Set categories
     *
     * @param \WA\BoBundle\Entity\Categories $categories
     * @return Movies
     */
    public function setCategories(\WA\BoBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \WA\BoBundle\Entity\Categories 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add actors
     *
     * @param \WA\BoBundle\Entity\Actors $actors
     * @return Movies
     */
    public function addActor(\WA\BoBundle\Entity\Actors $actors)
    {
        $this->actors[] = $actors;

        return $this;
    }

    /**
     * Remove actors
     *
     * @param \WA\BoBundle\Entity\Actors $actors
     */
    public function removeActor(\WA\BoBundle\Entity\Actors $actors)
    {
        $this->actors->removeElement($actors);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Add cinemas
     *
     * @param \WA\BoBundle\Entity\Cinema $cinemas
     * @return Movies
     */
    public function addCinema(\WA\BoBundle\Entity\Cinema $cinemas)
    {
        $this->cinemas[] = $cinemas;

        return $this;
    }

    /**
     * Remove cinemas
     *
     * @param \WA\BoBundle\Entity\Cinema $cinemas
     */
    public function removeCinema(\WA\BoBundle\Entity\Cinema $cinemas)
    {
        $this->cinemas->removeElement($cinemas);
    }

    /**
     * Get cinemas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCinemas()
    {
        return $this->cinemas;
    }

    /**
     * Add directors
     *
     * @param \WA\BoBundle\Entity\Directors $directors
     * @return Movies
     */
    public function addDirector(\WA\BoBundle\Entity\Directors $directors)
    {
        $this->directors[] = $directors;

        return $this;
    }

    /**
     * Remove directors
     *
     * @param \WA\BoBundle\Entity\Directors $directors
     */
    public function removeDirector(\WA\BoBundle\Entity\Directors $directors)
    {
        $this->directors->removeElement($directors);
    }

    /**
     * Get directors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * Add moviesRelated
     *
     * @param \WA\BoBundle\Entity\Movies $moviesRelated
     * @return Movies
     */
    public function addMoviesRelated(\WA\BoBundle\Entity\Movies $moviesRelated)
    {
        $this->moviesRelated[] = $moviesRelated;

        return $this;
    }

    /**
     * Remove moviesRelated
     *
     * @param \WA\BoBundle\Entity\Movies $moviesRelated
     */
    public function removeMoviesRelated(\WA\BoBundle\Entity\Movies $moviesRelated)
    {
        $this->moviesRelated->removeElement($moviesRelated);
    }

    /**
     * Get moviesRelated
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMoviesRelated()
    {
        return $this->moviesRelated;
    }

    /**
     * Add tags
     *
     * @param \WA\BoBundle\Entity\Tags $tags
     * @return Movies
     */
    public function addTag(\WA\BoBundle\Entity\Tags $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \WA\BoBundle\Entity\Tags $tags
     */
    public function removeTag(\WA\BoBundle\Entity\Tags $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add user
     *
     * @param \WA\BoBundle\Entity\User $user
     * @return Movies
     */
    public function addUser(\WA\BoBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \WA\BoBundle\Entity\User $user
     */
    public function removeUser(\WA\BoBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * Add comments
     *
     * @param \WA\BoBundle\Entity\Comments $comments
     * @return Movies
     */
    public function addComment(\WA\BoBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \WA\BoBundle\Entity\Comments $comments
     */
    public function removeComment(\WA\BoBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
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
        return 'uploads/movies';
    }

    public function upload()
    {
//        exit(var_dump('toto'));
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
     * Add sessions
     *
     * @param \WA\BoBundle\Entity\Sessions $sessions
     * @return Movies
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
