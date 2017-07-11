<?php

/**
 * Created by PhpStorm.
 * User: Stepanov
 * Date: 12.04.17
 * Time: 14:28
 */

namespace AppBundle\Helper;

use Doctrine\ORM\EntityManager;
use Application\Sonata\MediaBundle\Entity\Gallery as MediaGallery;

class Gallery
{

    protected $manager;

    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function set($object)
    {
        $media_gallery = new MediaGallery();
        $media_gallery->setName($object->getTitle());
        $media_gallery->setContext('gallery');
        $media_gallery->setEnabled(true);
        $this->manager->persist($media_gallery);
        $this->manager->flush($media_gallery);
        $object->setGallery($media_gallery);
    }

    public function remove($object)
    {
        if ($gallery = $object->getGallery()) {
            foreach ($gallery->getGalleryHasMedias() as $val) {
                $this->manager->remove($val->getMedia());
            }
            $this->manager->remove($object->getGallery());
            $this->manager->flush();
        }
    }

}