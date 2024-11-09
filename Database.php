<?php

class Database {
    public $connection;

    /**
     * Constructor for Database class
     * @param array $config
     */
    public function __construct(array $config) {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try{
            $this->connection = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new PDOException("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * @param string $sqlQuery
     *
     * @return PDOStatement
     * @throws PDOException
     */
    public function query(string $sqlQuery, array $params = []): PDOStatement
    {
        try {
//            Statement
            $sth = $this->connection->prepare($sqlQuery);

//            Bind named parameters
            foreach ($params as $param => $value) {
                $sth->bindValue(':' . $param, $value );
            }
            $sth->execute();

            return $sth;
        } catch (PDOException $e) {
            throw new PDOException("Database query failed: " . $e->getMessage());
        }

    }

}