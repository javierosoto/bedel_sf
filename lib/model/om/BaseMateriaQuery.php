<?php


/**
 * Base class that represents a query for the 'materia' table.
 *
 *
 *
 * @method MateriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MateriaQuery orderByNombreMateria($order = Criteria::ASC) Order by the nombre_materia column
 * @method MateriaQuery orderByFechaInicioCursada($order = Criteria::ASC) Order by the fecha_inicio_cursada column
 * @method MateriaQuery orderByFechaFinCursada($order = Criteria::ASC) Order by the fecha_fin_cursada column
 * @method MateriaQuery orderByCarreraId($order = Criteria::ASC) Order by the carrera_id column
 *
 * @method MateriaQuery groupById() Group by the id column
 * @method MateriaQuery groupByNombreMateria() Group by the nombre_materia column
 * @method MateriaQuery groupByFechaInicioCursada() Group by the fecha_inicio_cursada column
 * @method MateriaQuery groupByFechaFinCursada() Group by the fecha_fin_cursada column
 * @method MateriaQuery groupByCarreraId() Group by the carrera_id column
 *
 * @method MateriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MateriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MateriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MateriaQuery leftJoinCarrera($relationAlias = null) Adds a LEFT JOIN clause to the query using the Carrera relation
 * @method MateriaQuery rightJoinCarrera($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Carrera relation
 * @method MateriaQuery innerJoinCarrera($relationAlias = null) Adds a INNER JOIN clause to the query using the Carrera relation
 *
 * @method MateriaQuery leftJoinComision($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comision relation
 * @method MateriaQuery rightJoinComision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comision relation
 * @method MateriaQuery innerJoinComision($relationAlias = null) Adds a INNER JOIN clause to the query using the Comision relation
 *
 * @method Materia findOne(PropelPDO $con = null) Return the first Materia matching the query
 * @method Materia findOneOrCreate(PropelPDO $con = null) Return the first Materia matching the query, or a new Materia object populated from the query conditions when no match is found
 *
 * @method Materia findOneByNombreMateria(string $nombre_materia) Return the first Materia filtered by the nombre_materia column
 * @method Materia findOneByFechaInicioCursada(string $fecha_inicio_cursada) Return the first Materia filtered by the fecha_inicio_cursada column
 * @method Materia findOneByFechaFinCursada(string $fecha_fin_cursada) Return the first Materia filtered by the fecha_fin_cursada column
 * @method Materia findOneByCarreraId(int $carrera_id) Return the first Materia filtered by the carrera_id column
 *
 * @method array findById(int $id) Return Materia objects filtered by the id column
 * @method array findByNombreMateria(string $nombre_materia) Return Materia objects filtered by the nombre_materia column
 * @method array findByFechaInicioCursada(string $fecha_inicio_cursada) Return Materia objects filtered by the fecha_inicio_cursada column
 * @method array findByFechaFinCursada(string $fecha_fin_cursada) Return Materia objects filtered by the fecha_fin_cursada column
 * @method array findByCarreraId(int $carrera_id) Return Materia objects filtered by the carrera_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMateriaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMateriaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Materia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MateriaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MateriaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MateriaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MateriaQuery) {
            return $criteria;
        }
        $query = new MateriaQuery();
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
     * @return   Materia|Materia[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MateriaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MateriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Materia A model object, or null if the key is not found
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
     * @return                 Materia A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre_materia`, `fecha_inicio_cursada`, `fecha_fin_cursada`, `carrera_id` FROM `materia` WHERE `id` = :p0';
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
            $obj = new Materia();
            $obj->hydrate($row);
            MateriaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Materia|Materia[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Materia[]|mixed the list of results, formatted by the current formatter
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
     * @return MateriaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MateriaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MateriaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MateriaPeer::ID, $keys, Criteria::IN);
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
     * @return MateriaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MateriaPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MateriaPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MateriaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre_materia column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreMateria('fooValue');   // WHERE nombre_materia = 'fooValue'
     * $query->filterByNombreMateria('%fooValue%'); // WHERE nombre_materia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreMateria The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MateriaQuery The current query, for fluid interface
     */
    public function filterByNombreMateria($nombreMateria = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreMateria)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombreMateria)) {
                $nombreMateria = str_replace('*', '%', $nombreMateria);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MateriaPeer::NOMBRE_MATERIA, $nombreMateria, $comparison);
    }

    /**
     * Filter the query on the fecha_inicio_cursada column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaInicioCursada('2011-03-14'); // WHERE fecha_inicio_cursada = '2011-03-14'
     * $query->filterByFechaInicioCursada('now'); // WHERE fecha_inicio_cursada = '2011-03-14'
     * $query->filterByFechaInicioCursada(array('max' => 'yesterday')); // WHERE fecha_inicio_cursada > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaInicioCursada The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MateriaQuery The current query, for fluid interface
     */
    public function filterByFechaInicioCursada($fechaInicioCursada = null, $comparison = null)
    {
        if (is_array($fechaInicioCursada)) {
            $useMinMax = false;
            if (isset($fechaInicioCursada['min'])) {
                $this->addUsingAlias(MateriaPeer::FECHA_INICIO_CURSADA, $fechaInicioCursada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaInicioCursada['max'])) {
                $this->addUsingAlias(MateriaPeer::FECHA_INICIO_CURSADA, $fechaInicioCursada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MateriaPeer::FECHA_INICIO_CURSADA, $fechaInicioCursada, $comparison);
    }

    /**
     * Filter the query on the fecha_fin_cursada column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaFinCursada('2011-03-14'); // WHERE fecha_fin_cursada = '2011-03-14'
     * $query->filterByFechaFinCursada('now'); // WHERE fecha_fin_cursada = '2011-03-14'
     * $query->filterByFechaFinCursada(array('max' => 'yesterday')); // WHERE fecha_fin_cursada > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaFinCursada The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MateriaQuery The current query, for fluid interface
     */
    public function filterByFechaFinCursada($fechaFinCursada = null, $comparison = null)
    {
        if (is_array($fechaFinCursada)) {
            $useMinMax = false;
            if (isset($fechaFinCursada['min'])) {
                $this->addUsingAlias(MateriaPeer::FECHA_FIN_CURSADA, $fechaFinCursada['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaFinCursada['max'])) {
                $this->addUsingAlias(MateriaPeer::FECHA_FIN_CURSADA, $fechaFinCursada['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MateriaPeer::FECHA_FIN_CURSADA, $fechaFinCursada, $comparison);
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
     * @return MateriaQuery The current query, for fluid interface
     */
    public function filterByCarreraId($carreraId = null, $comparison = null)
    {
        if (is_array($carreraId)) {
            $useMinMax = false;
            if (isset($carreraId['min'])) {
                $this->addUsingAlias(MateriaPeer::CARRERA_ID, $carreraId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carreraId['max'])) {
                $this->addUsingAlias(MateriaPeer::CARRERA_ID, $carreraId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MateriaPeer::CARRERA_ID, $carreraId, $comparison);
    }

    /**
     * Filter the query by a related Carrera object
     *
     * @param   Carrera|PropelObjectCollection $carrera The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MateriaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCarrera($carrera, $comparison = null)
    {
        if ($carrera instanceof Carrera) {
            return $this
                ->addUsingAlias(MateriaPeer::CARRERA_ID, $carrera->getId(), $comparison);
        } elseif ($carrera instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MateriaPeer::CARRERA_ID, $carrera->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return MateriaQuery The current query, for fluid interface
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
     * Filter the query by a related Comision object
     *
     * @param   Comision|PropelObjectCollection $comision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MateriaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByComision($comision, $comparison = null)
    {
        if ($comision instanceof Comision) {
            return $this
                ->addUsingAlias(MateriaPeer::ID, $comision->getMateriaId(), $comparison);
        } elseif ($comision instanceof PropelObjectCollection) {
            return $this
                ->useComisionQuery()
                ->filterByPrimaryKeys($comision->getPrimaryKeys())
                ->endUse();
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
     * @return MateriaQuery The current query, for fluid interface
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
     * @param   Materia $materia Object to remove from the list of results
     *
     * @return MateriaQuery The current query, for fluid interface
     */
    public function prune($materia = null)
    {
        if ($materia) {
            $this->addUsingAlias(MateriaPeer::ID, $materia->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
