<?php

namespace Hillel\Application\Models;

/**
 * Class User
 * @package Hillel\Application\Models
 */
final class User extends Model
{
    /**
     * @var int|null
     */
    protected ?int $id;
    /**
     * @var string
     */
    public string $name;
    /**
     * @var string
     */
    public string $email;

    /**
     * User constructor.
     * @param int|null $id
     * @param string $name
     * @param string $email
     */
    public function __construct(?int $id = NULL, string $name = '', string $email = '')
    {
        $this->setId($id);
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id):void
    {
        $this->id = $id;
    }
}