<?php
namespace Libs\Doctrine\Orm\Mapping;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\ORM\Mapping\ClassMetadata;

class DphQuoteStrategy extends \Doctrine\ORM\Mapping\DefaultQuoteStrategy
{
    /**
     * @var array
     */
    private $schemaAliases;

    public function __construct($schemaAliases)
    {
        $this->schemaAliases = $schemaAliases;
    }

    /**
     * Gets the (possibly quoted) primary table name for safe use in an SQL statement.
     *
     * @param ClassMetadata $class
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function getTableName(ClassMetadata $class, AbstractPlatform $platform)
    {
        $class->table = $this->applySchemaAlias($class->table);
        return parent::getTableName($class, $platform);
    }

    /**
     * {@inheritdoc}
     */
    public function getJoinTableName(array $association, ClassMetadata $class, AbstractPlatform $platform)
    {
        $association['joinTable'] = $this->applySchemaAlias($association['joinTable']);
        return parent::getJoinTableName($association, $class, $platform);
    }

    protected function applySchemaAlias(array $tableName)
    {
        if (isset($tableName['schema'])) {
            $tableName['schema'] = $this->replaceAliases($tableName['schema']);
        } else {
            $tableName['name'] = $this->replaceAliases($tableName['name']);
        }
        return $tableName;
    }
    /**
     * @param string $schemaName
     *
     * @return string
     */
    protected function replaceAliases(string $schemaName): string
    {
        return str_replace(array_keys($this->schemaAliases), array_values($this->schemaAliases), $schemaName);
    }
}
