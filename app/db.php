<?php
	
namespace app;

class db
{
	
    public $host = 'localhost';
    public $user = 'root';
    public $password = '';
    public $db_name = 'arm';
    public $connect  = false;

    public $error_code = 0;
    public $error_message = '';

    public function db_connect() {

        $this->connect = @mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
        if($this->connect)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function input_protect($value)
    {
        if(!is_array($value))
        {
            $value = trim($value);
            $value = addslashes($value);

            return $value;
        }
        else
        {
            return serialize($value);
        }
    }

    public function query_free($query)
    {
        $this->db_connect();
        $this->table_query = @mysqli_query($this->connect, $query);
        if($this->table_query)
        {
            $this->query_result = 'true';
            return true;
        }
        else
        {
            return false;
        }
    }

    public function check_table($table, $vars=[])
    {
        $this->db_connect();
        $this->table_check = @mysqli_query($this->connect, 'SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
        if($this->table_check)
        {
            $this->array_result = array_map(array($this, 'input_protect'), $vars);

             foreach ($this->array_result as $key => $value) {
                $this->query_insert_value .= "'".$value."', ";
                $this->query_insert_column .= "`".$key."`, ";
            }

            $this->query_insert_value = substr($this->query_insert_value, 0, -2);
            $this->query_insert_column = substr($this->query_insert_column, 0, -2);


            $show_column = "SHOW COLUMNS FROM ".$table;
            $this->get_column = mysqli_query($this->connect, $show_column);
            if($this->get_column)
            {
                $this->get_column_status = 'true';
                $this->arr_column = array();
                while($this->row = $this->get_column->fetch_assoc())
                {
                    $this->arr_column[] = $this->row['Field'];
                }
                $this->array_result = array_keys($vars);
                foreach ($this->array_result as $key => $value) 
                {
                    if(array_search($value, $this->arr_column) == 0)
                    {
                        return false;
                        break;
                    }
                    else
                    {
                        return true;
                    }
                }
                
            }
        }
    }

    

    public function insert_into_table($table, $vars=[])
    {
        if($this->check_table($table, $vars) == true)
        {
            $this->query .= "INSERT INTO `".$table."`";


            $this->query .= '('.$this->query_insert_column.') VALUES ('.$this->query_insert_value.')';
            $this->db_connect();
            $this->table_insert = @mysqli_query($this->connect, $this->query);
            if($this->table_insert)
            {
                $this->error_code = 0;
            }
            else
            {
                $this->error_code = 204;
                $this->error_message = 'В процессе записи в таблицу возникла ошибка: <br> <code>'.mysqli_error($this->connect).$this->query_insert_column.'</code>';
            }
           
        }
        else
        {
            $this->error_code = 205;
            $this->error_message = 'Ошибка синхронизации столбцов и массива данных <code>'.serialize($this->array_result);
        }
    }

    public function select_table($params=[], $table, $vars=[])
    {
        $count_params = count($params);
        if($count_params > 0 )
        {
            for ($i = 0; $i < $count_params; $i++) {
                $params_to_query .= '`'.$params[$i].'`, ';
            }
            $params_to_query = substr($params_to_query, 0, -2);
        }
        else
        {
           $params_to_query = '*';
        }
        $count_vars = count($vars);

        if($count_vars > 0 )
        {
            $params_to_query_where .= 'WHERE ';
            foreach ($vars as $key => $value) 
            {
                $params_to_query_where .= '`'.$key.'` = "'.$value.'" AND ';
            }
            $params_to_query_where = substr($params_to_query_where, 0, -5);
        }
        else
        {
           $params_to_query_where = '';
        }
        $this->db_connect();
        $this->query .= "SELECT ".$params_to_query." FROM `".$table."` ".$params_to_query_where."";
        $this->table_select = @mysqli_query($this->connect, $this->query);
    }

    public function Check_duble_Table($table, $comment, $params=[])
    {
        if($this->check_table($table, $params) == true)
        {

            $exp_insert_column = count($params);
            if(count($exp_insert_column) == '1')
            {
                $query_insert = "WHERE " .$this->query_insert_column. " = " .$this->query_insert_value."";
            }
            else
            {
                $query_insert .= "WHERE ";
                for($i = 0; $i < count($exp_insert_value); $i ++)
                {
                    $query_insert .= $query_insert_column[$i]. " = ".$query_insert_value[$i]. " AND";
                }
                $query_insert = substr($query_insert, 0, -4);
            }
            $this->query_free('SELECT * FROM '.$table.' '.$query_insert.'');
            if($this->table_query->num_rows >= 1)
            {
                $this->error_status = 1;
                $this->error_code = 206;
                $this->error_message = $comment;
            }
            else
            {
                $this->error_status = mysqli_error($this->connect);
            }
        }
        else
        {
            $this->error_status = 1;
            $this->error_code = 205;
            $this->error_message = 'Возникла ошибка при работе с таблицей';
        }

        unset($this->query_insert_column);
        unset($this->query_insert_value);

    }

    public function delet_from_table()
    {

    }
}

?>