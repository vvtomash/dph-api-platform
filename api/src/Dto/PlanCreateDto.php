<?php
namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class PlanCreateDto
{
    /**
     * @Assert\NotBlank
     * @Assert\PositiveOrZero
     */
    private $count;

    /**
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $period;

    /**
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $buyPeriod;

    /**
     * @Assert\NotBlank
     * @Assert\PositiveOrZero
     */
    private $price;

    /**
     * @Assert\NotBlank
     */
    private $currency;

    public function __construct(
        int $count,
        int $period,
        int $buyPeriod,
        float $price,
        string $currency
    )
    {
        $this->count = $count;
        $this->period = $period;
        $this->buyPeriod = $buyPeriod;
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * @return int
     */
    public function getBuyPeriod(): int
    {
        return $this->buyPeriod;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
}
