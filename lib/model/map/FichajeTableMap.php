<?php



/**
 * This class defines the structure of the 'fichaje' table.
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
class FichajeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.FichajeTableMap';

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
        $this->setName('fichaje');
        $this->setPhpName('Fichaje');
        $this->setClassname('Fichaje');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('fecha_hora_entrada', 'FechaHoraEntrada', 'TIMESTAMP', false, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('fecha_hora_salida', 'FechaHoraSalida', 'TIMESTAMP', false, null, null);
        $this->addColumn('observacion', 'Observacion', 'VARCHAR', true, 140, null);
        $this->addForeignKey('comision_id', 'ComisionId', 'INTEGER', 'comision', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Comision', 'Comision', RelationMap::MANY_TO_ONE, array('comision_id' => 'id', ), null, null);
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

} // FichajeTableMap
