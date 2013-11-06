<?php


/**
 * Base class that represents a query for the 'carrera' table.
 *
 *
 *
 * @method CarreraQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CarreraQuery orderByNombreCarrera($order = Criteria::ASC) Order by the nombre_carrera column
 *
 * @method CarreraQuery groupById() Group by the id column
 * @method CarreraQuery groupByNombreCarrera() Group by the nombre_carrera column
 *
 * @method CarreraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CarreraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CarreraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CarreraQuery leftJoinCarreraHasAlumno($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarreraHasAlumno relation
 * @method CarreraQuery rightJoinCarreraHasAlumno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarreraHasAlumno relation
 * @method CarreraQuery innerJoinCarreraHasAlumno($relationAlias = null) Adds a INNER JOIN clause to the query using the CarreraHasAlumno relation
 *
 * @method CarreraQuery leftJoinMateria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Materia relation
 * @method CarreraQuery rightJoinMateria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Materia relation
 * @method CarreraQuery innerJoinMateria($relationAlias = null) Adds a INNER JOIN clause to the query using the Materia relation
 *
 * @method Carrera findOne(PropelPDO $con = null) Return the first Carrera matching the query
 * @method Carrera findOneOrCreate(PropelPDO $con = null) Return the first Carrera matching the query, or a new Carrera object populated from the query conditions when no match is found
 *
 * @method Carrera findOneByNombreCarrera(string $nombre_carrera) Return the first Carrera filtered by the nombre_carrera column
 *
 * @method array findById(int $id) Return Carrera objects filtered by the id column
 * @method array findByNombreCarrera(string $nombre_carrera) Return Carrera objects filtered by the nombre_carrera column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCarreraQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCarreraQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Carrera', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CarreraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CarreraQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CarreraQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CarreraQuery) {
            return $criteria;
        }
        $query = new CarreraQuery();
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
     * @return   Carrera|Carrera[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarreraPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CarreraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Carrera A model object, or null if the key is not found
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
     * @return                 Carrera A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre_carrera` FROM `carrera` WHERE `id` = :p0';
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
            $obj = new Carrera();
            $obj->hydrate($row);
            CarreraPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Carrera|Carrera[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Carrera[]|mixed the list of results, formatted by the current formatter
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
     * @return CarreraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CarreraPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CarreraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CarreraPeer::ID, $keys, Criteria::IN);
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
     * @return CarreraQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CarreraPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CarreraPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarreraPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre_carrera column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreCarrera('fooValue');   // WHERE nombre_carrera = 'fooValue'
     * $query->filterByNombreCarrera('%fooValue%'); // WHERE nombre_carrera LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreCarrera The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CarreraQuery The current query, for fluid interface
     */
    public function filterByNombreCarrera($nombreCarrera = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreCarrera)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombreCarrera)) {
                $nombreCarrera = str_replace('*', '%', $nombreCarrera);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CarreraPeer::NOMBRE_CARRERA, $nombreCarrera, $comparison);
    }

    /**
     * Filter the query by a related CarreraHasAlumno object
     *
     * @param   CarreraHasAlumno|PropelObjectCollection $carreraHasAlumno  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CarreraQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCarreraHasAlumno($carreraHasAlumno, $comparison = null)
    {
        if ($carreraHasAlumno instanceof CarreraHasAlumno) {
            return $this
                ->addUsingAlias(CarreraPeer::ID, $carreraHasAlumno->getCarreraId(), $comparison);
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
     * @return CarreraQuery The current query, for fluid interface
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
     * Filter the query by a related Materia object
     *
     * @param   Materia|PropelObjectCollection $materia  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CarreraQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMateria($materia, $comparison = null)
    {
        if ($materia instanceof Materia) {
            return $this
                ->addUsingAlias(CarreraPeer::ID, $materia->getCarreraId(), $comparison);
        } elseif ($materia instanceof PropelObjectCollection) {
            return $this
                ->useMateriaQuery()
                ->filterByPrimaryKeys($materia->getPrimaryKeys())
                ->endUse();
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
     * @return CarreraQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Carrera $carrera Object to remove from the list of results
     *
     * @return CarreraQuery The current query, for fluid interface
     */
    public function prune($carrera = null)
    {
        if ($carrera) {
            $this->addUsingAlias(CarreraPeer::ID, $carrera->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
