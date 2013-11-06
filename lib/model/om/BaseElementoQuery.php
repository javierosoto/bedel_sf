<?php


/**
 * Base class that represents a query for the 'elemento' table.
 *
 *
 *
 * @method ElementoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ElementoQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method ElementoQuery orderByDisponible($order = Criteria::ASC) Order by the disponible column
 * @method ElementoQuery orderByNumeroInventario($order = Criteria::ASC) Order by the numero_inventario column
 * @method ElementoQuery orderBySoloUdc($order = Criteria::ASC) Order by the solo_udc column
 *
 * @method ElementoQuery groupById() Group by the id column
 * @method ElementoQuery groupByDescripcion() Group by the descripcion column
 * @method ElementoQuery groupByDisponible() Group by the disponible column
 * @method ElementoQuery groupByNumeroInventario() Group by the numero_inventario column
 * @method ElementoQuery groupBySoloUdc() Group by the solo_udc column
 *
 * @method ElementoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ElementoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ElementoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ElementoQuery leftJoinElementoEnUso($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementoEnUso relation
 * @method ElementoQuery rightJoinElementoEnUso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementoEnUso relation
 * @method ElementoQuery innerJoinElementoEnUso($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementoEnUso relation
 *
 * @method Elemento findOne(PropelPDO $con = null) Return the first Elemento matching the query
 * @method Elemento findOneOrCreate(PropelPDO $con = null) Return the first Elemento matching the query, or a new Elemento object populated from the query conditions when no match is found
 *
 * @method Elemento findOneByDescripcion(string $descripcion) Return the first Elemento filtered by the descripcion column
 * @method Elemento findOneByDisponible(boolean $disponible) Return the first Elemento filtered by the disponible column
 * @method Elemento findOneByNumeroInventario(string $numero_inventario) Return the first Elemento filtered by the numero_inventario column
 * @method Elemento findOneBySoloUdc(boolean $solo_udc) Return the first Elemento filtered by the solo_udc column
 *
 * @method array findById(int $id) Return Elemento objects filtered by the id column
 * @method array findByDescripcion(string $descripcion) Return Elemento objects filtered by the descripcion column
 * @method array findByDisponible(boolean $disponible) Return Elemento objects filtered by the disponible column
 * @method array findByNumeroInventario(string $numero_inventario) Return Elemento objects filtered by the numero_inventario column
 * @method array findBySoloUdc(boolean $solo_udc) Return Elemento objects filtered by the solo_udc column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseElementoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseElementoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Elemento', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ElementoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ElementoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ElementoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ElementoQuery) {
            return $criteria;
        }
        $query = new ElementoQuery();
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
     * @return   Elemento|Elemento[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ElementoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ElementoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Elemento A model object, or null if the key is not found
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
     * @return                 Elemento A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `descripcion`, `disponible`, `numero_inventario`, `solo_udc` FROM `elemento` WHERE `id` = :p0';
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
            $obj = new Elemento();
            $obj->hydrate($row);
            ElementoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Elemento|Elemento[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Elemento[]|mixed the list of results, formatted by the current formatter
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
     * @return ElementoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElementoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ElementoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElementoPeer::ID, $keys, Criteria::IN);
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
     * @return ElementoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ElementoPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ElementoPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementoQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcion)) {
                $descripcion = str_replace('*', '%', $descripcion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementoPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the disponible column
     *
     * Example usage:
     * <code>
     * $query->filterByDisponible(true); // WHERE disponible = true
     * $query->filterByDisponible('yes'); // WHERE disponible = true
     * </code>
     *
     * @param     boolean|string $disponible The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementoQuery The current query, for fluid interface
     */
    public function filterByDisponible($disponible = null, $comparison = null)
    {
        if (is_string($disponible)) {
            $disponible = in_array(strtolower($disponible), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ElementoPeer::DISPONIBLE, $disponible, $comparison);
    }

    /**
     * Filter the query on the numero_inventario column
     *
     * Example usage:
     * <code>
     * $query->filterByNumeroInventario('fooValue');   // WHERE numero_inventario = 'fooValue'
     * $query->filterByNumeroInventario('%fooValue%'); // WHERE numero_inventario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numeroInventario The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementoQuery The current query, for fluid interface
     */
    public function filterByNumeroInventario($numeroInventario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numeroInventario)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numeroInventario)) {
                $numeroInventario = str_replace('*', '%', $numeroInventario);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementoPeer::NUMERO_INVENTARIO, $numeroInventario, $comparison);
    }

    /**
     * Filter the query on the solo_udc column
     *
     * Example usage:
     * <code>
     * $query->filterBySoloUdc(true); // WHERE solo_udc = true
     * $query->filterBySoloUdc('yes'); // WHERE solo_udc = true
     * </code>
     *
     * @param     boolean|string $soloUdc The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementoQuery The current query, for fluid interface
     */
    public function filterBySoloUdc($soloUdc = null, $comparison = null)
    {
        if (is_string($soloUdc)) {
            $soloUdc = in_array(strtolower($soloUdc), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ElementoPeer::SOLO_UDC, $soloUdc, $comparison);
    }

    /**
     * Filter the query by a related ElementoEnUso object
     *
     * @param   ElementoEnUso|PropelObjectCollection $elementoEnUso  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ElementoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementoEnUso($elementoEnUso, $comparison = null)
    {
        if ($elementoEnUso instanceof ElementoEnUso) {
            return $this
                ->addUsingAlias(ElementoPeer::ID, $elementoEnUso->getElementoId(), $comparison);
        } elseif ($elementoEnUso instanceof PropelObjectCollection) {
            return $this
                ->useElementoEnUsoQuery()
                ->filterByPrimaryKeys($elementoEnUso->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByElementoEnUso() only accepts arguments of type ElementoEnUso or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ElementoEnUso relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ElementoQuery The current query, for fluid interface
     */
    public function joinElementoEnUso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ElementoEnUso');

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
            $this->addJoinObject($join, 'ElementoEnUso');
        }

        return $this;
    }

    /**
     * Use the ElementoEnUso relation ElementoEnUso object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ElementoEnUsoQuery A secondary query class using the current class as primary query
     */
    public function useElementoEnUsoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinElementoEnUso($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ElementoEnUso', 'ElementoEnUsoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Elemento $elemento Object to remove from the list of results
     *
     * @return ElementoQuery The current query, for fluid interface
     */
    public function prune($elemento = null)
    {
        if ($elemento) {
            $this->addUsingAlias(ElementoPeer::ID, $elemento->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
