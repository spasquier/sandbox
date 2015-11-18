<?php
namespace Demo;

class PostgreSQLDemo
{
    private $cn;

    /**
     * PostgreSQLDemo constructor.
     *
     * @param $host
     * @param $port
     * @param $dbname
     * @param $user
     * @param $password
     */
    public function __construct($host, $port, $dbname, $user, $password)
    {
        $this->cn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    }

    /**
     * @param $dbname
     */
    public function printTables($dbname)
    {
        $query = "SELECT table_name FROM information_schema.tables "
            . "WHERE table_schema='public' AND table_type='$dbname';";
        if ($result = pg_query($this->cn, $query)) {
            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                foreach ($line as $col_value) {
                    echo "$col_value\t";
                }
                echo "\n";
            }
            pg_free_result($this->cn);
        } else {
            echo 'La consulta fallo\n';
        }
    }

    function __destruct()
    {
        pg_close($this->cn);
    }
}