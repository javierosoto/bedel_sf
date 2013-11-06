<?php


/**
 * Base class that represents a query for the 'aula' table.
 *
 *
 *
 * @method AulaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AulaQuery orderByDescripcionAula($order = Criteria::ASC) Order by the descripcion_aula column
 *
 * @method AulaQuery groupById() Group by the id column
 * @method AulaQuery groupByDescripcionAula() Group by the descripcion_aula column
 *
 * @method AulaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AulaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AulaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AulaQuery leftJoinComision($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comision relation
 * @method AulaQuery rightJoinComision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comision relation
 * @method AulaQuery innerJoinComision($relationAlias = null) Adds a INNER JOIN clause to the query using the Comision relation
 *
 * @method Aula findOne(PropelPDO $con = null) Return the first Aula matching the query
 * @method Aula findOneOrCreate(PropelPDO $con = null) Return the first Aula matching the query, or a new Aula object populated from the query conditions when no match is found
 *
 * @method Aula findOneByDescripcionAula(string $descripcion_aula) Return the first Aula filtered by the descripcion_aula column
 *
 * @method array findById(int $id) Return Aula objects filtered by the id column
 * @method array findByDescripcionAula(string $descripcion_aula) Return Aula objects filtered by the descripcion_aula column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAulaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAulaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Aula', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AulaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AulaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AulaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AulaQuery) {
            return $criteria;
        }
        $query = new AulaQuery();
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
     * @return   Aula|Aula[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AulaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AulaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Aula A model object, or null if the key is not found
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
     * @return                 Aula A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `descripcion_aula` FROM `aula` WHERE `id` = :p0';
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
            $obj = new Aula();
            $obj->hydrate($row);
            AulaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Aula|Aula[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Aula[]|mixed the list of results, formatted by the current formatter
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
     * @return AulaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AulaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AulaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AulaPeer::ID, $keys, Criteria::IN);
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
     * @return AulaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AulaPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AulaPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AulaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the descripcion_aula column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionAula('fooValue');   // WHERE descripcion_aula = 'fooValue'
     * $query->filterByDescripcionAula('%fooValue%'); // WHERE descripcion_aula LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionAula The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AulaQuery The current query, for fluid interface
     */
    public function filterByDescripcionAula($descripcionAula = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionAula)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionAula)) {
                $descripcionAula = str_replace('*', '%', $descripcionAula);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AulaPeer::DESCRIPCION_AULA, $descripcionAula, $comparison);
    }

    /**
     * Filter the query by a related Comision object
     *
     * @param   Comision|PropelObjectCollection $comision  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AulaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByComision($comision, $comparison = null)
    {
        if ($comision instanceof Comision) {
            return $this
                ->addUsingAlias(AulaPeer::ID, $comision->getAulaId(), $comparison);
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
     * @return AulaQuery The current query, for fluid interface
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
     * @param   Aula $aula Object to remove from the list of results
     *
     * @return AulaQuery The current query, for fluid interface
     */
    public function prune($aula = null)
    {
        if ($aula) {
            $this->addUsingAlias(AulaPeer::ID, $aula->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
