<?php

abstract class DAO
{
    // example of arg for methods
    // $request = 'SELECT * FROM USER_DATA where USER_ID = :id';
    // $args = array(':dname' => 'IT Support', ':loc' => 1700);

    private $conn;

    /**
     * DAO constructor.
     */
    function __construct()
    {
        $connect = '(DESCRIPTION=(ADDRESS= (PROTOCOL=TCP)(HOST=' . BD_HOST . ')(PORT=' . BD_PORT . ' ))(CONNECT_DATA = (SID =' . BD_SID . ')))';
        $this->conn = oci_pconnect(BD_USER, BD_PWD, $connect);
        if (!$this->conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            echo "failed";
        };
    }

    /**
     * Function to execute a query if it will return only one row
     * @param String $request the request to execute
     * @param Array $args the arguments to bind to the request
     * @return array the result of the request
     */
    public function queryRow($request, $args = null)
    {
        $stid = oci_parse($this->conn, $request);
        if ($args == null) {
        } else {
            foreach ($args as $key => $val) {
                oci_bind_by_name($stid, $key, $args[$key]);
            }
        }
        oci_execute($stid);
        $result = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
        return $result;
    }

    /**
     * Function to execute a query if it will return many rows
     * @param String $request the request to execute
     * @param Array $args the arguments to bind to the request
     * @return Array the result of the request
     */
    public function queryAll($request, $args = null)
    {
        $stid = oci_parse($this->conn, $request);
        if ($args == null) {
        } else {
            foreach ($args as $key => $val) {
                oci_bind_by_name($stid, $key, $args[$key]);
            }
        }

        oci_execute($stid);

        $i = 0;
        $result = array();
        while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }

    /**
     * Function to execute a query when it will not return any rows
     * @param String $request the request to execute
     * @param Array $args the arguments to bind to the request
     */
    public function queryEdit($request, $args = null)
    {
        $stid = oci_parse($this->conn, $request);
        if ($args == null) {
        } else {
            foreach ($args as $key => $val) {
                oci_bind_by_name($stid, $key, $args[$key]);
            }
        }
        oci_execute($stid);
    }
}
