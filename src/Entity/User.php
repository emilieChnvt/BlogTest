<?php

namespace App\Entity;


use App\Repository\UserRepository;
use Attributes\DefaultEntity;
use Attributes\TargetRepository;
use Core\Attributes\Table;
use Core\Security\UserManagement;

#[Table(name: 'user')]
#[TargetRepository(repoName: UserRepository::class)]
class User extends UserManagement
{
    protected int $id;
    private string $name;
    protected string $password;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthenticator() :string
    {
        return $this->name;
    }
}