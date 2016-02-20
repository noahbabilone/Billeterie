<?phpnamespace BilleterieBundle\Entity;use Doctrine\ORM\Mapping as ORM;use Symfony\Component\validator\Constraints as Assert;/** * Media * * @ORM\Table("Media") * @ORM\Entity * @ORM\HasLifecycleCallbacks */class Media{    /**     * @var integer     *     * @ORM\Column(name="id", type="integer")     * @ORM\Id     * @ORM\GeneratedValue(strategy="AUTO")     */    private $id;    /**     * @var \DateTime     *     * @ORM\Column(name="updated_at",type="datetime", nullable=true)     */    private $updateAt;    /**     * @ORM\PostLoad()     */    public function postLoad()    {        $this->updateAt = new \DateTime();    }    /**     * @ORM\Column(type="string",length=255,nullable=true)     * @Assert\NotBlank     */    public $name;    /**     * @ORM\Column(type="string",length=255, nullable=true)     */    public $path;    /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */    public $file;    public $tempFile;    public $oldFile;    public function getUploadRootDir()    {        return __dir__ . '/../../../web/uploads/images';    }    public function getAbsolutePath()    {        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;    }    public function getAssetPath()    {        if ($this->path == null) {            return 'uploads/images/400x300.png';        } else {            return 'uploads/images/' . $this->path;        }    }    /**     * @ORM\PrePersist()     * Preupdate()     */    public function preUpload()    {        $this->tempFile = $this->getAbsolutePath();        $this->oldFile = $this->getPath();        $this->updateAt = new \DateTime();        if (null !== $this->file)            $this->path = sha1(uniqid(mt_rand(), true)) . '.' . $this->file->guessExtension();    }    /**     * @ORM\PostPersist()     * PostUpdate()     */    public function upload()    {        if (null !== $this->file) {            $this->file->move($this->getUploadRootDir(), $this->path);            unset($this->file);            if ($this->oldFile != null) unlink($this->tempFile);        }    }    /**     * @ORM\PreRemove()     */    public function preRemoveUpload()    {        $this->tempFile = $this->getAbsolutePath();    }    /**     * @ORM\PostRemove()     */    public function removeUpload()    {        if (file_exists($this->tempFile)) unlink($this->tempFile);    }    /**     * Get id     *     * @return integer     */    public function getId()    {        return $this->id;    }    public function getPath()    {        return $this->path;    }    public function setPath($path)    {        $this->path = $path;        $this->setFile($path);    }    public function getName()    {        var_dump($this->name);        return $this->name;    }    public function getFile()    {        return $this->file;    }    public function setFile($file)    {        $this->file = $file;    }}