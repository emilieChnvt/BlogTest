<?php

namespace App\Repository;
use App\Entity\User;
use Attributes\TargetEntity;
use Core\Database\Database;
use Core\Repository\Repository;

#[TargetEntity(entityName: User::class)]
class UserRepository extends Repository
{

    public function findByUsername(string $name): User | bool
    {
        $query = $this->pdo->prepare('SELECT * FROM user WHERE name = :name');
        $query->execute(['name' => $name]);
        $query->setFetchMode(\PDO::FETCH_CLASS, User::class);
        return $query->fetch();
    }

    public function save(User $user): User | bool
    {
        $query = $this->pdo->prepare('INSERT INTO user (name, password) VALUES (:name, :password)');
        $query->execute([
            'name' => $user->getName(),
            'password' => $user->getPassword(),
        ]);
        return $this->find($this->pdo->lastInsertId());
    }


}