 <?php
    $hname='localhost';
    $uname='root';
    $pass='';
    $db='hbw';

    $con=mysqli_connect($hname,$uname,$pass,$db);
    if(!$con){
        die("Cannot connect to Database ".mysqli_connect_error());
    }

    function filteration($data){
            foreach($data as $key => $value){
            $value=trim($value);
            $value=stripslashes($value);
            $value=strip_tags($value);
            $value=htmlspecialchars($value);    
            $data[$key]=$value;
            }
            return $data;
    }
    function select($sql,$values,$datatypes){
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("querry cannot be executed- select");
            }
        }
        else{
            die("querry cannot be Prepared - select");
        }
            
    }
    function update($sql,$values,$datatypes){
            $con=$GLOBALS['con'];
            if($stmt=mysqli_prepare($con,$sql)){
                mysqli_stmt_bind_param($stmt,$datatypes,...$values);
                if(mysqli_stmt_execute($stmt)){
                    $res = mysqli_stmt_affected_rows($stmt);
                    mysqli_stmt_close($stmt);
                    return $res;
                }
                else{
                    mysqli_stmt_close($stmt);
                    die("querry cannot be executed-Update");
                }
            }
            else{
                die("querry cannot be Prepared - Update");
            }
                
    }
    function insert($sql,$values,$datatypes){
                $con=$GLOBALS['con'];
                if($stmt=mysqli_prepare($con,$sql)){
                    mysqli_stmt_bind_param($stmt,$datatypes,...$values);
                    if(mysqli_stmt_execute($stmt)){
                        $res = mysqli_stmt_affected_rows($stmt);
                        mysqli_stmt_close($stmt);
                        return $res;
                    }
                    else{
                        mysqli_stmt_close($stmt);
                        die("querry cannot be executed-insert");
                    }
                }
                else{
                    die("querry cannot be Prepared - insert");
                }
                    
    }
                
    function selectAll($table){
                    $con = $con=$GLOBALS['con'];
                    $res=mysqli_query($con,"SELECT * FROM $table");
                    return $res;
    }
    function delete($sql, $values, $datatypes) {
        // Get the database connection from the global scope
        $con = $GLOBALS['con'];
    
        // Prepare the SQL statement
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind the parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    
            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Get the number of affected rows
                $res = mysqli_stmt_affected_rows($stmt);
    
                // Close the statement and return the result
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                // Close the statement and display an error message
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - delete");
            }
        } else {
            // Display an error message if the query cannot be prepared
            die("Query cannot be prepared - delete");
        }
    }
 ?>
