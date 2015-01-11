<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 11/01/2015
 * Time: 11:40
 */

namespace Xusifob\PokemonBattle;

/**
 * Class Pokemon
 *
 * @package Xusifob\PokemonBattle
 *
 * * @Entity
 * @Table(name="pokemon")
 */
class Pokemon implements Model\PokemonInterface {

    /**
     * @var int;
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=60)
     */
    private $name;

    /**
     * @var int
     *
     * @Column(name="hp", type="smallint", length=3)
     */
    private $hp;

    /**
     * @var int
     */
    private $type;

    const TYPE_FIRE = 0;

    const TYPE_WATER = 1;

    const TYPE_PLANT = 2;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function setName($name)
    {
        if(is_string($name))
            $this->name = $name;
        else
            throw new \Exception('Name must be a string');

        return $this;
    }

    /**
     * @return int
     */
    public function getHP()
    {
        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function setHP($hp)
    {
        if(is_int($hp) && $hp>=0 && $hp <= 100)
            $this->hp = $hp;
        else
            throw new \Exception('HP must be between 0 and 100');

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function addHP($hp){
        if(is_int($hp) && $hp>0)
            $this->hp = min($this->hp + $hp, 100);
        else
            throw new \Exception('HP you add must be an integer > 0');

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function removeHP($hp){
        if(is_int($hp) && $hp>0)
            $this->hp = max($this->hp - $hp,0);
        else
            throw new \Exception('HP you remove must be an integer > 0');

        return $this;
    }


    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function setType($type)
    {
        if (true === in_array($type, [
                self::TYPE_FIRE,
                self::TYPE_WATER,
                self::TYPE_PLANT,
            ]))
            $this->type = $type;
        else
            throw new \Exception('type must be TYPE_FIRE, TYPE_WATER OR TYPE_PLANT');

        return $this;
    }


}