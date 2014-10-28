<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D64992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649A0D96FBF", columns={"email_canonical"})})
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;



    /**
     * @var string
     * @Assert\NotBlank(message = "La ville est vide")
     * @Assert\Length(
     *      min = "3",
     *      max = "10",
     *      minMessage = "La ville doit faire au moins {{ limit }} caractères",
     *      maxMessage = "La ville nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="ville", type="string", length=200, nullable=true)
     */
    protected $ville;

    /**
     * @var integer
     * @Assert\NotBlank(message = "Le zipcode est vide")
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="zipcode", type="integer", nullable=true)
     */
    protected $zipcode;

    /**
     * @var string
     * @Assert\NotBlank(message = "Le tel est vide")
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="tel", type="string", length=250, nullable=true)
     */
    protected $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=100, nullable=true)
     */
    protected $ip;



    /**
     * @var string
     *
     * @ORM\Column(name="googleId", type="string", length=255, nullable=true)
     */
    protected $googleid;

    /**
     * @var string
     *
     * @ORM\Column(name="googleAccessToken", type="string", length=255, nullable=true)
     */
    protected $googleaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="flickrId", type="string", length=255, nullable=true)
     */
    protected $flickrid;

    /**
     * @var string
     *
     * @ORM\Column(name="flickrAccessToken", type="string", length=255, nullable=true)
     */
    protected $flickraccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="githubId", type="string", length=255, nullable=true)
     */
    protected $githubid;

    /**
     * @var string
     *
     * @ORM\Column(name="githubAccessToken", type="string", length=255, nullable=true)
     */
    protected $githubaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinAccessToken", type="string", length=255, nullable=true)
     */
    protected $linkedinaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinId", type="string", length=255, nullable=true)
     */
    protected $linkedinid;


    /**
     * @var string
     *
     * @ORM\Column(name="extras", type="text", nullable=true)
     */
    protected $extras;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    protected $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    protected $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=300, nullable=true)
     */
    protected $facebookid;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookAccessToken", type="string", length=300, nullable=true)
     */
    protected $facebookaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterId", type="string", length=255, nullable=true)
     */
    protected $twitterid;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterAccessToken", type="string", length=255, nullable=true)
     */
    protected $twitteraccesstoken;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastActivity", type="datetime", nullable=true)
     */
    protected $lastactivity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Movies", inversedBy="user")
     * @ORM\JoinTable(name="user_favoris",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   }
     * )
     */
    protected $movies;

    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="user")
     */
    protected $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }



    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return User
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
     * Set zipcode
     *
     * @param integer $zipcode
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return User
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }


    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }



    /**
     * Get expired
     *
     * @return boolean 
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return User
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     * @return User
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string 
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set emailCanonical
     *
     * @param string $emailCanonical
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string 
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }



    /**
     * Get expiresAt
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     * @return User
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }



    /**
     * Get passwordRequestedAt
     *
     * @return \DateTime 
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Set googleid
     *
     * @param string $googleid
     * @return User
     */
    public function setGoogleid($googleid)
    {
        $this->googleid = $googleid;

        return $this;
    }

    /**
     * Get googleid
     *
     * @return string 
     */
    public function getGoogleid()
    {
        return $this->googleid;
    }

    /**
     * Set googleaccesstoken
     *
     * @param string $googleaccesstoken
     * @return User
     */
    public function setGoogleaccesstoken($googleaccesstoken)
    {
        $this->googleaccesstoken = $googleaccesstoken;

        return $this;
    }

    /**
     * Get googleaccesstoken
     *
     * @return string 
     */
    public function getGoogleaccesstoken()
    {
        return $this->googleaccesstoken;
    }

    /**
     * Set flickrid
     *
     * @param string $flickrid
     * @return User
     */
    public function setFlickrid($flickrid)
    {
        $this->flickrid = $flickrid;

        return $this;
    }

    /**
     * Get flickrid
     *
     * @return string 
     */
    public function getFlickrid()
    {
        return $this->flickrid;
    }

    /**
     * Set flickraccesstoken
     *
     * @param string $flickraccesstoken
     * @return User
     */
    public function setFlickraccesstoken($flickraccesstoken)
    {
        $this->flickraccesstoken = $flickraccesstoken;

        return $this;
    }

    /**
     * Get flickraccesstoken
     *
     * @return string 
     */
    public function getFlickraccesstoken()
    {
        return $this->flickraccesstoken;
    }

    /**
     * Set githubid
     *
     * @param string $githubid
     * @return User
     */
    public function setGithubid($githubid)
    {
        $this->githubid = $githubid;

        return $this;
    }

    /**
     * Get githubid
     *
     * @return string 
     */
    public function getGithubid()
    {
        return $this->githubid;
    }

    /**
     * Set githubaccesstoken
     *
     * @param string $githubaccesstoken
     * @return User
     */
    public function setGithubaccesstoken($githubaccesstoken)
    {
        $this->githubaccesstoken = $githubaccesstoken;

        return $this;
    }

    /**
     * Get githubaccesstoken
     *
     * @return string 
     */
    public function getGithubaccesstoken()
    {
        return $this->githubaccesstoken;
    }

    /**
     * Set linkedinaccesstoken
     *
     * @param string $linkedinaccesstoken
     * @return User
     */
    public function setLinkedinaccesstoken($linkedinaccesstoken)
    {
        $this->linkedinaccesstoken = $linkedinaccesstoken;

        return $this;
    }

    /**
     * Get linkedinaccesstoken
     *
     * @return string 
     */
    public function getLinkedinaccesstoken()
    {
        return $this->linkedinaccesstoken;
    }

    /**
     * Set linkedinid
     *
     * @param string $linkedinid
     * @return User
     */
    public function setLinkedinid($linkedinid)
    {
        $this->linkedinid = $linkedinid;

        return $this;
    }

    /**
     * Get linkedinid
     *
     * @return string 
     */
    public function getLinkedinid()
    {
        return $this->linkedinid;
    }



    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set extras
     *
     * @param string $extras
     * @return User
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;

        return $this;
    }

    /**
     * Get extras
     *
     * @return string 
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return User
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return User
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set facebookid
     *
     * @param string $facebookid
     * @return User
     */
    public function setFacebookid($facebookid)
    {
        $this->facebookid = $facebookid;

        return $this;
    }

    /**
     * Get facebookid
     *
     * @return string 
     */
    public function getFacebookid()
    {
        return $this->facebookid;
    }

    /**
     * Set facebookaccesstoken
     *
     * @param string $facebookaccesstoken
     * @return User
     */
    public function setFacebookaccesstoken($facebookaccesstoken)
    {
        $this->facebookaccesstoken = $facebookaccesstoken;

        return $this;
    }

    /**
     * Get facebookaccesstoken
     *
     * @return string 
     */
    public function getFacebookaccesstoken()
    {
        return $this->facebookaccesstoken;
    }

    /**
     * Set twitterid
     *
     * @param string $twitterid
     * @return User
     */
    public function setTwitterid($twitterid)
    {
        $this->twitterid = $twitterid;

        return $this;
    }

    /**
     * Get twitterid
     *
     * @return string 
     */
    public function getTwitterid()
    {
        return $this->twitterid;
    }

    /**
     * Set twitteraccesstoken
     *
     * @param string $twitteraccesstoken
     * @return User
     */
    public function setTwitteraccesstoken($twitteraccesstoken)
    {
        $this->twitteraccesstoken = $twitteraccesstoken;

        return $this;
    }

    /**
     * Get twitteraccesstoken
     *
     * @return string 
     */
    public function getTwitteraccesstoken()
    {
        return $this->twitteraccesstoken;
    }



    /**
     * Get credentialsExpired
     *
     * @return boolean 
     */
    public function getCredentialsExpired()
    {
        return $this->credentialsExpired;
    }



    /**
     * Get credentialsExpireAt
     *
     * @return \DateTime 
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return User
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set lastactivity
     *
     * @param \DateTime $lastactivity
     * @return User
     */
    public function setLastactivity($lastactivity)
    {
        $this->lastactivity = $lastactivity;

        return $this;
    }

    /**
     * Get lastactivity
     *
     * @return \DateTime 
     */
    public function getLastactivity()
    {
        return $this->lastactivity;
    }

    /**
     * Add movies
     *
     * @param \WA\BoBundle\Entity\Movies $movies
     * @return User
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
        return $this->getEmail();
    }

    /**
     * Add comments
     *
     * @param \WA\BoBundle\Entity\Comments $comments
     * @return User
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
}
