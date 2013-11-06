<?php


/**
 * Base class that represents a query for the 'fichaje' table.
 *
 *
 *
 * @method FichajeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FichajeQuery orderByFechaHoraEntrada($order = Criteria::ASC) Order by the fecha_hora_entrada column
 * @method FichajeQuery orderByFechaHoraSalida($order = Criteria::ASC) Order by the fecha_hora_salida column
 * @method FichajeQuery orderByObservacion($order = Criteria::ASC) Order by the observacion column
 * @method FichajeQuery orderByComisionId($order = Criteria::ASC) Order by the comision_id column
 *
 * @method FichajeQuery groupById() Group by the id column
 * @method FichajeQuery groupByFechaHoraEntrada() Group by the fecha_hora_entrada column
 * @method FichajeQuery groupByFechaHoraSalida() Group by the fecha_hora_salida column
 * @method FichajeQuery groupByObservacion() Group by the observacion column
 * @method FichajeQuery groupByComisionId() Group by the comision_id column
 *
 * @method FichajeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FichajeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FichajeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FichajeQuery leftJoinComision($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comision relation
 * @method FichajeQuery rightJoinComision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comision relation
 * @method FichajeQuery innerJoinComision($relationAlias = null) Adds a INNER JOIN clause to the query using the Comision relation
 *
 * @method Fichaje findOne(PropelPDO $con = null) Return the first Fichaje matching the query
 * @method Fichaje findOneOrCreate(PropelPDO $con = null) Return the first Fichaje matching the query, or a new Fichaje object populated from the query conditions when no match is found
 *
 * @method Fichaje findOneByFechaHoraEntrada(string $fecha_hora_entrada) Return the first Fichaje filtered by the fecha_hora_entrada column
 * @method Fichaje findOneByFechaHoraSalida(string $fecha_hora_salida) Return the first Fichaje filtered by the fecha_hora_salida column
 * @method Fichaje findOneByObservacion(string $observacion) Return the first Fichaje filtered by the observacion column
 * @method Fichaje findOneByComisionId(int $comision_id) Return the first Fichaje filtered by the comision_id column
 *
 * @method array findById(int $id) Return Fichaje objects filtered by the id column
 * @method array findByFechaHoraEntrada(string $fecha_hora_entrada) Return Fichaje objects filtered by the fecha_hora_entrada column
 * @method array findByFechaHoraSalida(string $fecha_hora_salida) Return Fichaje objects filtered by the fecha_hora_salida column
 * @method array findByObservacion(string $observacion) Return Fichaje objects filtered by the observacion column
 * @method array findByComisionId(int $comision_id) Return Fichaje objects filtered by the comision_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseFichajeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFichajeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Fichaje', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FichajeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FichajeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FichajeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FichajeQuery) {
            return $criteria;
        }
        $query = new FichajeQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Fichaje|Fichaje[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FichajePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FichajePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Fichaje A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Fichaje A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `fecha_hora_entrada`, `fecha_hora_salida`, `observacion`, `comision_id` FROM `fichaje` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Fichaje();
            $obj->hydrate($row);
            FichajePeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Fichaje|Fichaje[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Fichaje[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FichajePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FichajePeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FichajePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FichajePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FichajePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the fecha_hora_entrada column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaHoraEntrada('2011-03-14'); // WHERE fecha_hora_entrada = '2011-03-14'
     * $query->filterByFechaHoraEntrada('now'); // WHERE fecha_hora_entrada = '2011-03-14'
     * $query->filterByFechaHoraEntrada(array('max' => 'yesterday')); // WHERE fecha_hora_entrada > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaHoraEntrada The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function filterByFechaHoraEntrada($fechaHoraEntrada = null, $comparison = null)
    {
        if (is_array($fechaHoraEntrada)) {
            $useMinMax = false;
            if (isset($fechaHoraEntrada['min'])) {
                $this->addUsingAlias(FichajePeer::FECHA_HORA_ENTRADA, $fechaHoraEntrada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaHoraEntrada['max'])) {
                $this->addUsingAlias(FichajePeer::FECHA_HORA_ENTRADA, $fechaHoraEntrada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FichajePeer::FECHA_HORA_ENTRADA, $fechaHoraEntrada, $comparison);
    }

    /**
     * Filter the query on the fecha_hora_salida column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaHoraSalida('2011-03-14'); // WHERE fecha_hora_salida = '2011-03-14'
     * $query->filterByFechaHoraSalida('now'); // WHERE fecha_hora_salida = '2011-03-14'
     * $query->filterByFechaHoraSalida(array('max' => 'yesterday')); // WHERE fecha_hora_salida > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaHoraSalida The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function filterByFechaHoraSalida($fechaHoraSalida = null, $comparison = null)
    {
        if (is_array($fechaHoraSalida)) {
            $useMinMax = false;
            if (isset($fechaHoraSalida['min'])) {
                $this->addUsingAlias(FichajePeer::FECHA_HORA_SALIDA, $fechaHoraSalida['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaHoraSalida['max'])) {
                $this->addUsingAlias(FichajePeer::FECHA_HORA_SALIDA, $fechaHoraSalida['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FichajePeer::FECHA_HORA_SALIDA, $fechaHoraSalida, $comparison);
    }

    /**
     * Filter the query on the observacion column
     *
     * Example usage:
     * <code>
     * $query->filterByObservacion('fooValue');   // WHERE observacion = 'fooValue'
     * $query->filterByObservacion('%fooValue%'); // WHERE observacion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $observacion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function filterByObservacion($observacion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($observacion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $observacion)) {
                $observacion = str_replace('*', '%', $observacion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FichajePeer::OBSERVACION, $observacion, $comparison);
    }

    /**
     * Filter the query on the comision_id column
     *
     * Example usage:
     * <code>
     * $query->filterByComisionId(1234); // WHERE comision_id = 1234
     * $query->filterByComisionId(array(12, 34)); // WHERE comision_id IN (12, 34)
     * $query->filterByComisionId(array('min' => 12)); // WHERE comision_id >= 12
     * $query->filterByComisionId(array('max' => 12)); // WHERE comision_id <= 12
     * </code>
     *
     * @see       filterByComision()
     *
     * @param     mixed $comisionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function filterByComisionId($comisionId = null, $comparison = null)
    {
        if (is_array($comisionId)) {
            $useMinMax = false;
            if (isset($comisionId['min'])) {
                $this->addUsingAlias(FichajePeer::COMISION_ID, $comisionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comisionId['max'])) {
                $this->addUsingAlias(FichajePeer::COMISION_ID, $comisionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FichajePeer::COMISION_ID, $comisionId, $comparison);
    }

    /**
     * Filter the query by a related Comision object
     *
     * @param   Comision|PropelObjectCollection $comision The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FichajeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByComision($comision, $comparison = null)
    {
        if ($comision instanceof Comision) {
            return $this
                ->addUsingAlias(FichajePeer::COMISION_ID, $comision->getId(), $comparison);
        } elseif ($comision instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FichajePeer::COMISION_ID, $comision->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByComision() only accepts arguments of type Comision or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comision relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function joinComision($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comision');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Comision');
        }

        return $this;
    }

    /**
     * Use the Comision relation Comision object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ComisionQuery A secondary query class using the current class as primary query
     */
    public function useComisionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinComision($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comision', 'ComisionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Fichaje $fichaje Object to remove from the list of results
     *
     * @return FichajeQuery The current query, for fluid interface
     */
    public function prune($fichaje = null)
    {
        if ($fichaje) {
            $this->addUsingAlias(FichajePeer::ID, $fichaje->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
