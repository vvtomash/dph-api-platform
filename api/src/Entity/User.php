<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="manager_user",
 *     schema="@engine"
 * )
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column
     * @var string
     */
    private $email = '';

    /**
     * @ORM\Column(name="username")
     * @var string
     */
    private $name = '';

    /**
     * @ORM\OneToMany(targetEntity="Subscription",mappedBy="owner")
     * @var ArrayCollection|Subscription[]
     */
    private $subscriptions;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Subscription[]|ArrayCollection
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }
}
