<?php

namespace Nin\Libs\Auth;

class Auth implements Factory
{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

}
