<?php


/**
 * Base class that represents a query for the 'elemento_en_uso' table.
 *
 *
 *
 * @method ElementoEnUsoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ElementoEnUsoQuery orderByHoraFechaRetiro($order = Criteria::ASC) Order by the hora_fecha_retiro column
 * @method ElementoEnUsoQuery orderByHoraFechaEntrega($order = Criteria::ASC) Order by the hora_fecha_entrega column
 * @method ElementoEnUsoQuery orderByElementoId($order = Criteria::ASC) Order by the elemento_id column
 * @method ElementoEnUsoQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 *
 * @method ElementoEnUsoQuery groupById() Group by the id column
 * @method ElementoEnUsoQuery groupByHoraFechaRetiro() Group by the hora_fecha_retiro column
 * @method ElementoEnUsoQuery groupByHoraFechaEntrega() Group by the hora_fecha_entrega column
 * @method ElementoEnUsoQuery groupByElementoId() Group by the elemento_id column
 * @method ElementoEnUsoQuery groupByPersonaId() Group by the persona_id column
 *
 * @method ElementoEnUsoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ElementoEnUsoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ElementoEnUsoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ElementoEnUsoQuery leftJoinElemento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Elemento relation
 * @method ElementoEnUsoQuery rightJoinElemento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Elemento relation
 * @method ElementoEnUsoQuery innerJoinElemento($relationAlias = null) Adds a INNER JOIN clause to the query using the Elemento relation
 *
 * @method ElementoEnUsoQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method ElementoEnUsoQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method ElementoEnUsoQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method ElementoEnUso findOne(PropelPDO $con = null) Return the first ElementoEnUso matching the query
 * @method ElementoEnUso findOneOrCreate(PropelPDO $con = null) Return the first ElementoEnUso matching the query, or a new ElementoEnUso object populated from the query conditions when no match is found
 *
 * @method ElementoEnUso findOneByHoraFechaRetiro(string $hora_fecha_retiro) Return the first ElementoEnUso filtered by the hora_fecha_retiro column
 * @method ElementoEnUso findOneByHoraFechaEntrega(string $hora_fecha_entrega) Return the first ElementoEnUso filtered by the hora_fecha_entrega column
 * @method ElementoEnUso findOneByElementoId(int $elemento_id) Return the first ElementoEnUso filtered by the elemento_id column
 * @method ElementoEnUso findOneByPersonaId(int $persona_id) Return the first ElementoEnUso filtered by the persona_id column
 *
 * @method array findById(int $id) Return ElementoEnUso objects filtered by the id column
 * @method array findByHoraFechaRetiro(string $hora_fecha_retiro) Return ElementoEnUso objects filtered by the hora_fecha_retiro column
 * @method array findByHoraFechaEntrega(string $hora_fecha_entrega) Return ElementoEnUso objects filtered by the hora_fecha_entrega column
 * @method array findByElementoId(int $elemento_id) Return ElementoEnUso objects filtered by the elemento_id column
 * @method array findByPersonaId(int $persona_id) Return ElementoEnUso objects filtered by the persona_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseElementoEnUsoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseElementoEnUsoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'ElementoEnUso', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ElementoEnUsoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ElementoEnUsoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ElementoEnUsoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ElementoEnUsoQuery) {
            return $criteria;
        }
        $query = new ElementoEnUsoQuery();
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
     * @return   ElementoEnUso|ElementoEnUso[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ElementoEnUsoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ElementoEnUsoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ElementoEnUso A model object, or null if the key is not found
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
     * @return                 ElementoEnUso A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `hora_fecha_retiro`, `hora_fecha_entrega`, `elemento_id`, `persona_id` FROM `elemento_en_uso` WHERE `id` = :p0';
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
            $obj = new ElementoEnUso();
            $obj->hydrate($row);
            ElementoEnUsoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ElementoEnUso|ElementoEnUso[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ElementoEnUso[]|mixed the list of results, formatted by the current formatter
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
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElementoEnUsoPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElementoEnUsoPeer::ID, $keys, Criteria::IN);
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
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementoEnUsoPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the hora_fecha_retiro column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraFechaRetiro('2011-03-14'); // WHERE hora_fecha_retiro = '2011-03-14'
     * $query->filterByHoraFechaRetiro('now'); // WHERE hora_fecha_retiro = '2011-03-14'
     * $query->filterByHoraFechaRetiro(array('max' => 'yesterday')); // WHERE hora_fecha_retiro > '2011-03-13'
     * </code>
     *
     * @param     mixed $horaFechaRetiro The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function filterByHoraFechaRetiro($horaFechaRetiro = null, $comparison = null)
    {
        if (is_array($horaFechaRetiro)) {
            $useMinMax = false;
            if (isset($horaFechaRetiro['min'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::HORA_FECHA_RETIRO, $horaFechaRetiro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaFechaRetiro['max'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::HORA_FECHA_RETIRO, $horaFechaRetiro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementoEnUsoPeer::HORA_FECHA_RETIRO, $horaFechaRetiro, $comparison);
    }

    /**
     * Filter the query on the hora_fecha_entrega column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraFechaEntrega('2011-03-14'); // WHERE hora_fecha_entrega = '2011-03-14'
     * $query->filterByHoraFechaEntrega('now'); // WHERE hora_fecha_entrega = '2011-03-14'
     * $query->filterByHoraFechaEntrega(array('max' => 'yesterday')); // WHERE hora_fecha_entrega > '2011-03-13'
     * </code>
     *
     * @param     mixed $horaFechaEntrega The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function filterByHoraFechaEntrega($horaFechaEntrega = null, $comparison = null)
    {
        if (is_array($horaFechaEntrega)) {
            $useMinMax = false;
            if (isset($horaFechaEntrega['min'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::HORA_FECHA_ENTREGA, $horaFechaEntrega['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaFechaEntrega['max'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::HORA_FECHA_ENTREGA, $horaFechaEntrega['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementoEnUsoPeer::HORA_FECHA_ENTREGA, $horaFechaEntrega, $comparison);
    }

    /**
     * Filter the query on the elemento_id column
     *
     * Example usage:
     * <code>
     * $query->filterByElementoId(1234); // WHERE elemento_id = 1234
     * $query->filterByElementoId(array(12, 34)); // WHERE elemento_id IN (12, 34)
     * $query->filterByElementoId(array('min' => 12)); // WHERE elemento_id >= 12
     * $query->filterByElementoId(array('max' => 12)); // WHERE elemento_id <= 12
     * </code>
     *
     * @see       filterByElemento()
     *
     * @param     mixed $elementoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function filterByElementoId($elementoId = null, $comparison = null)
    {
        if (is_array($elementoId)) {
            $useMinMax = false;
            if (isset($elementoId['min'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::ELEMENTO_ID, $elementoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($elementoId['max'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::ELEMENTO_ID, $elementoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementoEnUsoPeer::ELEMENTO_ID, $elementoId, $comparison);
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
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function filterByPersonaId($personaId = null, $comparison = null)
    {
        if (is_array($personaId)) {
            $useMinMax = false;
            if (isset($personaId['min'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personaId['max'])) {
                $this->addUsingAlias(ElementoEnUsoPeer::PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementoEnUsoPeer::PERSONA_ID, $personaId, $comparison);
    }

    /**
     * Filter the query by a related Elemento object
     *
     * @param   Elemento|PropelObjectCollection $elemento The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ElementoEnUsoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElemento($elemento, $comparison = null)
    {
        if ($elemento instanceof Elemento) {
            return $this
                ->addUsingAlias(ElementoEnUsoPeer::ELEMENTO_ID, $elemento->getId(), $comparison);
        } elseif ($elemento instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ElementoEnUsoPeer::ELEMENTO_ID, $elemento->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByElemento() only accepts arguments of type Elemento or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Elemento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function joinElemento($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Elemento');

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
            $this->addJoinObject($join, 'Elemento');
        }

        return $this;
    }

    /**
     * Use the Elemento relation Elemento object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ElementoQuery A secondary query class using the current class as primary query
     */
    public function useElementoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinElemento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Elemento', 'ElementoQuery');
    }

    /**
     * Filter the query by a related Persona object
     *
     * @param   Persona|PropelObjectCollection $persona The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ElementoEnUsoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersona($persona, $comparison = null)
    {
        if ($persona instanceof Persona) {
            return $this
                ->addUsingAlias(ElementoEnUsoPeer::PERSONA_ID, $persona->getId(), $comparison);
        } elseif ($persona instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ElementoEnUsoPeer::PERSONA_ID, $persona->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ElementoEnUsoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ElementoEnUso $elementoEnUso Object to remove from the list of results
     *
     * @return ElementoEnUsoQuery The current query, for fluid interface
     */
    public function prune($elementoEnUso = null)
    {
        if ($elementoEnUso) {
            $this->addUsingAlias(ElementoEnUsoPeer::ID, $elementoEnUso->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
