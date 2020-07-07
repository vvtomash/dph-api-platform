<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="buyer_subscription",
 *     schema="@deposit"
 * )
 */
class Subscription
{
    /**
     * @ORM\Column(type="integer",name="subscription_itansaction_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column
     */
    private $count;

    /**
     * @ORM\Column
     * @return string
     */
    private $price;
    /**
     * @ORM\Column
     * @return string
     */
    private $currency;
    /**
     * @ORM\Column(type="integer")
     * @return int
     */
    private $period;
    /**
     * @ORM\Column(type="integer",name="buy_period")
     * @return int
     */
    private $buyPeriod;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subscriptions")
     * @var User
     */
    private $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }


    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }


    /**
     * @return mixed
     */
    public function getBuyPeriod()
    {
        return $this->buyPeriod;
    }
}
