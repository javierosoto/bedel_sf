<?php



/**
 * This class defines the structure of the 'comision' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ComisionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ComisionTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('comision');
        $this->setPhpName('Comision');
        $this->setClassname('Comision');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('descripcion_comision', 'DescripcionComision', 'VARCHAR', true, 30, null);
        $this->addForeignKey('materia_id', 'MateriaId', 'INTEGER', 'materia', 'id', true, null, null);
        $this->addForeignKey('aula_id', 'AulaId', 'INTEGER', 'aula', 'id', true, null, null);
        $this->addForeignKey('profesor_id', 'ProfesorId', 'INTEGER', 'profesor', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Materia', 'Materia', RelationMap::MANY_TO_ONE, array('materia_id' => 'id', ), null, null);
        $this->addRelation('Aula', 'Aula', RelationMap::MANY_TO_ONE, array('aula_id' => 'id', ), null, null);
        $this->addRelation('Profesor', 'Profesor', RelationMap::MANY_TO_ONE, array('profesor_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Fichaje', 'Fichaje', RelationMap::ONE_TO_MANY, array('id' => 'comision_id', ), null, null, 'Fichajes');
        $this->addRelation('TemasDados', 'TemasDados', RelationMap::ONE_TO_MANY, array('id' => 'comision_id', ), null, null, 'TemasDadoss');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' =>  array (
  'form' => 'true',
  'filter' => 'true',
),
            'symfony_behaviors' =>  array (
),
        );
    } // getBehaviors()

} // ComisionTableMap
