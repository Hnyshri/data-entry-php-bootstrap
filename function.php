<?php
    function option($table,$col_id,$col_value,$sel=0)
    {
        $query =" SELECT * FROM $table";
        $row= mysql_query($query);
        $option_list ="<option value=0>Please select</option>";
        while($data = mysql_fetch_assoc($row))
        {
            $option_list .= "<option value='$data[$col_value]'>$data[$col_value]</option>";
        }
        return $option_list;
    }
?>