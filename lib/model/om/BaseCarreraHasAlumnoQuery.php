<?php


/**
 * Base class that represents a query for the 'carrera_has_alumno' table.
 *
 *
 *
 * @method CarreraHasAlumnoQuery orderByCarreraId($order = Criteria::ASC) Order by the carrera_id column
 * @method CarreraHasAlumnoQuery orderByAlumnoId($order = Criteria::ASC) Order by the alumno_id column
 *
 * @method CarreraHasAlumnoQuery groupByCarreraId() Group by the carrera_id column
 * @method CarreraHasAlumnoQuery groupByAlumnoId() Group by the alumno_id column
 *
 * @method CarreraHasAlumnoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CarreraHasAlumnoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CarreraHasAlumnoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CarreraHasAlumnoQuery leftJoinCarrera($relationAlias = null) Adds a LEFT JOIN clause to the query using the Carrera relation
 * @method CarreraHasAlumnoQuery rightJoinCarrera($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Carrera relation
 * @method CarreraHasAlumnoQuery innerJoinCarrera($relationAlias = null) Adds a INNER JOIN clause to the query using the Carrera relation
 *
 * @method CarreraHasAlumnoQuery leftJoinAlumno($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alumno relation
 * @method CarreraHasAlumnoQuery rightJoinAlumno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alumno relation
 * @method CarreraHasAlumnoQuery innerJoinAlumno($relationAlias = null) Adds a INNER JOIN clause to the query using the Alumno relation
 *
 * @method CarreraHasAlumno findOne(PropelPDO $con = null) Return the first CarreraHasAlumno matching the query
 * @method CarreraHasAlumno findOneOrCreate(PropelPDO $con = null) Return the first CarreraHasAlumno matching the query, or a new CarreraHasAlumno object populated from the query conditions when no match is found
 *
 * @method CarreraHasAlumno findOneByCarreraId(int $carrera_id) Return the first CarreraHasAlumno filtered by the carrera_id column
 * @method CarreraHasAlumno findOneByAlumnoId(int $alumno_id) Return the first CarreraHasAlumno filtered by the alumno_id column
 *
 * @method array findByCarreraId(int $carrera_id) Return CarreraHasAlumno objects filtered by the carrera_id column
 * @method array findByAlumnoId(int $alumno_id) Return CarreraHasAlumno objects filtered by the alumno_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCarreraHasAlumnoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCarreraHasAlumnoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'CarreraHasAlumno', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CarreraHasAlumnoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CarreraHasAlumnoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CarreraHasAlumnoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CarreraHasAlumnoQuery) {
            return $criteria;
        }
        $query = new CarreraHasAlumnoQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$carrera_id, $alumno_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   CarreraHasAlumno|CarreraHasAlumno[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarreraHasAlumnoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CarreraHasAlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 CarreraHasAlumno A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `carrera_id`, `alumno_id` FROM `carrera_has_alumno` WHERE `carrera_id` = :p0 AND `alumno_id` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new CarreraHasAlumno();
            $obj->hydrate($row);
            CarreraHasAlumnoPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return CarreraHasAlumno|CarreraHasAlumno[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|CarreraHasAlumno[]|mixed the list of results, formatted by the current formatter
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
     * @return CarreraHasAlumnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CarreraHasAlumnoPeer::CARRERA_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CarreraHasAlumnoPeer::ALUMNO_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CarreraHasAlumnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CarreraHasAlumnoPeer::CARRERA_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CarreraHasAlumnoPeer::ALUMNO_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the carrera_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCarreraId(1234); // WHERE carrera_id = 1234
     * $query->filterByCarreraId(array(12, 34)); // WHERE carrera_id IN (12, 34)
     * $query->filterByCarreraId(array('min' => 12)); // WHERE carrera_id >= 12
     * $query->filterByCarreraId(array('max' => 12)); // WHERE carrera_id <= 12
     * </code>
     *
     * @see       filterByCarrera()
     *
     * @param     mixed $carreraId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarreraHasAlumnoQuery The current query, for fluid interface
     */
    public function filterByCarreraId($carreraId = null, $comparison = null)
    {
        if (is_array($carreraId)) {
            $useMinMax = false;
            if (isset($carreraId['min'])) {
                $this->addUsingAlias(CarreraHasAlumnoPeer::CARRERA_ID, $carreraId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carreraId['max'])) {
                $this->addUsingAlias(CarreraHasAlumnoPeer::CARRERA_ID, $carreraId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarreraHasAlumnoPeer::CARRERA_ID, $carreraId, $comparison);
    }

    /**
     * Filter the query on the alumno_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAlumnoId(1234); // WHERE alumno_id = 1234
     * $query->filterByAlumnoId(array(12, 34)); // WHERE alumno_id IN (12, 34)
     * $query->filterByAlumnoId(array('min' => 12)); // WHERE alumno_id >= 12
     * $query->filterByAlumnoId(array('max' => 12)); // WHERE alumno_id <= 12
     * </code>
     *
     * @see       filterByAlumno()
     *
     * @param     mixed $alumnoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarreraHasAlumnoQuery The current query, for fluid interface
     */
    public function filterByAlumnoId($alumnoId = null, $comparison = null)
    {
        if (is_array($alumnoId)) {
            $useMinMax = false;
            if (isset($alumnoId['min'])) {
                $this->addUsingAlias(CarreraHasAlumnoPeer::ALUMNO_ID, $alumnoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($alumnoId['max'])) {
                $this->addUsingAlias(CarreraHasAlumnoPeer::ALUMNO_ID, $alumnoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarreraHasAlumnoPeer::ALUMNO_ID, $alumnoId, $comparison);
    }

    /**
     * Filter the query by a related Carrera object
     *
     * @param   Carrera|PropelObjectCollection $carrera The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CarreraHasAlumnoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCarrera($carrera, $comparison = null)
    {
        if ($carrera instanceof Carrera) {
            return $this
                ->addUsingAlias(CarreraHasAlumnoPeer::CARRERA_ID, $carrera->getId(), $comparison);
        } elseif ($carrera instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CarreraHasAlumnoPeer::CARRERA_ID, $carrera->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCarrera() only accepts arguments of type Carrera or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Carrera relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CarreraHasAlumnoQuery The current query, for fluid interface
     */
    public function joinCarrera($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Carrera');

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
            $this->addJoinObject($join, 'Carrera');
        }

        return $this;
    }

    /**
     * Use the Carrera relation Carrera object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CarreraQuery A secondary query class using the current class as primary query
     */
    public function useCarreraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCarrera($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Carrera', 'CarreraQuery');
    }

    /**
     * Filter the query by a related Alumno object
     *
     * @param   Alumno|PropelObjectCollection $alumno The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CarreraHasAlumnoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlumno($alumno, $comparison = null)
    {
        if ($alumno instanceof Alumno) {
            return $this
                ->addUsingAlias(CarreraHasAlumnoPeer::ALUMNO_ID, $alumno->getId(), $comparison);
        } elseif ($alumno instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CarreraHasAlumnoPeer::ALUMNO_ID, $alumno->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAlumno() only accepts arguments of type Alumno or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alumno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CarreraHasAlumnoQuery The current query, for fluid interface
     */
    public function joinAlumno($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alumno');

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
            $this->addJoinObject($join, 'Alumno');
        }

        return $this;
    }

    /**
     * Use the Alumno relation Alumno object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AlumnoQuery A secondary query class using the current class as primary query
     */
    public function useAlumnoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlumno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alumno', 'AlumnoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CarreraHasAlumno $carreraHasAlumno Object to remove from the list of results
     *
     * @return CarreraHasAlumnoQuery The current query, for fluid interface
     */
    public function prune($carreraHasAlumno = null)
    {
        if ($carreraHasAlumno) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CarreraHasAlumnoPeer::CARRERA_ID), $carreraHasAlumno->getCarreraId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CarreraHasAlumnoPeer::ALUMNO_ID), $carreraHasAlumno->getAlumnoId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
