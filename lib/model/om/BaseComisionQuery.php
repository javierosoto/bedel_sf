<?php


/**
 * Base class that represents a query for the 'comision' table.
 *
 *
 *
 * @method ComisionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ComisionQuery orderByDescripcionComision($order = Criteria::ASC) Order by the descripcion_comision column
 * @method ComisionQuery orderByMateriaId($order = Criteria::ASC) Order by the materia_id column
 * @method ComisionQuery orderByAulaId($order = Criteria::ASC) Order by the aula_id column
 * @method ComisionQuery orderByProfesorId($order = Criteria::ASC) Order by the profesor_id column
 *
 * @method ComisionQuery groupById() Group by the id column
 * @method ComisionQuery groupByDescripcionComision() Group by the descripcion_comision column
 * @method ComisionQuery groupByMateriaId() Group by the materia_id column
 * @method ComisionQuery groupByAulaId() Group by the aula_id column
 * @method ComisionQuery groupByProfesorId() Group by the profesor_id column
 *
 * @method ComisionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ComisionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ComisionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ComisionQuery leftJoinMateria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Materia relation
 * @method ComisionQuery rightJoinMateria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Materia relation
 * @method ComisionQuery innerJoinMateria($relationAlias = null) Adds a INNER JOIN clause to the query using the Materia relation
 *
 * @method ComisionQuery leftJoinAula($relationAlias = null) Adds a LEFT JOIN clause to the query using the Aula relation
 * @method ComisionQuery rightJoinAula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Aula relation
 * @method ComisionQuery innerJoinAula($relationAlias = null) Adds a INNER JOIN clause to the query using the Aula relation
 *
 * @method ComisionQuery leftJoinProfesor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Profesor relation
 * @method ComisionQuery rightJoinProfesor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Profesor relation
 * @method ComisionQuery innerJoinProfesor($relationAlias = null) Adds a INNER JOIN clause to the query using the Profesor relation
 *
 * @method ComisionQuery leftJoinFichaje($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fichaje relation
 * @method ComisionQuery rightJoinFichaje($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fichaje relation
 * @method ComisionQuery innerJoinFichaje($relationAlias = null) Adds a INNER JOIN clause to the query using the Fichaje relation
 *
 * @method ComisionQuery leftJoinTemasDados($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemasDados relation
 * @method ComisionQuery rightJoinTemasDados($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemasDados relation
 * @method ComisionQuery innerJoinTemasDados($relationAlias = null) Adds a INNER JOIN clause to the query using the TemasDados relation
 *
 * @method Comision findOne(PropelPDO $con = null) Return the first Comision matching the query
 * @method Comision findOneOrCreate(PropelPDO $con = null) Return the first Comision matching the query, or a new Comision object populated from the query conditions when no match is found
 *
 * @method Comision findOneByDescripcionComision(string $descripcion_comision) Return the first Comision filtered by the descripcion_comision column
 * @method Comision findOneByMateriaId(int $materia_id) Return the first Comision filtered by the materia_id column
 * @method Comision findOneByAulaId(int $aula_id) Return the first Comision filtered by the aula_id column
 * @method Comision findOneByProfesorId(int $profesor_id) Return the first Comision filtered by the profesor_id column
 *
 * @method array findById(int $id) Return Comision objects filtered by the id column
 * @method array findByDescripcionComision(string $descripcion_comision) Return Comision objects filtered by the descripcion_comision column
 * @method array findByMateriaId(int $materia_id) Return Comision objects filtered by the materia_id column
 * @method array findByAulaId(int $aula_id) Return Comision objects filtered by the aula_id column
 * @method array findByProfesorId(int $profesor_id) Return Comision objects filtered by the profesor_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseComisionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseComisionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Comision', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ComisionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ComisionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ComisionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ComisionQuery) {
            return $criteria;
        }
        $query = new ComisionQuery();
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
     * @return   Comision|Comision[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ComisionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ComisionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Comision A model object, or null if the key is not found
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
     * @return                 Comision A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `descripcion_comision`, `materia_id`, `aula_id`, `profesor_id` FROM `comision` WHERE `id` = :p0';
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
            $obj = new Comision();
            $obj->hydrate($row);
            ComisionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Comision|Comision[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Comision[]|mixed the list of results, formatted by the current formatter
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
     * @return ComisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ComisionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ComisionPeer::ID, $keys, Criteria::IN);
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
     * @return ComisionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ComisionPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ComisionPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComisionPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the descripcion_comision column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcionComision('fooValue');   // WHERE descripcion_comision = 'fooValue'
     * $query->filterByDescripcionComision('%fooValue%'); // WHERE descripcion_comision LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcionComision The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function filterByDescripcionComision($descripcionComision = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcionComision)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcionComision)) {
                $descripcionComision = str_replace('*', '%', $descripcionComision);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ComisionPeer::DESCRIPCION_COMISION, $descripcionComision, $comparison);
    }

    /**
     * Filter the query on the materia_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMateriaId(1234); // WHERE materia_id = 1234
     * $query->filterByMateriaId(array(12, 34)); // WHERE materia_id IN (12, 34)
     * $query->filterByMateriaId(array('min' => 12)); // WHERE materia_id >= 12
     * $query->filterByMateriaId(array('max' => 12)); // WHERE materia_id <= 12
     * </code>
     *
     * @see       filterByMateria()
     *
     * @param     mixed $materiaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function filterByMateriaId($materiaId = null, $comparison = null)
    {
        if (is_array($materiaId)) {
            $useMinMax = false;
            if (isset($materiaId['min'])) {
                $this->addUsingAlias(ComisionPeer::MATERIA_ID, $materiaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($materiaId['max'])) {
                $this->addUsingAlias(ComisionPeer::MATERIA_ID, $materiaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComisionPeer::MATERIA_ID, $materiaId, $comparison);
    }

    /**
     * Filter the query on the aula_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAulaId(1234); // WHERE aula_id = 1234
     * $query->filterByAulaId(array(12, 34)); // WHERE aula_id IN (12, 34)
     * $query->filterByAulaId(array('min' => 12)); // WHERE aula_id >= 12
     * $query->filterByAulaId(array('max' => 12)); // WHERE aula_id <= 12
     * </code>
     *
     * @see       filterByAula()
     *
     * @param     mixed $aulaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function filterByAulaId($aulaId = null, $comparison = null)
    {
        if (is_array($aulaId)) {
            $useMinMax = false;
            if (isset($aulaId['min'])) {
                $this->addUsingAlias(ComisionPeer::AULA_ID, $aulaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aulaId['max'])) {
                $this->addUsingAlias(ComisionPeer::AULA_ID, $aulaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComisionPeer::AULA_ID, $aulaId, $comparison);
    }

    /**
     * Filter the query on the profesor_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProfesorId(1234); // WHERE profesor_id = 1234
     * $query->filterByProfesorId(array(12, 34)); // WHERE profesor_id IN (12, 34)
     * $query->filterByProfesorId(array('min' => 12)); // WHERE profesor_id >= 12
     * $query->filterByProfesorId(array('max' => 12)); // WHERE profesor_id <= 12
     * </code>
     *
     * @see       filterByProfesor()
     *
     * @param     mixed $profesorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function filterByProfesorId($profesorId = null, $comparison = null)
    {
        if (is_array($profesorId)) {
            $useMinMax = false;
            if (isset($profesorId['min'])) {
                $this->addUsingAlias(ComisionPeer::PROFESOR_ID, $profesorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($profesorId['max'])) {
                $this->addUsingAlias(ComisionPeer::PROFESOR_ID, $profesorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ComisionPeer::PROFESOR_ID, $profesorId, $comparison);
    }

    /**
     * Filter the query by a related Materia object
     *
     * @param   Materia|PropelObjectCollection $materia The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ComisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMateria($materia, $comparison = null)
    {
        if ($materia instanceof Materia) {
            return $this
                ->addUsingAlias(ComisionPeer::MATERIA_ID, $materia->getId(), $comparison);
        } elseif ($materia instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ComisionPeer::MATERIA_ID, $materia->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMateria() only accepts arguments of type Materia or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Materia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function joinMateria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Materia');

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
            $this->addJoinObject($join, 'Materia');
        }

        return $this;
    }

    /**
     * Use the Materia relation Materia object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MateriaQuery A secondary query class using the current class as primary query
     */
    public function useMateriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMateria($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Materia', 'MateriaQuery');
    }

    /**
     * Filter the query by a related Aula object
     *
     * @param   Aula|PropelObjectCollection $aula The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ComisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAula($aula, $comparison = null)
    {
        if ($aula instanceof Aula) {
            return $this
                ->addUsingAlias(ComisionPeer::AULA_ID, $aula->getId(), $comparison);
        } elseif ($aula instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ComisionPeer::AULA_ID, $aula->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAula() only accepts arguments of type Aula or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Aula relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function joinAula($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Aula');

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
            $this->addJoinObject($join, 'Aula');
        }

        return $this;
    }

    /**
     * Use the Aula relation Aula object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AulaQuery A secondary query class using the current class as primary query
     */
    public function useAulaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAula($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Aula', 'AulaQuery');
    }

    /**
     * Filter the query by a related Profesor object
     *
     * @param   Profesor|PropelObjectCollection $profesor The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ComisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProfesor($profesor, $comparison = null)
    {
        if ($profesor instanceof Profesor) {
            return $this
                ->addUsingAlias(ComisionPeer::PROFESOR_ID, $profesor->getId(), $comparison);
        } elseif ($profesor instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ComisionPeer::PROFESOR_ID, $profesor->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ComisionQuery The current query, for fluid interface
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
     * Filter the query by a related Fichaje object
     *
     * @param   Fichaje|PropelObjectCollection $fichaje  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ComisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFichaje($fichaje, $comparison = null)
    {
        if ($fichaje instanceof Fichaje) {
            return $this
                ->addUsingAlias(ComisionPeer::ID, $fichaje->getComisionId(), $comparison);
        } elseif ($fichaje instanceof PropelObjectCollection) {
            return $this
                ->useFichajeQuery()
                ->filterByPrimaryKeys($fichaje->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFichaje() only accepts arguments of type Fichaje or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Fichaje relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function joinFichaje($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Fichaje');

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
            $this->addJoinObject($join, 'Fichaje');
        }

        return $this;
    }

    /**
     * Use the Fichaje relation Fichaje object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FichajeQuery A secondary query class using the current class as primary query
     */
    public function useFichajeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFichaje($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Fichaje', 'FichajeQuery');
    }

    /**
     * Filter the query by a related TemasDados object
     *
     * @param   TemasDados|PropelObjectCollection $temasDados  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ComisionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemasDados($temasDados, $comparison = null)
    {
        if ($temasDados instanceof TemasDados) {
            return $this
                ->addUsingAlias(ComisionPeer::ID, $temasDados->getComisionId(), $comparison);
        } elseif ($temasDados instanceof PropelObjectCollection) {
            return $this
                ->useTemasDadosQuery()
                ->filterByPrimaryKeys($temasDados->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemasDados() only accepts arguments of type TemasDados or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemasDados relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function joinTemasDados($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemasDados');

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
            $this->addJoinObject($join, 'TemasDados');
        }

        return $this;
    }

    /**
     * Use the TemasDados relation TemasDados object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TemasDadosQuery A secondary query class using the current class as primary query
     */
    public function useTemasDadosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTemasDados($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemasDados', 'TemasDadosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Comision $comision Object to remove from the list of results
     *
     * @return ComisionQuery The current query, for fluid interface
     */
    public function prune($comision = null)
    {
        if ($comision) {
            $this->addUsingAlias(ComisionPeer::ID, $comision->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
