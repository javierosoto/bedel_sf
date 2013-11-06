<?php


/**
 * Base class that represents a query for the 'alumno' table.
 *
 *
 *
 * @method AlumnoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AlumnoQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 * @method AlumnoQuery orderByEstadoAlumnoId($order = Criteria::ASC) Order by the estado_alumno_id column
 *
 * @method AlumnoQuery groupById() Group by the id column
 * @method AlumnoQuery groupByPersonaId() Group by the persona_id column
 * @method AlumnoQuery groupByEstadoAlumnoId() Group by the estado_alumno_id column
 *
 * @method AlumnoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AlumnoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AlumnoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AlumnoQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method AlumnoQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method AlumnoQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method AlumnoQuery leftJoinEstadoAlumno($relationAlias = null) Adds a LEFT JOIN clause to the query using the EstadoAlumno relation
 * @method AlumnoQuery rightJoinEstadoAlumno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EstadoAlumno relation
 * @method AlumnoQuery innerJoinEstadoAlumno($relationAlias = null) Adds a INNER JOIN clause to the query using the EstadoAlumno relation
 *
 * @method AlumnoQuery leftJoinCarreraHasAlumno($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarreraHasAlumno relation
 * @method AlumnoQuery rightJoinCarreraHasAlumno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarreraHasAlumno relation
 * @method AlumnoQuery innerJoinCarreraHasAlumno($relationAlias = null) Adds a INNER JOIN clause to the query using the CarreraHasAlumno relation
 *
 * @method Alumno findOne(PropelPDO $con = null) Return the first Alumno matching the query
 * @method Alumno findOneOrCreate(PropelPDO $con = null) Return the first Alumno matching the query, or a new Alumno object populated from the query conditions when no match is found
 *
 * @method Alumno findOneByPersonaId(int $persona_id) Return the first Alumno filtered by the persona_id column
 * @method Alumno findOneByEstadoAlumnoId(int $estado_alumno_id) Return the first Alumno filtered by the estado_alumno_id column
 *
 * @method array findById(int $id) Return Alumno objects filtered by the id column
 * @method array findByPersonaId(int $persona_id) Return Alumno objects filtered by the persona_id column
 * @method array findByEstadoAlumnoId(int $estado_alumno_id) Return Alumno objects filtered by the estado_alumno_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAlumnoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAlumnoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Alumno', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AlumnoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AlumnoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AlumnoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AlumnoQuery) {
            return $criteria;
        }
        $query = new AlumnoQuery();
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
     * @return   Alumno|Alumno[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AlumnoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Alumno A model object, or null if the key is not found
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
     * @return                 Alumno A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `persona_id`, `estado_alumno_id` FROM `alumno` WHERE `id` = :p0';
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
            $obj = new Alumno();
            $obj->hydrate($row);
            AlumnoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Alumno|Alumno[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Alumno[]|mixed the list of results, formatted by the current formatter
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
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AlumnoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AlumnoPeer::ID, $keys, Criteria::IN);
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
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AlumnoPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AlumnoPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlumnoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the persona_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonaId(1234); // WHERE persona_id = 1234
     * $query->filterByPersonaId(array(12, 34)); // WHERE persona_id IN (12, 34)
     * $query->filterByPersonaId(array('min' => 12)); // WHERE persona_id >= 12
     * $query->filterByPersonaId(array('max' => 12)); // WHERE persona_id <= 12
     * </code>
     *
     * @see       filterByPersona()
     *
     * @param     mixed $personaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function filterByPersonaId($personaId = null, $comparison = null)
    {
        if (is_array($personaId)) {
            $useMinMax = false;
            if (isset($personaId['min'])) {
                $this->addUsingAlias(AlumnoPeer::PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personaId['max'])) {
                $this->addUsingAlias(AlumnoPeer::PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlumnoPeer::PERSONA_ID, $personaId, $comparison);
    }

    /**
     * Filter the query on the estado_alumno_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEstadoAlumnoId(1234); // WHERE estado_alumno_id = 1234
     * $query->filterByEstadoAlumnoId(array(12, 34)); // WHERE estado_alumno_id IN (12, 34)
     * $query->filterByEstadoAlumnoId(array('min' => 12)); // WHERE estado_alumno_id >= 12
     * $query->filterByEstadoAlumnoId(array('max' => 12)); // WHERE estado_alumno_id <= 12
     * </code>
     *
     * @see       filterByEstadoAlumno()
     *
     * @param     mixed $estadoAlumnoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function filterByEstadoAlumnoId($estadoAlumnoId = null, $comparison = null)
    {
        if (is_array($estadoAlumnoId)) {
            $useMinMax = false;
            if (isset($estadoAlumnoId['min'])) {
                $this->addUsingAlias(AlumnoPeer::ESTADO_ALUMNO_ID, $estadoAlumnoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estadoAlumnoId['max'])) {
                $this->addUsingAlias(AlumnoPeer::ESTADO_ALUMNO_ID, $estadoAlumnoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlumnoPeer::ESTADO_ALUMNO_ID, $estadoAlumnoId, $comparison);
    }

    /**
     * Filter the query by a related Persona object
     *
     * @param   Persona|PropelObjectCollection $persona The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlumnoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof Persona) {
            return $this
                ->addUsingAlias(AlumnoPeer::PERSONA_ID, $persona->getId(), $comparison);
        } elseif ($persona instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlumnoPeer::PERSONA_ID, $persona->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersona() only accepts arguments of type Persona or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Persona relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function joinPersona($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Persona');

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
            $this->addJoinObject($join, 'Persona');
        }

        return $this;
    }

    /**
     * Use the Persona relation Persona object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonaQuery A secondary query class using the current class as primary query
     */
    public function usePersonaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersona($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persona', 'PersonaQuery');
    }

    /**
     * Filter the query by a related EstadoAlumno object
     *
     * @param   EstadoAlumno|PropelObjectCollection $estadoAlumno The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlumnoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEstadoAlumno($estadoAlumno, $comparison = null)
    {
        if ($estadoAlumno instanceof EstadoAlumno) {
            return $this
                ->addUsingAlias(AlumnoPeer::ESTADO_ALUMNO_ID, $estadoAlumno->getId(), $comparison);
        } elseif ($estadoAlumno instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlumnoPeer::ESTADO_ALUMNO_ID, $estadoAlumno->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEstadoAlumno() only accepts arguments of type EstadoAlumno or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EstadoAlumno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function joinEstadoAlumno($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EstadoAlumno');

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
            $this->addJoinObject($join, 'EstadoAlumno');
        }

        return $this;
    }

    /**
     * Use the EstadoAlumno relation EstadoAlumno object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EstadoAlumnoQuery A secondary query class using the current class as primary query
     */
    public function useEstadoAlumnoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEstadoAlumno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EstadoAlumno', 'EstadoAlumnoQuery');
    }

    /**
     * Filter the query by a related CarreraHasAlumno object
     *
     * @param   CarreraHasAlumno|PropelObjectCollection $carreraHasAlumno  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlumnoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCarreraHasAlumno($carreraHasAlumno, $comparison = null)
    {
        if ($carreraHasAlumno instanceof CarreraHasAlumno) {
            return $this
                ->addUsingAlias(AlumnoPeer::ID, $carreraHasAlumno->getAlumnoId(), $comparison);
        } elseif ($carreraHasAlumno instanceof PropelObjectCollection) {
            return $this
                ->useCarreraHasAlumnoQuery()
                ->filterByPrimaryKeys($carreraHasAlumno->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCarreraHasAlumno() only accepts arguments of type CarreraHasAlumno or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CarreraHasAlumno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function joinCarreraHasAlumno($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CarreraHasAlumno');

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
            $this->addJoinObject($join, 'CarreraHasAlumno');
        }

        return $this;
    }

    /**
     * Use the CarreraHasAlumno relation CarreraHasAlumno object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CarreraHasAlumnoQuery A secondary query class using the current class as primary query
     */
    public function useCarreraHasAlumnoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCarreraHasAlumno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CarreraHasAlumno', 'CarreraHasAlumnoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Alumno $alumno Object to remove from the list of results
     *
     * @return AlumnoQuery The current query, for fluid interface
     */
    public function prune($alumno = null)
    {
        if ($alumno) {
            $this->addUsingAlias(AlumnoPeer::ID, $alumno->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
