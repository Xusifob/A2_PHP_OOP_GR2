<?php


namespace Xusifob\PokemonBattle;


class Trainer implements Model\TrainerInterface
{

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var int
     */
    private $id;

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function setPassword($password)
    {
        if(is_string($password))
            $this->password = $password;
        else
            throw new \Exception('Password must be a string');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function setUserName($userName)
    {
        if(is_string($userName))
            $this->userName = $userName;
        else
            throw new \Exception('username must be a string');

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}