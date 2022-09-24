<?php

namespace Hillel\Application\Models;

/**
 * Class Model
 * @package Hillel\Application\Models
 */
abstract class Model
{
    /**
     * @return ?int
     */
    abstract public function getId():?int;

    /**
     * @param int $id
     * @return Model
     */
    public static function find(int $id): Model
    {
        return new static($id);
    }

    /**
     * @return string
     */
    public function create(): string
    {
        return 'INSERT INTO ' . self::getTableName() . ' (' . $this->generateInsertInto() . ') VALUES (' . $this->generateInsertValues() . ')';
    }

    /**
     * @return string
     */
    public function update(): string
    {
        return 'UPDATE ' . self::getTableName() . ' SET ' . $this->generateUpdateSet() . ' WHERE id = ' . $this->getId();
    }

    /**
     * @return string
     */
    public function delete(): string
    {
        return 'DELETE FROM ' . self::getTableName() . ' WHERE id = ' . $this->getId();
    }

    /**
     * @return string
     */
    public function save(): string
    {
        if (is_null($this->getId())) {
            return $this->create();
        } else {
            return $this->update();
        }
    }

    /**
     * @return string
     */
    protected static function getTableName(): string
    {
        $path = explode('\\', static::class);
        $className = array_pop($path);
        return strtolower($className);
    }

    /**
     * @return string
     */
    protected function generateUpdateSet(): string
    {
        $data = get_object_vars($this);
        $properties = array_keys($data);
        $set = '';

        foreach ($properties as $key => $property) {
            if ('id' === $property) {
                continue;
            }
            $set .= $property . ' = ';
            if( is_string($this->$property) && strlen($this->$property) === 0) {
                $set .= "''";
            } else {
                $set .= $this->$property;
            }
            if ($key !== array_key_last($properties)) {
                $set .= ', ';
            }
        }
        return $set;
    }

    /**
     * @return string
     */
    protected function generateInsertInto(): string
    {
        $data = get_object_vars($this);
        $properties = array_keys($data);

        $properties = array_filter($properties, function ($property){
            return $property !== 'id';
        });

        return implode(', ', $properties);
    }

    /**
     * @return string
     */
    protected function generateInsertValues(): string
    {
        $data = get_object_vars($this);
        $properties = array_keys($data);
        $properties = array_filter($properties, function ($property){
            return $property !== 'id';
        });
        $values = array_map(function ($property){
            if( is_string($this->$property) && strlen($this->$property) === 0) {
                return "''";
            } else {
                return $this->$property;
            }
        }, $properties);

        return implode(', ', $values);
    }
}