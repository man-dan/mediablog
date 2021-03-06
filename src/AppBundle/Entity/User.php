<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_user")
 */
class User extends BaseUser
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $avatar;

    /**
     * @ORM\OneToMany(targetEntity="Newsn", mappedBy="user")
     */
    private $news;


     /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Newsn", inversedBy="users")
     * @ORM\JoinTable(name="users_news")
     */
    private $newsn;
    


    public function __construct()
    {
        parent::__construct();
        
        $this->newsn = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descr
     *
     * @param string $descr
     *
     * @return User
     */

    /**
     * Set avatar
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $avatar
     *
     * @return User
     */
    public function setAvatar(\Application\Sonata\MediaBundle\Entity\Media $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add news
     *
     * @param \AppBundle\Entity\Newsn $news
     *
     * @return User
     */
    public function addNews(\AppBundle\Entity\Newsn $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \AppBundle\Entity\Newsn $news
     */
    public function removeNews(\AppBundle\Entity\Newsn $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Add newsn
     *
     * @param \AppBundle\Entity\Newsn $newsn
     *
     * @return User
     */
    public function addNewsn(\AppBundle\Entity\Newsn $newsn)
    {
        $this->newsn[] = $newsn;

        return $this;
    }

    /**
     * Remove newsn
     *
     * @param \AppBundle\Entity\Newsn $newsn
     */
    public function removeNewsn(\AppBundle\Entity\Newsn $newsn)
    {
        $this->newsn->removeElement($newsn);
    }

    /**
     * Get newsn
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNewsn()
    {
        return $this->newsn;
    }
}
