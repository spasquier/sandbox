<?php
namespace Demo;

class PostgreSQLDemo
{
    /**
     * @param $host
     * @param $port
     * @param $dbname
     * @param $user
     * @param $password
     */
    public function printTables($host, $port, $dbname, $user, $password)
    {
        $cn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        $query = "SELECT table_name FROM information_schema.tables WHERE table_schema='public' "
            . "AND table_type='BASE TABLE' AND table_catalog='$dbname'";
        if ($result = pg_query($cn, $query)) {
            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                foreach ($line as $col_value) {
                    echo "$col_value\t";
                }
                echo "\n";
            }
            pg_free_result($cn);
            pg_close($cn);
        } else {
            echo 'La consulta fallo\n';
        }
    }
}