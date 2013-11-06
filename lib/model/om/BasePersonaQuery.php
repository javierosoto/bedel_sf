<?php


/**
 * Base class that represents a query for the 'persona' table.
 *
 *
 *
 * @method PersonaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersonaQuery orderByNroDoc($order = Criteria::ASC) Order by the nro_doc column
 * @method PersonaQuery orderByApeNom($order = Criteria::ASC) Order by the ape_nom column
 * @method PersonaQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method PersonaQuery orderByFechaNac($order = Criteria::ASC) Order by the fecha_nac column
 * @method PersonaQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method PersonaQuery orderBySexoId($order = Criteria::ASC) Order by the sexo_id column
 * @method PersonaQuery orderByTipoDocId($order = Criteria::ASC) Order by the tipo_doc_id column
 *
 * @method PersonaQuery groupById() Group by the id column
 * @method PersonaQuery groupByNroDoc() Group by the nro_doc column
 * @method PersonaQuery groupByApeNom() Group by the ape_nom column
 * @method PersonaQuery groupByDireccion() Group by the direccion column
 * @method PersonaQuery groupByFechaNac() Group by the fecha_nac column
 * @method PersonaQuery groupByEmail() Group by the email column
 * @method PersonaQuery groupBySexoId() Group by the sexo_id column
 * @method PersonaQuery groupByTipoDocId() Group by the tipo_doc_id column
 *
 * @method PersonaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersonaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersonaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PersonaQuery leftJoinSexo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sexo relation
 * @method PersonaQuery rightJoinSexo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sexo relation
 * @method PersonaQuery innerJoinSexo($relationAlias = null) Adds a INNER JOIN clause to the query using the Sexo relation
 *
 * @method PersonaQuery leftJoinTipoDoc($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoDoc relation
 * @method PersonaQuery rightJoinTipoDoc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoDoc relation
 * @method PersonaQuery innerJoinTipoDoc($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoDoc relation
 *
 * @method PersonaQuery leftJoinAlumno($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alumno relation
 * @method PersonaQuery rightJoinAlumno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alumno relation
 * @method PersonaQuery innerJoinAlumno($relationAlias = null) Adds a INNER JOIN clause to the query using the Alumno relation
 *
 * @method PersonaQuery leftJoinElementoEnUso($relationAlias = null) Adds a LEFT JOIN clause to the query using the ElementoEnUso relation
 * @method PersonaQuery rightJoinElementoEnUso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ElementoEnUso relation
 * @method PersonaQuery innerJoinElementoEnUso($relationAlias = null) Adds a INNER JOIN clause to the query using the ElementoEnUso relation
 *
 * @method PersonaQuery leftJoinProfesor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Profesor relation
 * @method PersonaQuery rightJoinProfesor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Profesor relation
 * @method PersonaQuery innerJoinProfesor($relationAlias = null) Adds a INNER JOIN clause to the query using the Profesor relation
 *
 * @method Persona findOne(PropelPDO $con = null) Return the first Persona matching the query
 * @method Persona findOneOrCreate(PropelPDO $con = null) Return the first Persona matching the query, or a new Persona object populated from the query conditions when no match is found
 *
 * @method Persona findOneByNroDoc(string $nro_doc) Return the first Persona filtered by the nro_doc column
 * @method Persona findOneByApeNom(string $ape_nom) Return the first Persona filtered by the ape_nom column
 * @method Persona findOneByDireccion(string $direccion) Return the first Persona filtered by the direccion column
 * @method Persona findOneByFechaNac(string $fecha_nac) Return the first Persona filtered by the fecha_nac column
 * @method Persona findOneByEmail(string $email) Return the first Persona filtered by the email column
 * @method Persona findOneBySexoId(int $sexo_id) Return the first Persona filtered by the sexo_id column
 * @method Persona findOneByTipoDocId(int $tipo_doc_id) Return the first Persona filtered by the tipo_doc_id column
 *
 * @method array findById(int $id) Return Persona objects filtered by the id column
 * @method array findByNroDoc(string $nro_doc) Return Persona objects filtered by the nro_doc column
 * @method array findByApeNom(string $ape_nom) Return Persona objects filtered by the ape_nom column
 * @method array findByDireccion(string $direccion) Return Persona objects filtered by the direccion column
 * @method array findByFechaNac(string $fecha_nac) Return Persona objects filtered by the fecha_nac column
 * @method array findByEmail(string $email) Return Persona objects filtered by the email column
 * @method array findBySexoId(int $sexo_id) Return Persona objects filtered by the sexo_id column
 * @method array findByTipoDocId(int $tipo_doc_id) Return Persona objects filtered by the tipo_doc_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePersonaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersonaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Persona', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersonaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PersonaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersonaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersonaQuery) {
            return $criteria;
        }
        $query = new PersonaQuery();
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
     * @return   Persona|Persona[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Persona A model object, or null if the key is not found
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
     * @return                 Persona A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nro_doc`, `ape_nom`, `direccion`, `fecha_nac`, `email`, `sexo_id`, `tipo_doc_id` FROM `persona` WHERE `id` = :p0';
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
            $obj = new Persona();
            $obj->hydrate($row);
            PersonaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Persona|Persona[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Persona[]|mixed the list of results, formatted by the current formatter
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
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonaPeer::ID, $keys, Criteria::IN);
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
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersonaPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersonaPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nro_doc column
     *
     * Example usage:
     * <code>
     * $query->filterByNroDoc('fooValue');   // WHERE nro_doc = 'fooValue'
     * $query->filterByNroDoc('%fooValue%'); // WHERE nro_doc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nroDoc The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByNroDoc($nroDoc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nroDoc)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nroDoc)) {
                $nroDoc = str_replace('*', '%', $nroDoc);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonaPeer::NRO_DOC, $nroDoc, $comparison);
    }

    /**
     * Filter the query on the ape_nom column
     *
     * Example usage:
     * <code>
     * $query->filterByApeNom('fooValue');   // WHERE ape_nom = 'fooValue'
     * $query->filterByApeNom('%fooValue%'); // WHERE ape_nom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apeNom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByApeNom($apeNom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apeNom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $apeNom)) {
                $apeNom = str_replace('*', '%', $apeNom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonaPeer::APE_NOM, $apeNom, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%'); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $direccion)) {
                $direccion = str_replace('*', '%', $direccion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonaPeer::DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the fecha_nac column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaNac('2011-03-14'); // WHERE fecha_nac = '2011-03-14'
     * $query->filterByFechaNac('now'); // WHERE fecha_nac = '2011-03-14'
     * $query->filterByFechaNac(array('max' => 'yesterday')); // WHERE fecha_nac > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaNac The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByFechaNac($fechaNac = null, $comparison = null)
    {
        if (is_array($fechaNac)) {
            $useMinMax = false;
            if (isset($fechaNac['min'])) {
                $this->addUsingAlias(PersonaPeer::FECHA_NAC, $fechaNac['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaNac['max'])) {
                $this->addUsingAlias(PersonaPeer::FECHA_NAC, $fechaNac['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaPeer::FECHA_NAC, $fechaNac, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonaPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the sexo_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySexoId(1234); // WHERE sexo_id = 1234
     * $query->filterBySexoId(array(12, 34)); // WHERE sexo_id IN (12, 34)
     * $query->filterBySexoId(array('min' => 12)); // WHERE sexo_id >= 12
     * $query->filterBySexoId(array('max' => 12)); // WHERE sexo_id <= 12
     * </code>
     *
     * @see       filterBySexo()
     *
     * @param     mixed $sexoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterBySexoId($sexoId = null, $comparison = null)
    {
        if (is_array($sexoId)) {
            $useMinMax = false;
            if (isset($sexoId['min'])) {
                $this->addUsingAlias(PersonaPeer::SEXO_ID, $sexoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sexoId['max'])) {
                $this->addUsingAlias(PersonaPeer::SEXO_ID, $sexoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaPeer::SEXO_ID, $sexoId, $comparison);
    }

    /**
     * Filter the query on the tipo_doc_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoDocId(1234); // WHERE tipo_doc_id = 1234
     * $query->filterByTipoDocId(array(12, 34)); // WHERE tipo_doc_id IN (12, 34)
     * $query->filterByTipoDocId(array('min' => 12)); // WHERE tipo_doc_id >= 12
     * $query->filterByTipoDocId(array('max' => 12)); // WHERE tipo_doc_id <= 12
     * </code>
     *
     * @see       filterByTipoDoc()
     *
     * @param     mixed $tipoDocId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function filterByTipoDocId($tipoDocId = null, $comparison = null)
    {
        if (is_array($tipoDocId)) {
            $useMinMax = false;
            if (isset($tipoDocId['min'])) {
                $this->addUsingAlias(PersonaPeer::TIPO_DOC_ID, $tipoDocId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipoDocId['max'])) {
                $this->addUsingAlias(PersonaPeer::TIPO_DOC_ID, $tipoDocId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaPeer::TIPO_DOC_ID, $tipoDocId, $comparison);
    }

    /**
     * Filter the query by a related Sexo object
     *
     * @param   Sexo|PropelObjectCollection $sexo The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySexo($sexo, $comparison = null)
    {
        if ($sexo instanceof Sexo) {
            return $this
                ->addUsingAlias(PersonaPeer::SEXO_ID, $sexo->getId(), $comparison);
        } elseif ($sexo instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonaPeer::SEXO_ID, $sexo->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySexo() only accepts arguments of type Sexo or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sexo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function joinSexo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sexo');

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
            $this->addJoinObject($join, 'Sexo');
        }

        return $this;
    }

    /**
     * Use the Sexo relation Sexo object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SexoQuery A secondary query class using the current class as primary query
     */
    public function useSexoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSexo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sexo', 'SexoQuery');
    }

    /**
     * Filter the query by a related TipoDoc object
     *
     * @param   TipoDoc|PropelObjectCollection $tipoDoc The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTipoDoc($tipoDoc, $comparison = null)
    {
        if ($tipoDoc instanceof TipoDoc) {
            return $this
                ->addUsingAlias(PersonaPeer::TIPO_DOC_ID, $tipoDoc->getId(), $comparison);
        } elseif ($tipoDoc instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonaPeer::TIPO_DOC_ID, $tipoDoc->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTipoDoc() only accepts arguments of type TipoDoc or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TipoDoc relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function joinTipoDoc($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TipoDoc');

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
            $this->addJoinObject($join, 'TipoDoc');
        }

        return $this;
    }

    /**
     * Use the TipoDoc relation TipoDoc object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TipoDocQuery A secondary query class using the current class as primary query
     */
    public function useTipoDocQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTipoDoc($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TipoDoc', 'TipoDocQuery');
    }

    /**
     * Filter the query by a related Alumno object
     *
     * @param   Alumno|PropelObjectCollection $alumno  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlumno($alumno, $comparison = null)
    {
        if ($alumno instanceof Alumno) {
            return $this
                ->addUsingAlias(PersonaPeer::ID, $alumno->getPersonaId(), $comparison);
        } elseif ($alumno instanceof PropelObjectCollection) {
            return $this
                ->useAlumnoQuery()
                ->filterByPrimaryKeys($alumno->getPrimaryKeys())
                ->endUse();
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
     * @return PersonaQuery The current query, for fluid interface
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
     * Filter the query by a related ElementoEnUso object
     *
     * @param   ElementoEnUso|PropelObjectCollection $elementoEnUso  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByElementoEnUso($elementoEnUso, $comparison = null)
    {
        if ($elementoEnUso instanceof ElementoEnUso) {
            return $this
                ->addUsingAlias(PersonaPeer::ID, $elementoEnUso->getPersonaId(), $comparison);
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
     * @return PersonaQuery The current query, for fluid interface
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
     * Filter the query by a related Profesor object
     *
     * @param   Profesor|PropelObjectCollection $profesor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProfesor($profesor, $comparison = null)
    {
        if ($profesor instanceof Profesor) {
            return $this
                ->addUsingAlias(PersonaPeer::ID, $profesor->getPersonaId(), $comparison);
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
     * @return PersonaQuery The current query, for fluid interface
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
     * @param   Persona $persona Object to remove from the list of results
     *
     * @return PersonaQuery The current query, for fluid interface
     */
    public function prune($persona = null)
    {
        if ($persona) {
            $this->addUsingAlias(PersonaPeer::ID, $persona->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
