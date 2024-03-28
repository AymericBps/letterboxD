<?php
namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

Class User extends Entity {
  protected $_accessible = [
    '*' => 'true',
    'id' => false

  ];

  protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}