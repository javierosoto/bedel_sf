<?php


/**
 * Base class that represents a row from the 'comision' table.
 *
 *
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseComision extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ComisionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ComisionPeer
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
     * The value for the descripcion_comision field.
     * @var        string
     */
    protected $descripcion_comision;

    /**
     * The value for the materia_id field.
     * @var        int
     */
    protected $materia_id;

    /**
     * The value for the aula_id field.
     * @var        int
     */
    protected $aula_id;

    /**
     * The value for the profesor_id field.
     * @var        int
     */
    protected $profesor_id;

    /**
     * @var        Materia
     */
    protected $aMateria;

    /**
     * @var        Aula
     */
    protected $aAula;

    /**
     * @var        Profesor
     */
    protected $aProfesor;

    /**
     * @var        PropelObjectCollection|Fichaje[] Collection to store aggregation of Fichaje objects.
     */
    protected $collFichajes;
    protected $collFichajesPartial;

    /**
     * @var        PropelObjectCollection|TemasDados[] Collection to store aggregation of TemasDados objects.
     */
    protected $collTemasDadoss;
    protected $collTemasDadossPartial;

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
    protected $fichajesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $temasDadossScheduledForDeletion = null;

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
     * Get the [descripcion_comision] column value.
     *
     * @return string
     */
    public function getDescripcionComision()
    {
        return $this->descripcion_comision;
    }

    /**
     * Get the [materia_id] column value.
     *
     * @return int
     */
    public function getMateriaId()
    {
        return $this->materia_id;
    }

    /**
     * Get the [aula_id] column value.
     *
     * @return int
     */
    public function getAulaId()
    {
        return $this->aula_id;
    }

    /**
     * Get the [profesor_id] column value.
     *
     * @return int
     */
    public function getProfesorId()
    {
        return $this->profesor_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Comision The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ComisionPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [descripcion_comision] column.
     *
     * @param string $v new value
     * @return Comision The current object (for fluent API support)
     */
    public function setDescripcionComision($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->descripcion_comision !== $v) {
            $this->descripcion_comision = $v;
            $this->modifiedColumns[] = ComisionPeer::DESCRIPCION_COMISION;
        }


        return $this;
    } // setDescripcionComision()

    /**
     * Set the value of [materia_id] column.
     *
     * @param int $v new value
     * @return Comision The current object (for fluent API support)
     */
    public function setMateriaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->materia_id !== $v) {
            $this->materia_id = $v;
            $this->modifiedColumns[] = ComisionPeer::MATERIA_ID;
        }

        if ($this->aMateria !== null && $this->aMateria->getId() !== $v) {
            $this->aMateria = null;
        }


        return $this;
    } // setMateriaId()

    /**
     * Set the value of [aula_id] column.
     *
     * @param int $v new value
     * @return Comision The current object (for fluent API support)
     */
    public function setAulaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->aula_id !== $v) {
            $this->aula_id = $v;
            $this->modifiedColumns[] = ComisionPeer::AULA_ID;
        }

        if ($this->aAula !== null && $this->aAula->getId() !== $v) {
            $this->aAula = null;
        }


        return $this;
    } // setAulaId()

    /**
     * Set the value of [profesor_id] column.
     *
     * @param int $v new value
     * @return Comision The current object (for fluent API support)
     */
    public function setProfesorId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->profesor_id !== $v) {
            $this->profesor_id = $v;
            $this->modifiedColumns[] = ComisionPeer::PROFESOR_ID;
        }

        if ($this->aProfesor !== null && $this->aProfesor->getId() !== $v) {
            $this->aProfesor = null;
        }


        return $this;
    } // setProfesorId()

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
            $this->descripcion_comision = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->materia_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->aula_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->profesor_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = ComisionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Comision object", $e);
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

        if ($this->aMateria !== null && $this->materia_id !== $this->aMateria->getId()) {
            $this->aMateria = null;
        }
        if ($this->aAula !== null && $this->aula_id !== $this->aAula->getId()) {
            $this->aAula = null;
        }
        if ($this->aProfesor !== null && $this->profesor_id !== $this->aProfesor->getId()) {
            $this->aProfesor = null;
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
            $con = Propel::getConnection(ComisionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ComisionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMateria = null;
            $this->aAula = null;
            $this->aProfesor = null;
            $this->collFichajes = null;

            $this->collTemasDadoss = null;

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
            $con = Propel::getConnection(ComisionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ComisionQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseComision:delete:pre') as $callable)
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
                foreach (sfMixer::getCallables('BaseComision:delete:post') as $callable)
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
            $con = Propel::getConnection(ComisionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseComision:save:pre') as $callable)
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
                foreach (sfMixer::getCallables('BaseComision:save:post') as $callable)
                {
                  call_user_func($callable, $this, $con, $affectedRows);
                }

                ComisionPeer::addInstanceToPool($this);
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

            if ($this->aMateria !== null) {
                if ($this->aMateria->isModified() || $this->aMateria->isNew()) {
                    $affectedRows += $this->aMateria->save($con);
                }
                $this->setMateria($this->aMateria);
            }

            if ($this->aAula !== null) {
                if ($this->aAula->isModified() || $this->aAula->isNew()) {
                    $affectedRows += $this->aAula->save($con);
                }
                $this->setAula($this->aAula);
            }

            if ($this->aProfesor !== null) {
                if ($this->aProfesor->isModified() || $this->aProfesor->isNew()) {
                    $affectedRows += $this->aProfesor->save($con);
                }
                $this->setProfesor($this->aProfesor);
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

            if ($this->fichajesScheduledForDeletion !== null) {
                if (!$this->fichajesScheduledForDeletion->isEmpty()) {
                    FichajeQuery::create()
                        ->filterByPrimaryKeys($this->fichajesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->fichajesScheduledForDeletion = null;
                }
            }

            if ($this->collFichajes !== null) {
                foreach ($this->collFichajes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->temasDadossScheduledForDeletion !== null) {
                if (!$this->temasDadossScheduledForDeletion->isEmpty()) {
                    TemasDadosQuery::create()
                        ->filterByPrimaryKeys($this->temasDadossScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->temasDadossScheduledForDeletion = null;
                }
            }

            if ($this->collTemasDadoss !== null) {
                foreach ($this->collTemasDadoss as $referrerFK) {
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

        $this->modifiedColumns[] = ComisionPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ComisionPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ComisionPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ComisionPeer::DESCRIPCION_COMISION)) {
            $modifiedColumns[':p' . $index++]  = '`descripcion_comision`';
        }
        if ($this->isColumnModified(ComisionPeer::MATERIA_ID)) {
            $modifiedColumns[':p' . $index++]  = '`materia_id`';
        }
        if ($this->isColumnModified(ComisionPeer::AULA_ID)) {
            $modifiedColumns[':p' . $index++]  = '`aula_id`';
        }
        if ($this->isColumnModified(ComisionPeer::PROFESOR_ID)) {
            $modifiedColumns[':p' . $index++]  = '`profesor_id`';
        }

        $sql = sprintf(
            'INSERT INTO `comision` (%s) VALUES (%s)',
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
                    case '`descripcion_comision`':
                        $stmt->bindValue($identifier, $this->descripcion_comision, PDO::PARAM_STR);
                        break;
                    case '`materia_id`':
                        $stmt->bindValue($identifier, $this->materia_id, PDO::PARAM_INT);
                        break;
                    case '`aula_id`':
                        $stmt->bindValue($identifier, $this->aula_id, PDO::PARAM_INT);
                        break;
                    case '`profesor_id`':
                        $stmt->bindValue($identifier, $this->profesor_id, PDO::PARAM_INT);
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

            if ($this->aMateria !== null) {
                if (!$this->aMateria->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMateria->getValidationFailures());
                }
            }

            if ($this->aAula !== null) {
                if (!$this->aAula->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAula->getValidationFailures());
                }
            }

            if ($this->aProfesor !== null) {
                if (!$this->aProfesor->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProfesor->getValidationFailures());
                }
            }


            if (($retval = ComisionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collFichajes !== null) {
                    foreach ($this->collFichajes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemasDadoss !== null) {
                    foreach ($this->collTemasDadoss as $referrerFK) {
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
        $pos = ComisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDescripcionComision();
                break;
            case 2:
                return $this->getMateriaId();
                break;
            case 3:
                return $this->getAulaId();
                break;
            case 4:
                return $this->getProfesorId();
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
        if (isset($alreadyDumpedObjects['Comision'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Comision'][$this->getPrimaryKey()] = true;
        $keys = ComisionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDescripcionComision(),
            $keys[2] => $this->getMateriaId(),
            $keys[3] => $this->getAulaId(),
            $keys[4] => $this->getProfesorId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMateria) {
                $result['Materia'] = $this->aMateria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAula) {
                $result['Aula'] = $this->aAula->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProfesor) {
                $result['Profesor'] = $this->aProfesor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collFichajes) {
                $result['Fichajes'] = $this->collFichajes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemasDadoss) {
                $result['TemasDadoss'] = $this->collTemasDadoss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ComisionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDescripcionComision($value);
                break;
            case 2:
                $this->setMateriaId($value);
                break;
            case 3:
                $this->setAulaId($value);
                break;
            case 4:
                $this->setProfesorId($value);
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
        $keys = ComisionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDescripcionComision($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMateriaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAulaId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setProfesorId($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ComisionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ComisionPeer::ID)) $criteria->add(ComisionPeer::ID, $this->id);
        if ($this->isColumnModified(ComisionPeer::DESCRIPCION_COMISION)) $criteria->add(ComisionPeer::DESCRIPCION_COMISION, $this->descripcion_comision);
        if ($this->isColumnModified(ComisionPeer::MATERIA_ID)) $criteria->add(ComisionPeer::MATERIA_ID, $this->materia_id);
        if ($this->isColumnModified(ComisionPeer::AULA_ID)) $criteria->add(ComisionPeer::AULA_ID, $this->aula_id);
        if ($this->isColumnModified(ComisionPeer::PROFESOR_ID)) $criteria->add(ComisionPeer::PROFESOR_ID, $this->profesor_id);

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
        $criteria = new Criteria(ComisionPeer::DATABASE_NAME);
        $criteria->add(ComisionPeer::ID, $this->id);

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
     * @param object $copyObj An object of Comision (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDescripcionComision($this->getDescripcionComision());
        $copyObj->setMateriaId($this->getMateriaId());
        $copyObj->setAulaId($this->getAulaId());
        $copyObj->setProfesorId($this->getProfesorId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getFichajes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFichaje($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemasDadoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemasDados($relObj->copy($deepCopy));
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
     * @return Comision Clone of current object.
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
     * @return ComisionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ComisionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Materia object.
     *
     * @param             Materia $v
     * @return Comision The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMateria(Materia $v = null)
    {
        if ($v === null) {
            $this->setMateriaId(NULL);
        } else {
            $this->setMateriaId($v->getId());
        }

        $this->aMateria = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Materia object, it will not be re-added.
        if ($v !== null) {
            $v->addComision($this);
        }


        return $this;
    }


    /**
     * Get the associated Materia object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Materia The associated Materia object.
     * @throws PropelException
     */
    public function getMateria(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMateria === null && ($this->materia_id !== null) && $doQuery) {
            $this->aMateria = MateriaQuery::create()->findPk($this->materia_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMateria->addComisions($this);
             */
        }

        return $this->aMateria;
    }

    /**
     * Declares an association between this object and a Aula object.
     *
     * @param             Aula $v
     * @return Comision The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAula(Aula $v = null)
    {
        if ($v === null) {
            $this->setAulaId(NULL);
        } else {
            $this->setAulaId($v->getId());
        }

        $this->aAula = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Aula object, it will not be re-added.
        if ($v !== null) {
            $v->addComision($this);
        }


        return $this;
    }


    /**
     * Get the associated Aula object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Aula The associated Aula object.
     * @throws PropelException
     */
    public function getAula(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAula === null && ($this->aula_id !== null) && $doQuery) {
            $this->aAula = AulaQuery::create()->findPk($this->aula_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAula->addComisions($this);
             */
        }

        return $this->aAula;
    }

    /**
     * Declares an association between this object and a Profesor object.
     *
     * @param             Profesor $v
     * @return Comision The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProfesor(Profesor $v = null)
    {
        if ($v === null) {
            $this->setProfesorId(NULL);
        } else {
            $this->setProfesorId($v->getId());
        }

        $this->aProfesor = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Profesor object, it will not be re-added.
        if ($v !== null) {
            $v->addComision($this);
        }


        return $this;
    }


    /**
     * Get the associated Profesor object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Profesor The associated Profesor object.
     * @throws PropelException
     */
    public function getProfesor(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProfesor === null && ($this->profesor_id !== null) && $doQuery) {
            $this->aProfesor = ProfesorQuery::create()->findPk($this->profesor_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProfesor->addComisions($this);
             */
        }

        return $this->aProfesor;
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
        if ('Fichaje' == $relationName) {
            $this->initFichajes();
        }
        if ('TemasDados' == $relationName) {
            $this->initTemasDadoss();
        }
    }

    /**
     * Clears out the collFichajes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Comision The current object (for fluent API support)
     * @see        addFichajes()
     */
    public function clearFichajes()
    {
        $this->collFichajes = null; // important to set this to null since that means it is uninitialized
        $this->collFichajesPartial = null;

        return $this;
    }

    /**
     * reset is the collFichajes collection loaded partially
     *
     * @return void
     */
    public function resetPartialFichajes($v = true)
    {
        $this->collFichajesPartial = $v;
    }

    /**
     * Initializes the collFichajes collection.
     *
     * By default this just sets the collFichajes collection to an empty array (like clearcollFichajes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFichajes($overrideExisting = true)
    {
        if (null !== $this->collFichajes && !$overrideExisting) {
            return;
        }
        $this->collFichajes = new PropelObjectCollection();
        $this->collFichajes->setModel('Fichaje');
    }

    /**
     * Gets an array of Fichaje objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Comision is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Fichaje[] List of Fichaje objects
     * @throws PropelException
     */
    public function getFichajes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collFichajesPartial && !$this->isNew();
        if (null === $this->collFichajes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collFichajes) {
                // return empty collection
                $this->initFichajes();
            } else {
                $collFichajes = FichajeQuery::create(null, $criteria)
                    ->filterByComision($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collFichajesPartial && count($collFichajes)) {
                      $this->initFichajes(false);

                      foreach($collFichajes as $obj) {
                        if (false == $this->collFichajes->contains($obj)) {
                          $this->collFichajes->append($obj);
                        }
                      }

                      $this->collFichajesPartial = true;
                    }

                    $collFichajes->getInternalIterator()->rewind();
                    return $collFichajes;
                }

                if($partial && $this->collFichajes) {
                    foreach($this->collFichajes as $obj) {
                        if($obj->isNew()) {
                            $collFichajes[] = $obj;
                        }
                    }
                }

                $this->collFichajes = $collFichajes;
                $this->collFichajesPartial = false;
            }
        }

        return $this->collFichajes;
    }

    /**
     * Sets a collection of Fichaje objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $fichajes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Comision The current object (for fluent API support)
     */
    public function setFichajes(PropelCollection $fichajes, PropelPDO $con = null)
    {
        $fichajesToDelete = $this->getFichajes(new Criteria(), $con)->diff($fichajes);

        $this->fichajesScheduledForDeletion = unserialize(serialize($fichajesToDelete));

        foreach ($fichajesToDelete as $fichajeRemoved) {
            $fichajeRemoved->setComision(null);
        }

        $this->collFichajes = null;
        foreach ($fichajes as $fichaje) {
            $this->addFichaje($fichaje);
        }

        $this->collFichajes = $fichajes;
        $this->collFichajesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Fichaje objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Fichaje objects.
     * @throws PropelException
     */
    public function countFichajes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collFichajesPartial && !$this->isNew();
        if (null === $this->collFichajes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collFichajes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getFichajes());
            }
            $query = FichajeQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByComision($this)
                ->count($con);
        }

        return count($this->collFichajes);
    }

    /**
     * Method called to associate a Fichaje object to this object
     * through the Fichaje foreign key attribute.
     *
     * @param    Fichaje $l Fichaje
     * @return Comision The current object (for fluent API support)
     */
    public function addFichaje(Fichaje $l)
    {
        if ($this->collFichajes === null) {
            $this->initFichajes();
            $this->collFichajesPartial = true;
        }
        if (!in_array($l, $this->collFichajes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddFichaje($l);
        }

        return $this;
    }

    /**
     * @param	Fichaje $fichaje The fichaje object to add.
     */
    protected function doAddFichaje($fichaje)
    {
        $this->collFichajes[]= $fichaje;
        $fichaje->setComision($this);
    }

    /**
     * @param	Fichaje $fichaje The fichaje object to remove.
     * @return Comision The current object (for fluent API support)
     */
    public function removeFichaje($fichaje)
    {
        if ($this->getFichajes()->contains($fichaje)) {
            $this->collFichajes->remove($this->collFichajes->search($fichaje));
            if (null === $this->fichajesScheduledForDeletion) {
                $this->fichajesScheduledForDeletion = clone $this->collFichajes;
                $this->fichajesScheduledForDeletion->clear();
            }
            $this->fichajesScheduledForDeletion[]= clone $fichaje;
            $fichaje->setComision(null);
        }

        return $this;
    }

    /**
     * Clears out the collTemasDadoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Comision The current object (for fluent API support)
     * @see        addTemasDadoss()
     */
    public function clearTemasDadoss()
    {
        $this->collTemasDadoss = null; // important to set this to null since that means it is uninitialized
        $this->collTemasDadossPartial = null;

        return $this;
    }

    /**
     * reset is the collTemasDadoss collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemasDadoss($v = true)
    {
        $this->collTemasDadossPartial = $v;
    }

    /**
     * Initializes the collTemasDadoss collection.
     *
     * By default this just sets the collTemasDadoss collection to an empty array (like clearcollTemasDadoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemasDadoss($overrideExisting = true)
    {
        if (null !== $this->collTemasDadoss && !$overrideExisting) {
            return;
        }
        $this->collTemasDadoss = new PropelObjectCollection();
        $this->collTemasDadoss->setModel('TemasDados');
    }

    /**
     * Gets an array of TemasDados objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Comision is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemasDados[] List of TemasDados objects
     * @throws PropelException
     */
    public function getTemasDadoss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemasDadossPartial && !$this->isNew();
        if (null === $this->collTemasDadoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemasDadoss) {
                // return empty collection
                $this->initTemasDadoss();
            } else {
                $collTemasDadoss = TemasDadosQuery::create(null, $criteria)
                    ->filterByComision($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemasDadossPartial && count($collTemasDadoss)) {
                      $this->initTemasDadoss(false);

                      foreach($collTemasDadoss as $obj) {
                        if (false == $this->collTemasDadoss->contains($obj)) {
                          $this->collTemasDadoss->append($obj);
                        }
                      }

                      $this->collTemasDadossPartial = true;
                    }

                    $collTemasDadoss->getInternalIterator()->rewind();
                    return $collTemasDadoss;
                }

                if($partial && $this->collTemasDadoss) {
                    foreach($this->collTemasDadoss as $obj) {
                        if($obj->isNew()) {
                            $collTemasDadoss[] = $obj;
                        }
                    }
                }

                $this->collTemasDadoss = $collTemasDadoss;
                $this->collTemasDadossPartial = false;
            }
        }

        return $this->collTemasDadoss;
    }

    /**
     * Sets a collection of TemasDados objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $temasDadoss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Comision The current object (for fluent API support)
     */
    public function setTemasDadoss(PropelCollection $temasDadoss, PropelPDO $con = null)
    {
        $temasDadossToDelete = $this->getTemasDadoss(new Criteria(), $con)->diff($temasDadoss);

        $this->temasDadossScheduledForDeletion = unserialize(serialize($temasDadossToDelete));

        foreach ($temasDadossToDelete as $temasDadosRemoved) {
            $temasDadosRemoved->setComision(null);
        }

        $this->collTemasDadoss = null;
        foreach ($temasDadoss as $temasDados) {
            $this->addTemasDados($temasDados);
        }

        $this->collTemasDadoss = $temasDadoss;
        $this->collTemasDadossPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TemasDados objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TemasDados objects.
     * @throws PropelException
     */
    public function countTemasDadoss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemasDadossPartial && !$this->isNew();
        if (null === $this->collTemasDadoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemasDadoss) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemasDadoss());
            }
            $query = TemasDadosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByComision($this)
                ->count($con);
        }

        return count($this->collTemasDadoss);
    }

    /**
     * Method called to associate a TemasDados object to this object
     * through the TemasDados foreign key attribute.
     *
     * @param    TemasDados $l TemasDados
     * @return Comision The current object (for fluent API support)
     */
    public function addTemasDados(TemasDados $l)
    {
        if ($this->collTemasDadoss === null) {
            $this->initTemasDadoss();
            $this->collTemasDadossPartial = true;
        }
        if (!in_array($l, $this->collTemasDadoss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemasDados($l);
        }

        return $this;
    }

    /**
     * @param	TemasDados $temasDados The temasDados object to add.
     */
    protected function doAddTemasDados($temasDados)
    {
        $this->collTemasDadoss[]= $temasDados;
        $temasDados->setComision($this);
    }

    /**
     * @param	TemasDados $temasDados The temasDados object to remove.
     * @return Comision The current object (for fluent API support)
     */
    public function removeTemasDados($temasDados)
    {
        if ($this->getTemasDadoss()->contains($temasDados)) {
            $this->collTemasDadoss->remove($this->collTemasDadoss->search($temasDados));
            if (null === $this->temasDadossScheduledForDeletion) {
                $this->temasDadossScheduledForDeletion = clone $this->collTemasDadoss;
                $this->temasDadossScheduledForDeletion->clear();
            }
            $this->temasDadossScheduledForDeletion[]= clone $temasDados;
            $temasDados->setComision(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->descripcion_comision = null;
        $this->materia_id = null;
        $this->aula_id = null;
        $this->profesor_id = null;
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
            if ($this->collFichajes) {
                foreach ($this->collFichajes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemasDadoss) {
                foreach ($this->collTemasDadoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMateria instanceof Persistent) {
              $this->aMateria->clearAllReferences($deep);
            }
            if ($this->aAula instanceof Persistent) {
              $this->aAula->clearAllReferences($deep);
            }
            if ($this->aProfesor instanceof Persistent) {
              $this->aProfesor->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collFichajes instanceof PropelCollection) {
            $this->collFichajes->clearIterator();
        }
        $this->collFichajes = null;
        if ($this->collTemasDadoss instanceof PropelCollection) {
            $this->collTemasDadoss->clearIterator();
        }
        $this->collTemasDadoss = null;
        $this->aMateria = null;
        $this->aAula = null;
        $this->aProfesor = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ComisionPeer::DEFAULT_STRING_FORMAT);
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
        if ($callable = sfMixer::getCallable('BaseComision:' . $name))
        {
          array_unshift($params, $this);
          return call_user_func_array($callable, $params);
        }


        return parent::__call($name, $params);
    }

}
