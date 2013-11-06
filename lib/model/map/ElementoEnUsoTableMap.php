<?php



/**
 * This class defines the structure of the 'elemento_en_uso' table.
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
class ElementoEnUsoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ElementoEnUsoTableMap';

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
        $this->setName('elemento_en_uso');
        $this->setPhpName('ElementoEnUso');
        $this->setClassname('ElementoEnUso');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, 0);
        $this->addColumn('hora_fecha_retiro', 'HoraFechaRetiro', 'TIMESTAMP', false, null, null);
        $this->addColumn('hora_fecha_entrega', 'HoraFechaEntrega', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('elemento_id', 'ElementoId', 'INTEGER', 'elemento', 'id', true, null, null);
        $this->addForeignKey('persona_id', 'PersonaId', 'INTEGER', 'persona', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Elemento', 'Elemento', RelationMap::MANY_TO_ONE, array('elemento_id' => 'id', ), null, null);
        $this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_id' => 'id', ), null, null);
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

} // ElementoEnUsoTableMap
