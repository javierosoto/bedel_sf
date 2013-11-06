<?php


/**
 * Base class that represents a row from the 'persona' table.
 *
 *
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePersona extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PersonaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PersonaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the nro_doc field.
     * @var        string
     */
    protected $nro_doc;

    /**
     * The value for the ape_nom field.
     * @var        string
     */
    protected $ape_nom;

    /**
     * The value for the direccion field.
     * @var        string
     */
    protected $direccion;

    /**
     * The value for the fecha_nac field.
     * @var        string
     */
    protected $fecha_nac;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the sexo_id field.
     * @var        int
     */
    protected $sexo_id;

    /**
     * The value for the tipo_doc_id field.
     * @var        int
     */
    protected $tipo_doc_id;

    /**
     * @var        Sexo
     */
    protected $aSexo;

    /**
     * @var        TipoDoc
     */
    protected $aTipoDoc;

    /**
     * @var        PropelObjectCollection|Alumno[] Collection to store aggregation of Alumno objects.
     */
    protected $collAlumnos;
    protected $collAlumnosPartial;

    /**
     * @var        PropelObjectCollection|ElementoEnUso[] Collection to store aggregation of ElementoEnUso objects.
     */
    protected $collElementoEnUsos;
    protected $collElementoEnUsosPartial;

    /**
     * @var        PropelObjectCollection|Profesor[] Collection to store aggregation of Profesor objects.
     */
    protected $collProfesors;
    protected $collProfesorsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alumnosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $elementoEnUsosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $profesorsScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [nro_doc] column value.
     *
     * @return string
     */
    public function getNroDoc()
    {
        return $this->nro_doc;
    }

    /**
     * Get the [ape_nom] column value.
     *
     * @return string
     */
    public function getApeNom()
    {
        return $this->ape_nom;
    }

    /**
     * Get the [direccion] column value.
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_nac] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaNac($format = 'Y-m-d')
    {
        if ($this->fecha_nac === null) {
            return null;
        }

        if ($this->fecha_nac === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_nac);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_nac, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [sexo_id] column value.
     *
     * @return int
     */
    public function getSexoId()
    {
        return $this->sexo_id;
    }

    /**
     * Get the [tipo_doc_id] column value.
     *
     * @return int
     */
    public function getTipoDocId()
    {
        return $this->tipo_doc_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Persona The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PersonaPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [nro_doc] column.
     *
     * @param string $v new value
     * @return Persona The current object (for fluent API support)
     */
    public function setNroDoc($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nro_doc !== $v) {
            $this->nro_doc = $v;
            $this->modifiedColumns[] = PersonaPeer::NRO_DOC;
        }


        return $this;
    } // setNroDoc()

    /**
     * Set the value of [ape_nom] column.
     *
     * @param string $v new value
     * @return Persona The current object (for fluent API support)
     */
    public function setApeNom($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ape_nom !== $v) {
            $this->ape_nom = $v;
            $this->modifiedColumns[] = PersonaPeer::APE_NOM;
        }


        return $this;
    } // setApeNom()

    /**
     * Set the value of [direccion] column.
     *
     * @param string $v new value
     * @return Persona The current object (for fluent API support)
     */
    public function setDireccion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->direccion !== $v) {
            $this->direccion = $v;
            $this->modifiedColumns[] = PersonaPeer::DIRECCION;
        }


        return $this;
    } // setDireccion()

    /**
     * Sets the value of [fecha_nac] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Persona The current object (for fluent API support)
     */
    public function setFechaNac($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_nac !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_nac !== null && $tmpDt = new DateTime($this->fecha_nac)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_nac = $newDateAsString;
                $this->modifiedColumns[] = PersonaPeer::FECHA_NAC;
            }
        } // if either are not null


        return $this;
    } // setFechaNac()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return Persona The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = PersonaPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [sexo_id] column.
     *
     * @param int $v new value
     * @return Persona The current object (for fluent API support)
     */
    public function setSexoId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sexo_id !== $v) {
            $this->sexo_id = $v;
            $this->modifiedColumns[] = PersonaPeer::SEXO_ID;
        }

        if ($this->aSexo !== null && $this->aSexo->getId() !== $v) {
            $this->aSexo = null;
        }


        return $this;
    } // setSexoId()

    /**
     * Set the value of [tipo_doc_id] column.
     *
     * @param int $v new value
     * @return Persona The current object (for fluent API support)
     */
    public function setTipoDocId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tipo_doc_id !== $v) {
            $this->tipo_doc_id = $v;
            $this->modifiedColumns[] = PersonaPeer::TIPO_DOC_ID;
        }

        if ($this->aTipoDoc !== null && $this->aTipoDoc->getId() !== $v) {
            $this->aTipoDoc = null;
        }


        return $this;
    } // setTipoDocId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nro_doc = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->ape_nom = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->direccion = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->fecha_nac = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->email = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->sexo_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->tipo_doc_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = PersonaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Persona object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aSexo !== null && $this->sexo_id !== $this->aSexo->getId()) {
            $this->aSexo = null;
        }
        if ($this->aTipoDoc !== null && $this->tipo_doc_id !== $this->aTipoDoc->getId()) {
            $this->aTipoDoc = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PersonaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSexo = null;
            $this->aTipoDoc = null;
            $this->collAlumnos = null;

            $this->collElementoEnUsos = null;

            $this->collProfesors = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PersonaQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BasePersona:delete:pre') as $callable)
            {
              if (call_user_func($callable, $this, $con))
              {
                $con->commit();
                return;
              }
            }

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                // symfony_behaviors behavior
                foreach (sfMixer::getCallables('BasePersona:delete:post') as $callable)
                {
                  call_user_func($callable, $this, $con);
                }

                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BasePersona:save:pre') as $callable)
            {
              if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
              {
                  $con->commit();
                return $affectedRows;
              }
            }

            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                // symfony_behaviors behavior
                foreach (sfMixer::getCallables('BasePersona:save:post') as $callable)
                {
                  call_user_func($callable, $this, $con, $affectedRows);
                }

                PersonaPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSexo !== null) {
                if ($this->aSexo->isModified() || $this->aSexo->isNew()) {
                    $affectedRows += $this->aSexo->save($con);
                }
                $this->setSexo($this->aSexo);
            }

            if ($this->aTipoDoc !== null) {
                if ($this->aTipoDoc->isModified() || $this->aTipoDoc->isNew()) {
                    $affectedRows += $this->aTipoDoc->save($con);
                }
                $this->setTipoDoc($this->aTipoDoc);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->alumnosScheduledForDeletion !== null) {
                if (!$this->alumnosScheduledForDeletion->isEmpty()) {
                    AlumnoQuery::create()
                        ->filterByPrimaryKeys($this->alumnosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->alumnosScheduledForDeletion = null;
                }
            }

            if ($this->collAlumnos !== null) {
                foreach ($this->collAlumnos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->elementoEnUsosScheduledForDeletion !== null) {
                if (!$this->elementoEnUsosScheduledForDeletion->isEmpty()) {
                    ElementoEnUsoQuery::create()
                        ->filterByPrimaryKeys($this->elementoEnUsosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->elementoEnUsosScheduledForDeletion = null;
                }
            }

            if ($this->collElementoEnUsos !== null) {
                foreach ($this->collElementoEnUsos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->profesorsScheduledForDeletion !== null) {
                if (!$this->profesorsScheduledForDeletion->isEmpty()) {
                    ProfesorQuery::create()
                        ->filterByPrimaryKeys($this->profesorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->profesorsScheduledForDeletion = null;
                }
            }

            if ($this->collProfesors !== null) {
                foreach ($this->collProfesors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = PersonaPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersonaPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersonaPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(PersonaPeer::NRO_DOC)) {
            $modifiedColumns[':p' . $index++]  = '`nro_doc`';
        }
        if ($this->isColumnModified(PersonaPeer::APE_NOM)) {
            $modifiedColumns[':p' . $index++]  = '`ape_nom`';
        }
        if ($this->isColumnModified(PersonaPeer::DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = '`direccion`';
        }
        if ($this->isColumnModified(PersonaPeer::FECHA_NAC)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_nac`';
        }
        if ($this->isColumnModified(PersonaPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(PersonaPeer::SEXO_ID)) {
            $modifiedColumns[':p' . $index++]  = '`sexo_id`';
        }
        if ($this->isColumnModified(PersonaPeer::TIPO_DOC_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tipo_doc_id`';
        }

        $sql = sprintf(
            'INSERT INTO `persona` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`nro_doc`':
                        $stmt->bindValue($identifier, $this->nro_doc, PDO::PARAM_STR);
                        break;
                    case '`ape_nom`':
                        $stmt->bindValue($identifier, $this->ape_nom, PDO::PARAM_STR);
                        break;
                    case '`direccion`':
                        $stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
                        break;
                    case '`fecha_nac`':
                        $stmt->bindValue($identifier, $this->fecha_nac, PDO::PARAM_STR);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`sexo_id`':
                        $stmt->bindValue($identifier, $this->sexo_id, PDO::PARAM_INT);
                        break;
                    case '`tipo_doc_id`':
                        $stmt->bindValue($identifier, $this->tipo_doc_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSexo !== null) {
                if (!$this->aSexo->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSexo->getValidationFailures());
                }
            }

            if ($this->aTipoDoc !== null) {
                if (!$this->aTipoDoc->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTipoDoc->getValidationFailures());
                }
            }


            if (($retval = PersonaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlumnos !== null) {
                    foreach ($this->collAlumnos as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collElementoEnUsos !== null) {
                    foreach ($this->collElementoEnUsos as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProfesors !== null) {
                    foreach ($this->collProfesors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PersonaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getNroDoc();
                break;
            case 2:
                return $this->getApeNom();
                break;
            case 3:
                return $this->getDireccion();
                break;
            case 4:
                return $this->getFechaNac();
                break;
            case 5:
                return $this->getEmail();
                break;
            case 6:
                return $this->getSexoId();
                break;
            case 7:
                return $this->getTipoDocId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Persona'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Persona'][$this->getPrimaryKey()] = true;
        $keys = PersonaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNroDoc(),
            $keys[2] => $this->getApeNom(),
            $keys[3] => $this->getDireccion(),
            $keys[4] => $this->getFechaNac(),
            $keys[5] => $this->getEmail(),
            $keys[6] => $this->getSexoId(),
            $keys[7] => $this->getTipoDocId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSexo) {
                $result['Sexo'] = $this->aSexo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTipoDoc) {
                $result['TipoDoc'] = $this->aTipoDoc->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAlumnos) {
                $result['Alumnos'] = $this->collAlumnos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collElementoEnUsos) {
                $result['ElementoEnUsos'] = $this->collElementoEnUsos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProfesors) {
                $result['Profesors'] = $this->collProfesors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PersonaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setNroDoc($value);
                break;
            case 2:
                $this->setApeNom($value);
                break;
            case 3:
                $this->setDireccion($value);
                break;
            case 4:
                $this->setFechaNac($value);
                break;
            case 5:
                $this->setEmail($value);
                break;
            case 6:
                $this->setSexoId($value);
                break;
            case 7:
                $this->setTipoDocId($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = PersonaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNroDoc($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setApeNom($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDireccion($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFechaNac($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSexoId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTipoDocId($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PersonaPeer::DATABASE_NAME);

        if ($this->isColumnModified(PersonaPeer::ID)) $criteria->add(PersonaPeer::ID, $this->id);
        if ($this->isColumnModified(PersonaPeer::NRO_DOC)) $criteria->add(PersonaPeer::NRO_DOC, $this->nro_doc);
        if ($this->isColumnModified(PersonaPeer::APE_NOM)) $criteria->add(PersonaPeer::APE_NOM, $this->ape_nom);
        if ($this->isColumnModified(PersonaPeer::DIRECCION)) $criteria->add(PersonaPeer::DIRECCION, $this->direccion);
        if ($this->isColumnModified(PersonaPeer::FECHA_NAC)) $criteria->add(PersonaPeer::FECHA_NAC, $this->fecha_nac);
        if ($this->isColumnModified(PersonaPeer::EMAIL)) $criteria->add(PersonaPeer::EMAIL, $this->email);
        if ($this->isColumnModified(PersonaPeer::SEXO_ID)) $criteria->add(PersonaPeer::SEXO_ID, $this->sexo_id);
        if ($this->isColumnModified(PersonaPeer::TIPO_DOC_ID)) $criteria->add(PersonaPeer::TIPO_DOC_ID, $this->tipo_doc_id);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(PersonaPeer::DATABASE_NAME);
        $criteria->add(PersonaPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Persona (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNroDoc($this->getNroDoc());
        $copyObj->setApeNom($this->getApeNom());
        $copyObj->setDireccion($this->getDireccion());
        $copyObj->setFechaNac($this->getFechaNac());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setSexoId($this->getSexoId());
        $copyObj->setTipoDocId($this->getTipoDocId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAlumnos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlumno($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getElementoEnUsos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addElementoEnUso($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProfesors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProfesor($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Persona Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return PersonaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PersonaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sexo object.
     *
     * @param             Sexo $v
     * @return Persona The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSexo(Sexo $v = null)
    {
        if ($v === null) {
            $this->setSexoId(NULL);
        } else {
            $this->setSexoId($v->getId());
        }

        $this->aSexo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sexo object, it will not be re-added.
        if ($v !== null) {
            $v->addPersona($this);
        }


        return $this;
    }


    /**
     * Get the associated Sexo object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sexo The associated Sexo object.
     * @throws PropelException
     */
    public function getSexo(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSexo === null && ($this->sexo_id !== null) && $doQuery) {
            $this->aSexo = SexoQuery::create()->findPk($this->sexo_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSexo->addPersonas($this);
             */
        }

        return $this->aSexo;
    }

    /**
     * Declares an association between this object and a TipoDoc object.
     *
     * @param             TipoDoc $v
     * @return Persona The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTipoDoc(TipoDoc $v = null)
    {
        if ($v === null) {
            $this->setTipoDocId(NULL);
        } else {
            $this->setTipoDocId($v->getId());
        }

        $this->aTipoDoc = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TipoDoc object, it will not be re-added.
        if ($v !== null) {
            $v->addPersona($this);
        }


        return $this;
    }


    /**
     * Get the associated TipoDoc object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TipoDoc The associated TipoDoc object.
     * @throws PropelException
     */
    public function getTipoDoc(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTipoDoc === null && ($this->tipo_doc_id !== null) && $doQuery) {
            $this->aTipoDoc = TipoDocQuery::create()->findPk($this->tipo_doc_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTipoDoc->addPersonas($this);
             */
        }

        return $this->aTipoDoc;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Alumno' == $relationName) {
            $this->initAlumnos();
        }
        if ('ElementoEnUso' == $relationName) {
            $this->initElementoEnUsos();
        }
        if ('Profesor' == $relationName) {
            $this->initProfesors();
        }
    }

    /**
     * Clears out the collAlumnos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Persona The current object (for fluent API support)
     * @see        addAlumnos()
     */
    public function clearAlumnos()
    {
        $this->collAlumnos = null; // important to set this to null since that means it is uninitialized
        $this->collAlumnosPartial = null;

        return $this;
    }

    /**
     * reset is the collAlumnos collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlumnos($v = true)
    {
        $this->collAlumnosPartial = $v;
    }

    /**
     * Initializes the collAlumnos collection.
     *
     * By default this just sets the collAlumnos collection to an empty array (like clearcollAlumnos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlumnos($overrideExisting = true)
    {
        if (null !== $this->collAlumnos && !$overrideExisting) {
            return;
        }
        $this->collAlumnos = new PropelObjectCollection();
        $this->collAlumnos->setModel('Alumno');
    }

    /**
     * Gets an array of Alumno objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Persona is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alumno[] List of Alumno objects
     * @throws PropelException
     */
    public function getAlumnos($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlumnosPartial && !$this->isNew();
        if (null === $this->collAlumnos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlumnos) {
                // return empty collection
                $this->initAlumnos();
            } else {
                $collAlumnos = AlumnoQuery::create(null, $criteria)
                    ->filterByPersona($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlumnosPartial && count($collAlumnos)) {
                      $this->initAlumnos(false);

                      foreach($collAlumnos as $obj) {
                        if (false == $this->collAlumnos->contains($obj)) {
                          $this->collAlumnos->append($obj);
                        }
                      }

                      $this->collAlumnosPartial = true;
                    }

                    $collAlumnos->getInternalIterator()->rewind();
                    return $collAlumnos;
                }

                if($partial && $this->collAlumnos) {
                    foreach($this->collAlumnos as $obj) {
                        if($obj->isNew()) {
                            $collAlumnos[] = $obj;
                        }
                    }
                }

                $this->collAlumnos = $collAlumnos;
                $this->collAlumnosPartial = false;
            }
        }

        return $this->collAlumnos;
    }

    /**
     * Sets a collection of Alumno objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alumnos A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Persona The current object (for fluent API support)
     */
    public function setAlumnos(PropelCollection $alumnos, PropelPDO $con = null)
    {
        $alumnosToDelete = $this->getAlumnos(new Criteria(), $con)->diff($alumnos);

        $this->alumnosScheduledForDeletion = unserialize(serialize($alumnosToDelete));

        foreach ($alumnosToDelete as $alumnoRemoved) {
            $alumnoRemoved->setPersona(null);
        }

        $this->collAlumnos = null;
        foreach ($alumnos as $alumno) {
            $this->addAlumno($alumno);
        }

        $this->collAlumnos = $alumnos;
        $this->collAlumnosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Alumno objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Alumno objects.
     * @throws PropelException
     */
    public function countAlumnos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlumnosPartial && !$this->isNew();
        if (null === $this->collAlumnos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlumnos) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlumnos());
            }
            $query = AlumnoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collAlumnos);
    }

    /**
     * Method called to associate a Alumno object to this object
     * through the Alumno foreign key attribute.
     *
     * @param    Alumno $l Alumno
     * @return Persona The current object (for fluent API support)
     */
    public function addAlumno(Alumno $l)
    {
        if ($this->collAlumnos === null) {
            $this->initAlumnos();
            $this->collAlumnosPartial = true;
        }
        if (!in_array($l, $this->collAlumnos->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlumno($l);
        }

        return $this;
    }

    /**
     * @param	Alumno $alumno The alumno object to add.
     */
    protected function doAddAlumno($alumno)
    {
        $this->collAlumnos[]= $alumno;
        $alumno->setPersona($this);
    }

    /**
     * @param	Alumno $alumno The alumno object to remove.
     * @return Persona The current object (for fluent API support)
     */
    public function removeAlumno($alumno)
    {
        if ($this->getAlumnos()->contains($alumno)) {
            $this->collAlumnos->remove($this->collAlumnos->search($alumno));
            if (null === $this->alumnosScheduledForDeletion) {
                $this->alumnosScheduledForDeletion = clone $this->collAlumnos;
                $this->alumnosScheduledForDeletion->clear();
            }
            $this->alumnosScheduledForDeletion[]= clone $alumno;
            $alumno->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Alumnos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alumno[] List of Alumno objects
     */
    public function getAlumnosJoinEstadoAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlumnoQuery::create(null, $criteria);
        $query->joinWith('EstadoAlumno', $join_behavior);

        return $this->getAlumnos($query, $con);
    }

    /**
     * Clears out the collElementoEnUsos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Persona The current object (for fluent API support)
     * @see        addElementoEnUsos()
     */
    public function clearElementoEnUsos()
    {
        $this->collElementoEnUsos = null; // important to set this to null since that means it is uninitialized
        $this->collElementoEnUsosPartial = null;

        return $this;
    }

    /**
     * reset is the collElementoEnUsos collection loaded partially
     *
     * @return void
     */
    public function resetPartialElementoEnUsos($v = true)
    {
        $this->collElementoEnUsosPartial = $v;
    }

    /**
     * Initializes the collElementoEnUsos collection.
     *
     * By default this just sets the collElementoEnUsos collection to an empty array (like clearcollElementoEnUsos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initElementoEnUsos($overrideExisting = true)
    {
        if (null !== $this->collElementoEnUsos && !$overrideExisting) {
            return;
        }
        $this->collElementoEnUsos = new PropelObjectCollection();
        $this->collElementoEnUsos->setModel('ElementoEnUso');
    }

    /**
     * Gets an array of ElementoEnUso objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Persona is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ElementoEnUso[] List of ElementoEnUso objects
     * @throws PropelException
     */
    public function getElementoEnUsos($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collElementoEnUsosPartial && !$this->isNew();
        if (null === $this->collElementoEnUsos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collElementoEnUsos) {
                // return empty collection
                $this->initElementoEnUsos();
            } else {
                $collElementoEnUsos = ElementoEnUsoQuery::create(null, $criteria)
                    ->filterByPersona($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collElementoEnUsosPartial && count($collElementoEnUsos)) {
                      $this->initElementoEnUsos(false);

                      foreach($collElementoEnUsos as $obj) {
                        if (false == $this->collElementoEnUsos->contains($obj)) {
                          $this->collElementoEnUsos->append($obj);
                        }
                      }

                      $this->collElementoEnUsosPartial = true;
                    }

                    $collElementoEnUsos->getInternalIterator()->rewind();
                    return $collElementoEnUsos;
                }

                if($partial && $this->collElementoEnUsos) {
                    foreach($this->collElementoEnUsos as $obj) {
                        if($obj->isNew()) {
                            $collElementoEnUsos[] = $obj;
                        }
                    }
                }

                $this->collElementoEnUsos = $collElementoEnUsos;
                $this->collElementoEnUsosPartial = false;
            }
        }

        return $this->collElementoEnUsos;
    }

    /**
     * Sets a collection of ElementoEnUso objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $elementoEnUsos A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Persona The current object (for fluent API support)
     */
    public function setElementoEnUsos(PropelCollection $elementoEnUsos, PropelPDO $con = null)
    {
        $elementoEnUsosToDelete = $this->getElementoEnUsos(new Criteria(), $con)->diff($elementoEnUsos);

        $this->elementoEnUsosScheduledForDeletion = unserialize(serialize($elementoEnUsosToDelete));

        foreach ($elementoEnUsosToDelete as $elementoEnUsoRemoved) {
            $elementoEnUsoRemoved->setPersona(null);
        }

        $this->collElementoEnUsos = null;
        foreach ($elementoEnUsos as $elementoEnUso) {
            $this->addElementoEnUso($elementoEnUso);
        }

        $this->collElementoEnUsos = $elementoEnUsos;
        $this->collElementoEnUsosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ElementoEnUso objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ElementoEnUso objects.
     * @throws PropelException
     */
    public function countElementoEnUsos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collElementoEnUsosPartial && !$this->isNew();
        if (null === $this->collElementoEnUsos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collElementoEnUsos) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getElementoEnUsos());
            }
            $query = ElementoEnUsoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collElementoEnUsos);
    }

    /**
     * Method called to associate a ElementoEnUso object to this object
     * through the ElementoEnUso foreign key attribute.
     *
     * @param    ElementoEnUso $l ElementoEnUso
     * @return Persona The current object (for fluent API support)
     */
    public function addElementoEnUso(ElementoEnUso $l)
    {
        if ($this->collElementoEnUsos === null) {
            $this->initElementoEnUsos();
            $this->collElementoEnUsosPartial = true;
        }
        if (!in_array($l, $this->collElementoEnUsos->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddElementoEnUso($l);
        }

        return $this;
    }

    /**
     * @param	ElementoEnUso $elementoEnUso The elementoEnUso object to add.
     */
    protected function doAddElementoEnUso($elementoEnUso)
    {
        $this->collElementoEnUsos[]= $elementoEnUso;
        $elementoEnUso->setPersona($this);
    }

    /**
     * @param	ElementoEnUso $elementoEnUso The elementoEnUso object to remove.
     * @return Persona The current object (for fluent API support)
     */
    public function removeElementoEnUso($elementoEnUso)
    {
        if ($this->getElementoEnUsos()->contains($elementoEnUso)) {
            $this->collElementoEnUsos->remove($this->collElementoEnUsos->search($elementoEnUso));
            if (null === $this->elementoEnUsosScheduledForDeletion) {
                $this->elementoEnUsosScheduledForDeletion = clone $this->collElementoEnUsos;
                $this->elementoEnUsosScheduledForDeletion->clear();
            }
            $this->elementoEnUsosScheduledForDeletion[]= clone $elementoEnUso;
            $elementoEnUso->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related ElementoEnUsos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ElementoEnUso[] List of ElementoEnUso objects
     */
    public function getElementoEnUsosJoinElemento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ElementoEnUsoQuery::create(null, $criteria);
        $query->joinWith('Elemento', $join_behavior);

        return $this->getElementoEnUsos($query, $con);
    }

    /**
     * Clears out the collProfesors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Persona The current object (for fluent API support)
     * @see        addProfesors()
     */
    public function clearProfesors()
    {
        $this->collProfesors = null; // important to set this to null since that means it is uninitialized
        $this->collProfesorsPartial = null;

        return $this;
    }

    /**
     * reset is the collProfesors collection loaded partially
     *
     * @return void
     */
    public function resetPartialProfesors($v = true)
    {
        $this->collProfesorsPartial = $v;
    }

    /**
     * Initializes the collProfesors collection.
     *
     * By default this just sets the collProfesors collection to an empty array (like clearcollProfesors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProfesors($overrideExisting = true)
    {
        if (null !== $this->collProfesors && !$overrideExisting) {
            return;
        }
        $this->collProfesors = new PropelObjectCollection();
        $this->collProfesors->setModel('Profesor');
    }

    /**
     * Gets an array of Profesor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Persona is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Profesor[] List of Profesor objects
     * @throws PropelException
     */
    public function getProfesors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProfesorsPartial && !$this->isNew();
        if (null === $this->collProfesors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProfesors) {
                // return empty collection
                $this->initProfesors();
            } else {
                $collProfesors = ProfesorQuery::create(null, $criteria)
                    ->filterByPersona($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProfesorsPartial && count($collProfesors)) {
                      $this->initProfesors(false);

                      foreach($collProfesors as $obj) {
                        if (false == $this->collProfesors->contains($obj)) {
                          $this->collProfesors->append($obj);
                        }
                      }

                      $this->collProfesorsPartial = true;
                    }

                    $collProfesors->getInternalIterator()->rewind();
                    return $collProfesors;
                }

                if($partial && $this->collProfesors) {
                    foreach($this->collProfesors as $obj) {
                        if($obj->isNew()) {
                            $collProfesors[] = $obj;
                        }
                    }
                }

                $this->collProfesors = $collProfesors;
                $this->collProfesorsPartial = false;
            }
        }

        return $this->collProfesors;
    }

    /**
     * Sets a collection of Profesor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $profesors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Persona The current object (for fluent API support)
     */
    public function setProfesors(PropelCollection $profesors, PropelPDO $con = null)
    {
        $profesorsToDelete = $this->getProfesors(new Criteria(), $con)->diff($profesors);

        $this->profesorsScheduledForDeletion = unserialize(serialize($profesorsToDelete));

        foreach ($profesorsToDelete as $profesorRemoved) {
            $profesorRemoved->setPersona(null);
        }

        $this->collProfesors = null;
        foreach ($profesors as $profesor) {
            $this->addProfesor($profesor);
        }

        $this->collProfesors = $profesors;
        $this->collProfesorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Profesor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Profesor objects.
     * @throws PropelException
     */
    public function countProfesors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProfesorsPartial && !$this->isNew();
        if (null === $this->collProfesors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProfesors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getProfesors());
            }
            $query = ProfesorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersona($this)
                ->count($con);
        }

        return count($this->collProfesors);
    }

    /**
     * Method called to associate a Profesor object to this object
     * through the Profesor foreign key attribute.
     *
     * @param    Profesor $l Profesor
     * @return Persona The current object (for fluent API support)
     */
    public function addProfesor(Profesor $l)
    {
        if ($this->collProfesors === null) {
            $this->initProfesors();
            $this->collProfesorsPartial = true;
        }
        if (!in_array($l, $this->collProfesors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProfesor($l);
        }

        return $this;
    }

    /**
     * @param	Profesor $profesor The profesor object to add.
     */
    protected function doAddProfesor($profesor)
    {
        $this->collProfesors[]= $profesor;
        $profesor->setPersona($this);
    }

    /**
     * @param	Profesor $profesor The profesor object to remove.
     * @return Persona The current object (for fluent API support)
     */
    public function removeProfesor($profesor)
    {
        if ($this->getProfesors()->contains($profesor)) {
            $this->collProfesors->remove($this->collProfesors->search($profesor));
            if (null === $this->profesorsScheduledForDeletion) {
                $this->profesorsScheduledForDeletion = clone $this->collProfesors;
                $this->profesorsScheduledForDeletion->clear();
            }
            $this->profesorsScheduledForDeletion[]= clone $profesor;
            $profesor->setPersona(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Persona is new, it will return
     * an empty collection; or if this Persona has previously
     * been saved, it will retrieve related Profesors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Persona.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Profesor[] List of Profesor objects
     */
    public function getProfesorsJoinCargo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProfesorQuery::create(null, $criteria);
        $query->joinWith('Cargo', $join_behavior);

        return $this->getProfesors($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->nro_doc = null;
        $this->ape_nom = null;
        $this->direccion = null;
        $this->fecha_nac = null;
        $this->email = null;
        $this->sexo_id = null;
        $this->tipo_doc_id = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collAlumnos) {
                foreach ($this->collAlumnos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collElementoEnUsos) {
                foreach ($this->collElementoEnUsos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProfesors) {
                foreach ($this->collProfesors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSexo instanceof Persistent) {
              $this->aSexo->clearAllReferences($deep);
            }
            if ($this->aTipoDoc instanceof Persistent) {
              $this->aTipoDoc->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlumnos instanceof PropelCollection) {
            $this->collAlumnos->clearIterator();
        }
        $this->collAlumnos = null;
        if ($this->collElementoEnUsos instanceof PropelCollection) {
            $this->collElementoEnUsos->clearIterator();
        }
        $this->collElementoEnUsos = null;
        if ($this->collProfesors instanceof PropelCollection) {
            $this->collProfesors->clearIterator();
        }
        $this->collProfesors = null;
        $this->aSexo = null;
        $this->aTipoDoc = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PersonaPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {

        // symfony_behaviors behavior
        if ($callable = sfMixer::getCallable('BasePersona:' . $name))
        {
          array_unshift($params, $this);
          return call_user_func_array($callable, $params);
        }


        return parent::__call($name, $params);
    }

}
