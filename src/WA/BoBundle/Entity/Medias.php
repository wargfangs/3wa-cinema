<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Medias
 *
 * @ORM\Table(name="medias")
 * @ORM\Entity(repositoryClass="WA\BoBundle\Entity\MediasRepository")
 */
class Medias
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
     * @var integer
     * @Assert\NotBlank(message = "Le movies_id est vide")
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="movies_id", type="integer", nullable=true)
     */
    private $moviesId;

    /**
     * @var integer
     * @Assert\NotBlank(message = "La nature est vide")
     * @Assert\Type(
     *      type   = "numeric",
     *      message = "La valeur {{ value }} n est pas un type {{ type }} valide",
     * )
     * @ORM\Column(name="nature", type="integer", nullable=true)
     */
    private $nature = '1';

    /**
     * @var string
     * @Assert\NotBlank(message = "L'image est vide")
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 400,
     *     minHeight = 200,
     *     maxHeight = 400
     * )
     * @ORM\Column(name="picture", type="text", nullable=true)
     */
    private $picture;

    /**
     * @var string
     * @Assert\NotBlank(message = "La vidéo est vide")
     * @Assert\Url(message = "L'url est incorrecte")
     * @ORM\Column(name="video", type="text", nullable=true)
     */
    private $video;



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
     * Set moviesId
     *
     * @param integer $moviesId
     * @return Medias
     */
    public function setMoviesId($moviesId)
    {
        $this->moviesId = $moviesId;

        return $this;
    }

    /**
     * Get moviesId
     *
     * @return integer 
     */
    public function getMoviesId()
    {
        return $this->moviesId;
    }

    /**
     * Set nature
     *
     * @param integer $nature
     * @return Medias
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return integer 
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Medias
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Medias
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    public function __toString()
    {
        return $this->getPicture();
    }
}
