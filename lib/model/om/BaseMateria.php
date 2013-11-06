<?php


/**
 * Base class that represents a row from the 'materia' table.
 *
 *
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMateria extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MateriaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MateriaPeer
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
     * The value for the nombre_materia field.
     * @var        string
     */
    protected $nombre_materia;

    /**
     * The value for the fecha_inicio_cursada field.
     * @var        string
     */
    protected $fecha_inicio_cursada;

    /**
     * The value for the fecha_fin_cursada field.
     * @var        string
     */
    protected $fecha_fin_cursada;

    /**
     * The value for the carrera_id field.
     * @var        int
     */
    protected $carrera_id;

    /**
     * @var        Carrera
     */
    protected $aCarrera;

    /**
     * @var        PropelObjectCollection|Comision[] Collection to store aggregation of Comision objects.
     */
    protected $collComisions;
    protected $collComisionsPartial;

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
    protected $comisionsScheduledForDeletion = null;

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
     * Get the [nombre_materia] column value.
     *
     * @return string
     */
    public function getNombreMateria()
    {
        return $this->nombre_materia;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_inicio_cursada] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaInicioCursada($format = 'Y-m-d')
    {
        if ($this->fecha_inicio_cursada === null) {
            return null;
        }

        if ($this->fecha_inicio_cursada === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_inicio_cursada);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_inicio_cursada, true), $x);
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
     * Get the [optionally formatted] temporal [fecha_fin_cursada] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaFinCursada($format = 'Y-m-d')
    {
        if ($this->fecha_fin_cursada === null) {
            return null;
        }

        if ($this->fecha_fin_cursada === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_fin_cursada);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_fin_cursada, true), $x);
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
     * Get the [carrera_id] column value.
     *
     * @return int
     */
    public function getCarreraId()
    {
        return $this->carrera_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Materia The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = MateriaPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [nombre_materia] column.
     *
     * @param string $v new value
     * @return Materia The current object (for fluent API support)
     */
    public function setNombreMateria($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nombre_materia !== $v) {
            $this->nombre_materia = $v;
            $this->modifiedColumns[] = MateriaPeer::NOMBRE_MATERIA;
        }


        return $this;
    } // setNombreMateria()

    /**
     * Sets the value of [fecha_inicio_cursada] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Materia The current object (for fluent API support)
     */
    public function setFechaInicioCursada($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_inicio_cursada !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_inicio_cursada !== null && $tmpDt = new DateTime($this->fecha_inicio_cursada)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_inicio_cursada = $newDateAsString;
                $this->modifiedColumns[] = MateriaPeer::FECHA_INICIO_CURSADA;
            }
        } // if either are not null


        return $this;
    } // setFechaInicioCursada()

    /**
     * Sets the value of [fecha_fin_cursada] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Materia The current object (for fluent API support)
     */
    public function setFechaFinCursada($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_fin_cursada !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_fin_cursada !== null && $tmpDt = new DateTime($this->fecha_fin_cursada)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_fin_cursada = $newDateAsString;
                $this->modifiedColumns[] = MateriaPeer::FECHA_FIN_CURSADA;
            }
        } // if either are not null


        return $this;
    } // setFechaFinCursada()

    /**
     * Set the value of [carrera_id] column.
     *
     * @param int $v new value
     * @return Materia The current object (for fluent API support)
     */
    public function setCarreraId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->carrera_id !== $v) {
            $this->carrera_id = $v;
            $this->modifiedColumns[] = MateriaPeer::CARRERA_ID;
        }

        if ($this->aCarrera !== null && $this->aCarrera->getId() !== $v) {
            $this->aCarrera = null;
        }


        return $this;
    } // setCarreraId()

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
            $this->nombre_materia = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->fecha_inicio_cursada = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->fecha_fin_cursada = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->carrera_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = MateriaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Materia object", $e);
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

        if ($this->aCarrera !== null && $this->carrera_id !== $this->aCarrera->getId()) {
            $this->aCarrera = null;
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
            $con = Propel::getConnection(MateriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MateriaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCarrera = null;
            $this->collComisions = null;

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
            $con = Propel::getConnection(MateriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MateriaQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseMateria:delete:pre') as $callable)
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
                foreach (sfMixer::getCallables('BaseMateria:delete:post') as $callable)
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
            $con = Propel::getConnection(MateriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseMateria:save:pre') as $callable)
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
                foreach (sfMixer::getCallables('BaseMateria:save:post') as $callable)
                {
                  call_user_func($callable, $this, $con, $affectedRows);
                }

                MateriaPeer::addInstanceToPool($this);
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

            if ($this->aCarrera !== null) {
                if ($this->aCarrera->isModified() || $this->aCarrera->isNew()) {
                    $affectedRows += $this->aCarrera->save($con);
                }
                $this->setCarrera($this->aCarrera);
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

            if ($this->comisionsScheduledForDeletion !== null) {
                if (!$this->comisionsScheduledForDeletion->isEmpty()) {
                    ComisionQuery::create()
                        ->filterByPrimaryKeys($this->comisionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->comisionsScheduledForDeletion = null;
                }
            }

            if ($this->collComisions !== null) {
                foreach ($this->collComisions as $referrerFK) {
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

        $this->modifiedColumns[] = MateriaPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MateriaPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MateriaPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(MateriaPeer::NOMBRE_MATERIA)) {
            $modifiedColumns[':p' . $index++]  = '`nombre_materia`';
        }
        if ($this->isColumnModified(MateriaPeer::FECHA_INICIO_CURSADA)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_inicio_cursada`';
        }
        if ($this->isColumnModified(MateriaPeer::FECHA_FIN_CURSADA)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_fin_cursada`';
        }
        if ($this->isColumnModified(MateriaPeer::CARRERA_ID)) {
            $modifiedColumns[':p' . $index++]  = '`carrera_id`';
        }

        $sql = sprintf(
            'INSERT INTO `materia` (%s) VALUES (%s)',
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
                    case '`nombre_materia`':
                        $stmt->bindValue($identifier, $this->nombre_materia, PDO::PARAM_STR);
                        break;
                    case '`fecha_inicio_cursada`':
                        $stmt->bindValue($identifier, $this->fecha_inicio_cursada, PDO::PARAM_STR);
                        break;
                    case '`fecha_fin_cursada`':
                        $stmt->bindValue($identifier, $this->fecha_fin_cursada, PDO::PARAM_STR);
                        break;
                    case '`carrera_id`':
                        $stmt->bindValue($identifier, $this->carrera_id, PDO::PARAM_INT);
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

            if ($this->aCarrera !== null) {
                if (!$this->aCarrera->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCarrera->getValidationFailures());
                }
            }


            if (($retval = MateriaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collComisions !== null) {
                    foreach ($this->collComisions as $referrerFK) {
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
        $pos = MateriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getNombreMateria();
                break;
            case 2:
                return $this->getFechaInicioCursada();
                break;
            case 3:
                return $this->getFechaFinCursada();
                break;
            case 4:
                return $this->getCarreraId();
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
        if (isset($alreadyDumpedObjects['Materia'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Materia'][$this->getPrimaryKey()] = true;
        $keys = MateriaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombreMateria(),
            $keys[2] => $this->getFechaInicioCursada(),
            $keys[3] => $this->getFechaFinCursada(),
            $keys[4] => $this->getCarreraId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aCarrera) {
                $result['Carrera'] = $this->aCarrera->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collComisions) {
                $result['Comisions'] = $this->collComisions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MateriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setNombreMateria($value);
                break;
            case 2:
                $this->setFechaInicioCursada($value);
                break;
            case 3:
                $this->setFechaFinCursada($value);
                break;
            case 4:
                $this->setCarreraId($value);
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
        $keys = MateriaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNombreMateria($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFechaInicioCursada($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFechaFinCursada($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCarreraId($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MateriaPeer::DATABASE_NAME);

        if ($this->isColumnModified(MateriaPeer::ID)) $criteria->add(MateriaPeer::ID, $this->id);
        if ($this->isColumnModified(MateriaPeer::NOMBRE_MATERIA)) $criteria->add(MateriaPeer::NOMBRE_MATERIA, $this->nombre_materia);
        if ($this->isColumnModified(MateriaPeer::FECHA_INICIO_CURSADA)) $criteria->add(MateriaPeer::FECHA_INICIO_CURSADA, $this->fecha_inicio_cursada);
        if ($this->isColumnModified(MateriaPeer::FECHA_FIN_CURSADA)) $criteria->add(MateriaPeer::FECHA_FIN_CURSADA, $this->fecha_fin_cursada);
        if ($this->isColumnModified(MateriaPeer::CARRERA_ID)) $criteria->add(MateriaPeer::CARRERA_ID, $this->carrera_id);

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
        $criteria = new Criteria(MateriaPeer::DATABASE_NAME);
        $criteria->add(MateriaPeer::ID, $this->id);

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
     * @param object $copyObj An object of Materia (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombreMateria($this->getNombreMateria());
        $copyObj->setFechaInicioCursada($this->getFechaInicioCursada());
        $copyObj->setFechaFinCursada($this->getFechaFinCursada());
        $copyObj->setCarreraId($this->getCarreraId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getComisions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addComision($relObj->copy($deepCopy));
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
     * @return Materia Clone of current object.
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
     * @return MateriaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MateriaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Carrera object.
     *
     * @param             Carrera $v
     * @return Materia The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCarrera(Carrera $v = null)
    {
        if ($v === null) {
            $this->setCarreraId(NULL);
        } else {
            $this->setCarreraId($v->getId());
        }

        $this->aCarrera = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Carrera object, it will not be re-added.
        if ($v !== null) {
            $v->addMateria($this);
        }


        return $this;
    }


    /**
     * Get the associated Carrera object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Carrera The associated Carrera object.
     * @throws PropelException
     */
    public function getCarrera(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCarrera === null && ($this->carrera_id !== null) && $doQuery) {
            $this->aCarrera = CarreraQuery::create()->findPk($this->carrera_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCarrera->addMaterias($this);
             */
        }

        return $this->aCarrera;
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
        if ('Comision' == $relationName) {
            $this->initComisions();
        }
    }

    /**
     * Clears out the collComisions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Materia The current object (for fluent API support)
     * @see        addComisions()
     */
    public function clearComisions()
    {
        $this->collComisions = null; // important to set this to null since that means it is uninitialized
        $this->collComisionsPartial = null;

        return $this;
    }

    /**
     * reset is the collComisions collection loaded partially
     *
     * @return void
     */
    public function resetPartialComisions($v = true)
    {
        $this->collComisionsPartial = $v;
    }

    /**
     * Initializes the collComisions collection.
     *
     * By default this just sets the collComisions collection to an empty array (like clearcollComisions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initComisions($overrideExisting = true)
    {
        if (null !== $this->collComisions && !$overrideExisting) {
            return;
        }
        $this->collComisions = new PropelObjectCollection();
        $this->collComisions->setModel('Comision');
    }

    /**
     * Gets an array of Comision objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Materia is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Comision[] List of Comision objects
     * @throws PropelException
     */
    public function getComisions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collComisionsPartial && !$this->isNew();
        if (null === $this->collComisions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collComisions) {
                // return empty collection
                $this->initComisions();
            } else {
                $collComisions = ComisionQuery::create(null, $criteria)
                    ->filterByMateria($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collComisionsPartial && count($collComisions)) {
                      $this->initComisions(false);

                      foreach($collComisions as $obj) {
                        if (false == $this->collComisions->contains($obj)) {
                          $this->collComisions->append($obj);
                        }
                      }

                      $this->collComisionsPartial = true;
                    }

                    $collComisions->getInternalIterator()->rewind();
                    return $collComisions;
                }

                if($partial && $this->collComisions) {
                    foreach($this->collComisions as $obj) {
                        if($obj->isNew()) {
                            $collComisions[] = $obj;
                        }
                    }
                }

                $this->collComisions = $collComisions;
                $this->collComisionsPartial = false;
            }
        }

        return $this->collComisions;
    }

    /**
     * Sets a collection of Comision objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $comisions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Materia The current object (for fluent API support)
     */
    public function setComisions(PropelCollection $comisions, PropelPDO $con = null)
    {
        $comisionsToDelete = $this->getComisions(new Criteria(), $con)->diff($comisions);

        $this->comisionsScheduledForDeletion = unserialize(serialize($comisionsToDelete));

        foreach ($comisionsToDelete as $comisionRemoved) {
            $comisionRemoved->setMateria(null);
        }

        $this->collComisions = null;
        foreach ($comisions as $comision) {
            $this->addComision($comision);
        }

        $this->collComisions = $comisions;
        $this->collComisionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Comision objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Comision objects.
     * @throws PropelException
     */
    public function countComisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collComisionsPartial && !$this->isNew();
        if (null === $this->collComisions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collComisions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getComisions());
            }
            $query = ComisionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMateria($this)
                ->count($con);
        }

        return count($this->collComisions);
    }

    /**
     * Method called to associate a Comision object to this object
     * through the Comision foreign key attribute.
     *
     * @param    Comision $l Comision
     * @return Materia The current object (for fluent API support)
     */
    public function addComision(Comision $l)
    {
        if ($this->collComisions === null) {
            $this->initComisions();
            $this->collComisionsPartial = true;
        }
        if (!in_array($l, $this->collComisions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddComision($l);
        }

        return $this;
    }

    /**
     * @param	Comision $comision The comision object to add.
     */
    protected function doAddComision($comision)
    {
        $this->collComisions[]= $comision;
        $comision->setMateria($this);
    }

    /**
     * @param	Comision $comision The comision object to remove.
     * @return Materia The current object (for fluent API support)
     */
    public function removeComision($comision)
    {
        if ($this->getComisions()->contains($comision)) {
            $this->collComisions->remove($this->collComisions->search($comision));
            if (null === $this->comisionsScheduledForDeletion) {
                $this->comisionsScheduledForDeletion = clone $this->collComisions;
                $this->comisionsScheduledForDeletion->clear();
            }
            $this->comisionsScheduledForDeletion[]= clone $comision;
            $comision->setMateria(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Materia is new, it will return
     * an empty collection; or if this Materia has previously
     * been saved, it will retrieve related Comisions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Materia.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Comision[] List of Comision objects
     */
    public function getComisionsJoinAula($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ComisionQuery::create(null, $criteria);
        $query->joinWith('Aula', $join_behavior);

        return $this->getComisions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Materia is new, it will return
     * an empty collection; or if this Materia has previously
     * been saved, it will retrieve related Comisions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Materia.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Comision[] List of Comision objects
     */
    public function getComisionsJoinProfesor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ComisionQuery::create(null, $criteria);
        $query->joinWith('Profesor', $join_behavior);

        return $this->getComisions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->nombre_materia = null;
        $this->fecha_inicio_cursada = null;
        $this->fecha_fin_cursada = null;
        $this->carrera_id = null;
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
            if ($this->collComisions) {
                foreach ($this->collComisions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCarrera instanceof Persistent) {
              $this->aCarrera->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collComisions instanceof PropelCollection) {
            $this->collComisions->clearIterator();
        }
        $this->collComisions = null;
        $this->aCarrera = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MateriaPeer::DEFAULT_STRING_FORMAT);
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
        if ($callable = sfMixer::getCallable('BaseMateria:' . $name))
        {
          array_unshift($params, $this);
          return call_user_func_array($callable, $params);
        }


        return parent::__call($name, $params);
    }

}
