<?php

namespace IIM\MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    // ..... other fields

    /**
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/pjpeg", "application/zip", "application/x-rar-compressed"}
     * )
     * @Vich\UploadableField(mapping="product_file", fileNameProperty="fileName")
     *
     * @var File $file
     */
    protected $file;

    /**
     * @ORM\Column(type="string", length=255, name="file_name")
     *
     * @var string $fileName
     */
    protected $fileName;



    /**
     * @param \Symfony\Component\HttpFoundation\File\File $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}


