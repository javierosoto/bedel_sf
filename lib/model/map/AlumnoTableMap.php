<?php



/**
 * This class defines the structure of the 'alumno' table.
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
class AlumnoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.AlumnoTableMap';

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
        $this->setName('alumno');
        $this->setPhpName('Alumno');
        $this->setClassname('Alumno');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('persona_id', 'PersonaId', 'INTEGER', 'persona', 'id', true, null, null);
        $this->addForeignKey('estado_alumno_id', 'EstadoAlumnoId', 'INTEGER', 'estado_alumno', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('EstadoAlumno', 'EstadoAlumno', RelationMap::MANY_TO_ONE, array('estado_alumno_id' => 'id', ), null, null);
        $this->addRelation('CarreraHasAlumno', 'CarreraHasAlumno', RelationMap::ONE_TO_MANY, array('id' => 'alumno_id', ), 'CASCADE', 'CASCADE', 'CarreraHasAlumnos');
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

} // AlumnoTableMap
