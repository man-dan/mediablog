<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

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
     * @ORM\Column(type="text")
     */
    private $descr;
    


    public function __construct()
    {
        parent::__construct();
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



}
