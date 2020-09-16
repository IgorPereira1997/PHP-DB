<?php

$servidor = "localhost";
$user = "root";
$password = "";
$db = "escola_curso";

$connect = mysqli_connect($servidor, $user, $password, $db);

if (mysqli_connect_errno()) {
    die("Conexão falhou: " . mysqli_connect_errno());
}

#CRIAR TABLES

function criarTabela($connect, $tabela, $fields=null, $pk=null, $uk=null)
{
    $query = "CREATE TABLE ".$tabela;
    if($fields)
    {
        $query .= " (";
        for ($i=0; $i< count($fields, 0); $i++) 
        { # type, nullable or not, auto increment or not 
            $query .=$fields[$i][0]." ".$fields[$i][1]." ".$fields[$i][2]." ".$fields[$i][3];
            if((count($fields, 0) - 1) != $i){
                $query .= " , ";
            }
        }
        if($pk)
        {
            $query .= " , PRIMARY KEY (".$pk.")"; 
        } 
        
        if ($uk) {
            $query .= " , UNIQUE KEY (" . $uk . ")";
        }
        $query .= ")";
    }

    $execute = mysqli_query($connect, $query);
    echo $query;
    if (!$execute) 
    {
        die("Conexão com o banco de dados falhou!");
    }
}

/*criarTabela($connect, "usuarios", array(array("id", "INT", "NOT NULL", "AUTO_INCREMENT"),
                                        array("user", "VARCHAR(255)", "NOT NULL", ""),
                                        array("password", "VARCHAR(255)", "NOT NULL", "")),
            "id", "user");*/

# insert($connect, "usuarios", array("admin", "admin"), array("user", "password"));

#SELECT tabelas

function select($connect, $tabela, $campos, $where=null, $groupBy=null,$orderBy=null){
    $query = "SELECT ";
    
    for ($i=0;$i<count($campos);$i++){
        $query .= $campos[$i];
        if((count($campos)-1) != $i){
            $query .= ", ";
        }
    }

    $query .= " FROM ";

    for ($i = 0; $i < count($tabela); $i++) {
        $query .= $tabela[$i];
        if ((count($tabela) - 1) != $i) {
            $query .= ", ";
        }
    }
    if($where){
        $query .= " WHERE ".$where;
    }
    if($groupBy){
        $query .= " GROUP BY ".$groupBy;
    }
    
    if($orderBy){
        $query .= " ORDER BY ".$orderBy;
    }
    $execute = mysqli_query($connect, $query);
    if (!$execute) {
        die("Conexão com o banco de dados falhou!");
    }else{
        return mysqli_fetch_all($execute);
    }
}

#INSERIR na tabela

function insert($connect, $tabela, $fields, $columns=null){
    $query = "INSERT INTO ".$tabela;
    if($columns){
        $query .= " (";
        
        for($i = 0; $i < count($columns); $i++){
            $query .= $columns[$i];
            if((count($columns)-1)!=$i){
                $query .= ", ";
            }
        }

        $query .= ") ";
    }
    $query .= " VALUES (";
    for ($i = 0;$i < count($fields); $i++){
        $query .= (is_numeric($fields[$i]) ? ($fields[$i]) : ("'" . $fields[$i]. "'"));
        if(count($fields)-1 != $i){
            $query .= ", ";
        }
    }
    $query .= ")";
    echo $query."<br>";
    $execute = mysqli_query($connect, $query);
    if (!$execute) {
        die("Conexão com o banco de dados falhou!");
    }
}

#UPDATE tabelas
function update($connect, $tabela, $sets, $where=null){
    $query = "UPDATE ".$tabela." SET ";
    for ($i=0;$i<count($sets);$i++){
        $query .= $sets[$i][0]." = ".(is_numeric($sets[$i][1])? ($sets[$i][1]): ("'". $sets[$i][1]."'"));
        if((count($sets, 0) - 1) != $i){
            $query .= ", ";
        }
    }
    if($where){
        $query .= " WHERE ".$where;
    }
    echo $query."<br>";
    $execute = mysqli_query($connect, $query);
    if (!$execute) {
        die("Conexão com o banco de dados falhou!");
    }
}


#DELETE campo da tabela
function delete($connect, $tabela, $where=null){
    $query = "DELETE FROM ".$tabela;
    if($where){
        $query .= " WHERE ";
        $query .= $where[0]." = ".$where[1];
    }
    $execute = mysqli_query($connect, $query);
    if (!$execute) {
        die("Conexão com o banco de dados falhou!");
    }
}

#verificar se um valor está presente na tabela
function verificarValorBD($connect, $tabela, $target){
    $query = "SELECT * FROM ".$tabela;
    $query .= " WHERE ".$target[0]." = ".$target[1];
    $execute = mysqli_query($connect, $query);
    if (!$execute) {
        return false;
    }else{
        return true;
    }
}

#Verificar se a coluna informada existe na tabela
function verificarColunaExistente($connect, $table, $field){
    $query = "SELECT * FROM ".$table;
    $result = mysqli_query($connect, $query);
    if (!$result) {
        return false;
    }else{
        $flag = false;
        $line = mysqli_fetch_fields($result);
        foreach ($line as $value) {
            if (strcmp($value->name, $field) == 0) {
                $flag = true;
                break;
            }
        }
        return $flag;
    }
}

#adicionar coluna à tabela
function addColunaTabela($connect, $tabela, $field){
    if(verificarColunaExistente($connect, $tabela, $field[0])){
        die("Coluna já existente!");
    }else{
        $query = "ALTER TABLE " . $tabela . " ADD ";
        $query .= $field[0] . " " . $field[1];
        $execute = mysqli_query($connect, $query);
        if (!$execute) {
            die("Conexão com o banco de dados falhou!");
        }
    }
}


#modificar coluna da tabela
function modificarColunaTabela($connect, $tabela, $field)
{
    if(verificarColunaExistente($connect, $tabela, $field[0])){
        $query = "ALTER TABLE " . $tabela . " MODIFY COLUMN ".$field[0]." ".$field[1];
        $execute = mysqli_query($connect, $query);
        if (!$execute) {
            die("Conexão com o banco de dados falhou!");
        }
    }else{
        die("Coluna inexistente!");
    }
}

#deletar uma coluna da tabela
function droparColuna($connect, $tabela, $field){
    if (verificarColunaExistente($connect, $tabela, $field)) {
        $query = "ALTER TABLE " . $tabela . " DROP COLUMN " . $field;
        $execute = mysqli_query($connect, $query);
        if (!$execute) {
            die("Conexão com o banco de dados falhou!");
        }
    } else {
        die("Coluna inexistente!");
    }
}

