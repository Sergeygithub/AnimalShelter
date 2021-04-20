<?php

namespace AnimalShelter\Entity;

class Animal
{
    const STATUS_ADOPTED = 'adopted';

    const STATUS_TRANSMITTED = 'transmitted';

    const ANIMAL_TYPE_CAT = 'cat';

    const ANIMAL_TYPE_DOG = 'dog';

    const ANIMAL_TYPE_TURTLE = 'turtle';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $adoptedAt;

    /**
     * @var \DateTime
     */
    private $transmittedAt;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        if (!in_array($type, $this->getAnimalTypes())) {
            throw new \InvalidArgumentException('Invalid type');
        }
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        if (!in_array($status, $this->getAnimalStatuses())) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getAdoptedAt(): \DateTime
    {
        return $this->adoptedAt;
    }

    /**
     * @param \DateTime $adoptedAt
     */
    public function setAdoptedAt(\DateTime $adoptedAt): void
    {
        $this->adoptedAt = $adoptedAt;
    }

    /**
     * @return \DateTime
     */
    public function getTransmittedAt(): \DateTime
    {
        return $this->transmittedAt;
    }

    /**
     * @param \DateTime $transmittedAt
     */
    public function setTransmittedAt(\DateTime $transmittedAt): void
    {
        $this->transmittedAt = $transmittedAt;
    }

    public function getAnimalTypes(): array
    {
        return [
            self::ANIMAL_TYPE_CAT,
            self::ANIMAL_TYPE_DOG,
            self::ANIMAL_TYPE_TURTLE,
        ];
    }

    public function getAnimalStatuses(): array
    {
        return [
            self::STATUS_ADOPTED,
            self::STATUS_TRANSMITTED,
        ];
    }
}
