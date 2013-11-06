<?php



/**
 * This class defines the structure of the 'materia' table.
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
class MateriaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.MateriaTableMap';

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
        $this->setName('materia');
        $this->setPhpName('Materia');
        $this->setClassname('Materia');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nombre_materia', 'NombreMateria', 'VARCHAR', true, 30, null);
        $this->addColumn('fecha_inicio_cursada', 'FechaInicioCursada', 'DATE', true, null, null);
        $this->addColumn('fecha_fin_cursada', 'FechaFinCursada', 'DATE', true, null, null);
        $this->addForeignKey('carrera_id', 'CarreraId', 'INTEGER', 'carrera', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Carrera', 'Carrera', RelationMap::MANY_TO_ONE, array('carrera_id' => 'id', ), null, null);
        $this->addRelation('Comision', 'Comision', RelationMap::ONE_TO_MANY, array('id' => 'materia_id', ), null, null, 'Comisions');
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

} // MateriaTableMap
