<?php


/**
 * Base class that represents a row from the 'elemento' table.
 *
 *
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseElemento extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ElementoPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ElementoPeer
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
     * The value for the descripcion field.
     * @var        string
     */
    protected $descripcion;

    /**
     * The value for the disponible field.
     * @var        boolean
     */
    protected $disponible;

    /**
     * The value for the numero_inventario field.
     * @var        string
     */
    protected $numero_inventario;

    /**
     * The value for the solo_udc field.
     * @var        boolean
     */
    protected $solo_udc;

    /**
     * @var        PropelObjectCollection|ElementoEnUso[] Collection to store aggregation of ElementoEnUso objects.
     */
    protected $collElementoEnUsos;
    protected $collElementoEnUsosPartial;

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
    protected $elementoEnUsosScheduledForDeletion = null;

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
     * Get the [descripcion] column value.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the [disponible] column value.
     *
     * @return boolean
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Get the [numero_inventario] column value.
     *
     * @return string
     */
    public function getNumeroInventario()
    {
        return $this->numero_inventario;
    }

    /**
     * Get the [solo_udc] column value.
     *
     * @return boolean
     */
    public function getSoloUdc()
    {
        return $this->solo_udc;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Elemento The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ElementoPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [descripcion] column.
     *
     * @param string $v new value
     * @return Elemento The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[] = ElementoPeer::DESCRIPCION;
        }


        return $this;
    } // setDescripcion()

    /**
     * Sets the value of the [disponible] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Elemento The current object (for fluent API support)
     */
    public function setDisponible($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->disponible !== $v) {
            $this->disponible = $v;
            $this->modifiedColumns[] = ElementoPeer::DISPONIBLE;
        }


        return $this;
    } // setDisponible()

    /**
     * Set the value of [numero_inventario] column.
     *
     * @param string $v new value
     * @return Elemento The current object (for fluent API support)
     */
    public function setNumeroInventario($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->numero_inventario !== $v) {
            $this->numero_inventario = $v;
            $this->modifiedColumns[] = ElementoPeer::NUMERO_INVENTARIO;
        }


        return $this;
    } // setNumeroInventario()

    /**
     * Sets the value of the [solo_udc] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Elemento The current object (for fluent API support)
     */
    public function setSoloUdc($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->solo_udc !== $v) {
            $this->solo_udc = $v;
            $this->modifiedColumns[] = ElementoPeer::SOLO_UDC;
        }


        return $this;
    } // setSoloUdc()

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
            $this->descripcion = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->disponible = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
            $this->numero_inventario = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->solo_udc = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = ElementoPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Elemento object", $e);
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
            $con = Propel::getConnection(ElementoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ElementoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collElementoEnUsos = null;

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
            $con = Propel::getConnection(ElementoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ElementoQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseElemento:delete:pre') as $callable)
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
                foreach (sfMixer::getCallables('BaseElemento:delete:post') as $callable)
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
            $con = Propel::getConnection(ElementoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseElemento:save:pre') as $callable)
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
                foreach (sfMixer::getCallables('BaseElemento:save:post') as $callable)
                {
                  call_user_func($callable, $this, $con, $affectedRows);
                }

                ElementoPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ElementoPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ElementoPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ElementoPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ElementoPeer::DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = '`descripcion`';
        }
        if ($this->isColumnModified(ElementoPeer::DISPONIBLE)) {
            $modifiedColumns[':p' . $index++]  = '`disponible`';
        }
        if ($this->isColumnModified(ElementoPeer::NUMERO_INVENTARIO)) {
            $modifiedColumns[':p' . $index++]  = '`numero_inventario`';
        }
        if ($this->isColumnModified(ElementoPeer::SOLO_UDC)) {
            $modifiedColumns[':p' . $index++]  = '`solo_udc`';
        }

        $sql = sprintf(
            'INSERT INTO `elemento` (%s) VALUES (%s)',
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
                    case '`descripcion`':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case '`disponible`':
                        $stmt->bindValue($identifier, (int) $this->disponible, PDO::PARAM_INT);
                        break;
                    case '`numero_inventario`':
                        $stmt->bindValue($identifier, $this->numero_inventario, PDO::PARAM_STR);
                        break;
                    case '`solo_udc`':
                        $stmt->bindValue($identifier, (int) $this->solo_udc, PDO::PARAM_INT);
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


            if (($retval = ElementoPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collElementoEnUsos !== null) {
                    foreach ($this->collElementoEnUsos as $referrerFK) {
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
        $pos = ElementoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDescripcion();
                break;
            case 2:
                return $this->getDisponible();
                break;
            case 3:
                return $this->getNumeroInventario();
                break;
            case 4:
                return $this->getSoloUdc();
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
        if (isset($alreadyDumpedObjects['Elemento'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Elemento'][$this->getPrimaryKey()] = true;
        $keys = ElementoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDescripcion(),
            $keys[2] => $this->getDisponible(),
            $keys[3] => $this->getNumeroInventario(),
            $keys[4] => $this->getSoloUdc(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collElementoEnUsos) {
                $result['ElementoEnUsos'] = $this->collElementoEnUsos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ElementoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDescripcion($value);
                break;
            case 2:
                $this->setDisponible($value);
                break;
            case 3:
                $this->setNumeroInventario($value);
                break;
            case 4:
                $this->setSoloUdc($value);
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
        $keys = ElementoPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDisponible($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNumeroInventario($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSoloUdc($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ElementoPeer::DATABASE_NAME);

        if ($this->isColumnModified(ElementoPeer::ID)) $criteria->add(ElementoPeer::ID, $this->id);
        if ($this->isColumnModified(ElementoPeer::DESCRIPCION)) $criteria->add(ElementoPeer::DESCRIPCION, $this->descripcion);
        if ($this->isColumnModified(ElementoPeer::DISPONIBLE)) $criteria->add(ElementoPeer::DISPONIBLE, $this->disponible);
        if ($this->isColumnModified(ElementoPeer::NUMERO_INVENTARIO)) $criteria->add(ElementoPeer::NUMERO_INVENTARIO, $this->numero_inventario);
        if ($this->isColumnModified(ElementoPeer::SOLO_UDC)) $criteria->add(ElementoPeer::SOLO_UDC, $this->solo_udc);

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
        $criteria = new Criteria(ElementoPeer::DATABASE_NAME);
        $criteria->add(ElementoPeer::ID, $this->id);

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
     * @param object $copyObj An object of Elemento (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setDisponible($this->getDisponible());
        $copyObj->setNumeroInventario($this->getNumeroInventario());
        $copyObj->setSoloUdc($this->getSoloUdc());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getElementoEnUsos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addElementoEnUso($relObj->copy($deepCopy));
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
     * @return Elemento Clone of current object.
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
     * @return ElementoPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ElementoPeer();
        }

        return self::$peer;
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
        if ('ElementoEnUso' == $relationName) {
            $this->initElementoEnUsos();
        }
    }

    /**
     * Clears out the collElementoEnUsos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Elemento The current object (for fluent API support)
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
     * If this Elemento is new, it will return
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
                    ->filterByElemento($this)
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
     * @return Elemento The current object (for fluent API support)
     */
    public function setElementoEnUsos(PropelCollection $elementoEnUsos, PropelPDO $con = null)
    {
        $elementoEnUsosToDelete = $this->getElementoEnUsos(new Criteria(), $con)->diff($elementoEnUsos);

        $this->elementoEnUsosScheduledForDeletion = unserialize(serialize($elementoEnUsosToDelete));

        foreach ($elementoEnUsosToDelete as $elementoEnUsoRemoved) {
            $elementoEnUsoRemoved->setElemento(null);
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
                ->filterByElemento($this)
                ->count($con);
        }

        return count($this->collElementoEnUsos);
    }

    /**
     * Method called to associate a ElementoEnUso object to this object
     * through the ElementoEnUso foreign key attribute.
     *
     * @param    ElementoEnUso $l ElementoEnUso
     * @return Elemento The current object (for fluent API support)
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
        $elementoEnUso->setElemento($this);
    }

    /**
     * @param	ElementoEnUso $elementoEnUso The elementoEnUso object to remove.
     * @return Elemento The current object (for fluent API support)
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
            $elementoEnUso->setElemento(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Elemento is new, it will return
     * an empty collection; or if this Elemento has previously
     * been saved, it will retrieve related ElementoEnUsos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Elemento.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ElementoEnUso[] List of ElementoEnUso objects
     */
    public function getElementoEnUsosJoinPersona($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ElementoEnUsoQuery::create(null, $criteria);
        $query->joinWith('Persona', $join_behavior);

        return $this->getElementoEnUsos($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->descripcion = null;
        $this->disponible = null;
        $this->numero_inventario = null;
        $this->solo_udc = null;
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
            if ($this->collElementoEnUsos) {
                foreach ($this->collElementoEnUsos as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collElementoEnUsos instanceof PropelCollection) {
            $this->collElementoEnUsos->clearIterator();
        }
        $this->collElementoEnUsos = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ElementoPeer::DEFAULT_STRING_FORMAT);
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
        if ($callable = sfMixer::getCallable('BaseElemento:' . $name))
        {
          array_unshift($params, $this);
          return call_user_func_array($callable, $params);
        }


        return parent::__call($name, $params);
    }

}
