<?php


abstract class DAO{
    // example of arg for methods
    // $request = 'SELECT * FROM USER_DATA where USER_ID = :id';
    // $args = array(':dname' => 'IT Support', ':loc' => 1700);
    

    public function connection(){
        $connect = '(DESCRIPTION=(ADDRESS= (PROTOCOL=TCP)(HOST=' . BD_HOST . ')(PORT=' . BD_PORT . ' ))(CONNECT_DATA = (SID =' . BD_SID . ')))';
        $conn = oci_connect(BD_USER, BD_PWD, $connect);
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            echo "failed";
        }
        return $conn;
    }
    public function queryRow($request, $args = null){
        $conn = $this->connection();
        $stid = oci_parse($conn, $request);
        if ($args == null) {
        }else{
            foreach ($args as $key => $val) {
                oci_bind_by_name($stid, $key, $args[$key]);
            }
        }
        oci_execute($stid);
        $result = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
        return $result;
    }

    public function queryAll($request, $args = null){
        $conn = $this->connection();
        $stid = oci_parse($conn, $request);
        if ($args == null) {
           
        }else{
            foreach ($args as $key => $val) {
                oci_bind_by_name($stid, $key, $args[$key]);
            }
        }
        oci_execute($stid);
        $i=0;
        $result = array();
        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            $result[$i]= $row;
            $i++;
        }
        return $result;
    }

    
    
}