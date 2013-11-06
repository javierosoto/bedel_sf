<?php



/**
 * This class defines the structure of the 'persona' table.
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
class PersonaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.PersonaTableMap';

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
        $this->setName('persona');
        $this->setPhpName('Persona');
        $this->setClassname('Persona');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nro_doc', 'NroDoc', 'VARCHAR', true, 10, null);
        $this->addColumn('ape_nom', 'ApeNom', 'VARCHAR', true, 100, null);
        $this->addColumn('direccion', 'Direccion', 'VARCHAR', true, 100, null);
        $this->addColumn('fecha_nac', 'FechaNac', 'DATE', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 100, null);
        $this->addForeignKey('sexo_id', 'SexoId', 'INTEGER', 'sexo', 'id', true, null, null);
        $this->addForeignKey('tipo_doc_id', 'TipoDocId', 'INTEGER', 'tipo_doc', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sexo', 'Sexo', RelationMap::MANY_TO_ONE, array('sexo_id' => 'id', ), null, null);
        $this->addRelation('TipoDoc', 'TipoDoc', RelationMap::MANY_TO_ONE, array('tipo_doc_id' => 'id', ), null, null);
        $this->addRelation('Alumno', 'Alumno', RelationMap::ONE_TO_MANY, array('id' => 'persona_id', ), 'CASCADE', 'CASCADE', 'Alumnos');
        $this->addRelation('ElementoEnUso', 'ElementoEnUso', RelationMap::ONE_TO_MANY, array('id' => 'persona_id', ), null, null, 'ElementoEnUsos');
        $this->addRelation('Profesor', 'Profesor', RelationMap::ONE_TO_MANY, array('id' => 'persona_id', ), null, null, 'Profesors');
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

} // PersonaTableMap
