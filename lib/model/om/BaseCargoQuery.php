<?php


/**
 * Base class that represents a query for the 'cargo' table.
 *
 *
 *
 * @method CargoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CargoQuery orderByDescripcionCargo($order = Criteria::ASC) Order by the descripcion_cargo column
 *
 * @method CargoQuery groupById() Group by the id column
 * @method CargoQuery groupByDescripcionCargo() Group by the descripcion_cargo column
 *
 * @method CargoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CargoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CargoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CargoQuery leftJoinProfesor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Profesor relation
 * @method CargoQuery rightJoinProfesor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Profesor relation
 * @method CargoQuery innerJoinProfesor($relationAlias = null) Adds a INNER JOIN clause to the query using the Profesor relation
 *
 * @method Cargo findOne(PropelPDO $con = null) Return the first Cargo matching the query
 * @method Cargo findOneOrCreate(PropelPDO $con = null) Return the first Cargo matching the query, or a new Cargo object populated from the query conditions when no match is found
 *
 * @method Cargo findOneByDescripcionCargo(string $descripcion_cargo) Return the first Cargo filtered by the descripcion_cargo column
 *
 * @method array findById(int $id) Return Cargo objects filtered by the id column
 * @method array findByDescripcionCargo(string $descripcion_cargo) Return Cargo objects filtered by the descripcion_cargo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCargoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCargoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Cargo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CargoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CargoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CargoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CargoQuery) {
            return $criteria;
        }
        $query = new CargoQuery();
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
     * @return   Cargo|Cargo[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CargoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CargoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Cargo A model object, or null if the key is not found
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
     * @return                 Cargo A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `descripcion_cargo` FROM `cargo` WHERE `id` = :p0';
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
            $obj = new Cargo();
            $obj->hydrate($row);
            CargoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Cargo|Cargo[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Cargo[]|mixed the list of results, formatted by the current formatter
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
     * @return CargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CargoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CargoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CargoPeer::ID, $keys, Criteria::IN);
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
     * @return CargoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CargoPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CargoPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CargoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the descripcion_cargo column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionCargo('fooValue');   // WHERE descripcion_cargo = 'fooValue'
     * $query->filterByDescripcionCargo('%fooValue%'); // WHERE descripcion_cargo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionCargo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CargoQuery The current query, for fluid interface
     */
    public function filterByDescripcionCargo($descripcionCargo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionCargo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionCargo)) {
                $descripcionCargo = str_replace('*', '%', $descripcionCargo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CargoPeer::DESCRIPCION_CARGO, $descripcionCargo, $comparison);
    }

    /**
     * Filter the query by a related Profesor object
     *
     * @param   Profesor|PropelObjectCollection $profesor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CargoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProfesor($profesor, $comparison = null)
    {
        if ($profesor instanceof Profesor) {
            return $this
                ->addUsingAlias(CargoPeer::ID, $profesor->getCargoId(), $comparison);
        } elseif ($profesor instanceof PropelObjectCollection) {
            return $this
                ->useProfesorQuery()
                ->filterByPrimaryKeys($profesor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProfesor() only accepts arguments of type Profesor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Profesor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CargoQuery The current query, for fluid interface
     */
    public function joinProfesor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Profesor');

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
            $this->addJoinObject($join, 'Profesor');
        }

        return $this;
    }

    /**
     * Use the Profesor relation Profesor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProfesorQuery A secondary query class using the current class as primary query
     */
    public function useProfesorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProfesor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Profesor', 'ProfesorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Cargo $cargo Object to remove from the list of results
     *
     * @return CargoQuery The current query, for fluid interface
     */
    public function prune($cargo = null)
    {
        if ($cargo) {
            $this->addUsingAlias(CargoPeer::ID, $cargo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
