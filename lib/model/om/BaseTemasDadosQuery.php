<?php


/**
 * Base class that represents a query for the 'temas_dados' table.
 *
 *
 *
 * @method TemasDadosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TemasDadosQuery orderByFechaHora($order = Criteria::ASC) Order by the fecha_hora column
 * @method TemasDadosQuery orderByTema($order = Criteria::ASC) Order by the tema column
 * @method TemasDadosQuery orderByComisionId($order = Criteria::ASC) Order by the comision_id column
 *
 * @method TemasDadosQuery groupById() Group by the id column
 * @method TemasDadosQuery groupByFechaHora() Group by the fecha_hora column
 * @method TemasDadosQuery groupByTema() Group by the tema column
 * @method TemasDadosQuery groupByComisionId() Group by the comision_id column
 *
 * @method TemasDadosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TemasDadosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TemasDadosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TemasDadosQuery leftJoinComision($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comision relation
 * @method TemasDadosQuery rightJoinComision($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comision relation
 * @method TemasDadosQuery innerJoinComision($relationAlias = null) Adds a INNER JOIN clause to the query using the Comision relation
 *
 * @method TemasDados findOne(PropelPDO $con = null) Return the first TemasDados matching the query
 * @method TemasDados findOneOrCreate(PropelPDO $con = null) Return the first TemasDados matching the query, or a new TemasDados object populated from the query conditions when no match is found
 *
 * @method TemasDados findOneByFechaHora(string $fecha_hora) Return the first TemasDados filtered by the fecha_hora column
 * @method TemasDados findOneByTema(string $tema) Return the first TemasDados filtered by the tema column
 * @method TemasDados findOneByComisionId(int $comision_id) Return the first TemasDados filtered by the comision_id column
 *
 * @method array findById(int $id) Return TemasDados objects filtered by the id column
 * @method array findByFechaHora(string $fecha_hora) Return TemasDados objects filtered by the fecha_hora column
 * @method array findByTema(string $tema) Return TemasDados objects filtered by the tema column
 * @method array findByComisionId(int $comision_id) Return TemasDados objects filtered by the comision_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTemasDadosQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTemasDadosQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'TemasDados', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TemasDadosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TemasDadosQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TemasDadosQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TemasDadosQuery) {
            return $criteria;
        }
        $query = new TemasDadosQuery();
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
     * @return   TemasDados|TemasDados[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TemasDadosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TemasDadosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TemasDados A model object, or null if the key is not found
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
     * @return                 TemasDados A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `fecha_hora`, `tema`, `comision_id` FROM `temas_dados` WHERE `id` = :p0';
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
            $obj = new TemasDados();
            $obj->hydrate($row);
            TemasDadosPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TemasDados|TemasDados[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TemasDados[]|mixed the list of results, formatted by the current formatter
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
     * @return TemasDadosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TemasDadosPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TemasDadosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TemasDadosPeer::ID, $keys, Criteria::IN);
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
     * @return TemasDadosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TemasDadosPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TemasDadosPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemasDadosPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the fecha_hora column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaHora('2011-03-14'); // WHERE fecha_hora = '2011-03-14'
     * $query->filterByFechaHora('now'); // WHERE fecha_hora = '2011-03-14'
     * $query->filterByFechaHora(array('max' => 'yesterday')); // WHERE fecha_hora > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaHora The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemasDadosQuery The current query, for fluid interface
     */
    public function filterByFechaHora($fechaHora = null, $comparison = null)
    {
        if (is_array($fechaHora)) {
            $useMinMax = false;
            if (isset($fechaHora['min'])) {
                $this->addUsingAlias(TemasDadosPeer::FECHA_HORA, $fechaHora['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaHora['max'])) {
                $this->addUsingAlias(TemasDadosPeer::FECHA_HORA, $fechaHora['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemasDadosPeer::FECHA_HORA, $fechaHora, $comparison);
    }

    /**
     * Filter the query on the tema column
     *
     * Example usage:
     * <code>
     * $query->filterByTema('fooValue');   // WHERE tema = 'fooValue'
     * $query->filterByTema('%fooValue%'); // WHERE tema LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tema The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemasDadosQuery The current query, for fluid interface
     */
    public function filterByTema($tema = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tema)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tema)) {
                $tema = str_replace('*', '%', $tema);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TemasDadosPeer::TEMA, $tema, $comparison);
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
     * @return TemasDadosQuery The current query, for fluid interface
     */
    public function filterByComisionId($comisionId = null, $comparison = null)
    {
        if (is_array($comisionId)) {
            $useMinMax = false;
            if (isset($comisionId['min'])) {
                $this->addUsingAlias(TemasDadosPeer::COMISION_ID, $comisionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($comisionId['max'])) {
                $this->addUsingAlias(TemasDadosPeer::COMISION_ID, $comisionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemasDadosPeer::COMISION_ID, $comisionId, $comparison);
    }

    /**
     * Filter the query by a related Comision object
     *
     * @param   Comision|PropelObjectCollection $comision The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemasDadosQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByComision($comision, $comparison = null)
    {
        if ($comision instanceof Comision) {
            return $this
                ->addUsingAlias(TemasDadosPeer::COMISION_ID, $comision->getId(), $comparison);
        } elseif ($comision instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemasDadosPeer::COMISION_ID, $comision->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TemasDadosQuery The current query, for fluid interface
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
     * @param   TemasDados $temasDados Object to remove from the list of results
     *
     * @return TemasDadosQuery The current query, for fluid interface
     */
    public function prune($temasDados = null)
    {
        if ($temasDados) {
            $this->addUsingAlias(TemasDadosPeer::ID, $temasDados->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
