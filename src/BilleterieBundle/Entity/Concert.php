<?php

namespace BilleterieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Concert
 *
 * @ORM\Table(name="concert")
 * @ORM\Entity(repositoryClass="BilleterieBundle\Repository\ConcertRepository")
 */
class Concert
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
     /**
     * @var string
     * @Gedmo\Slug(fields={"name"}, updatable=false)
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date", type="date", length=255)
     */
    private $date;  
    /**
     * @var string
     *
     * @ORM\Column(name="time", type="time", length=255)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;  
    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price; 
    /**
     * @var string
     *
     * @ORM\Column(name="codP", type="string", length=5)
     */
    private $codP;
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlace", type="integer")
     */
    private $nbPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image; 
    
   

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="BilleterieBundle\Entity\State",  cascade={"persist"})
     */
    protected $state;
    
    
    public function __construct(){
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Concert
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
     * Set name
     *
     * @param string $name
     *
     * @return Concert
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param \Date $date
     *
     * @return Concert
     */
    public function setDate($date)
    {
        
            $this->date = $date;
        

        return $this;
    }

    /**
     * Get date
     *
     * @return \Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Concert
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Concert
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set codP
     *
     * @param string $codP
     *
     * @return Concert
     */
    public function setCodP($codP)
    {
        $this->codP = $codP;

        return $this;
    }

    /**
     * Get codP
     *
     * @return string
     */
    public function getCodP()
    {
        return $this->codP;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Concert
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set nbPlace
     *
     * @param integer $nbPlace
     *
     * @return Concert
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    /**
     * Get nbPlace
     *
     * @return integer
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Concert
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
     * Set description
     *
     * @param string $description
     *
     * @return Concert
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
     * Set state
     *
     * @param \BilleterieBundle\Entity\State $state
     *
     * @return Concert
     */
    public function setState(\BilleterieBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \BilleterieBundle\Entity\State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Concert
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }
}
