<?php
class Users extends db_helper{
    protected $table = 'users';
    
    public function countRows($where,$inner_column_append = NULL){
        return inst("select","db")->countRows($this->table,$where,$inner_column_append);
    }
    
    public function checkTable($where,$inner_column_append = NULL){
        if(inst("select","db")->countRows($this->table,$where,$inner_column_append) > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function getRow($param = array()){
        $biz = inst("select","db");
        $biz->selectData(
                           isset($param['col']) ? $param['col'] : '*',
                           $this->table,
                           isset($param['where']) ? $param['where'] : NULL,
                           isset($param['sorttype']) ? $param['sorttype'] : NULL,
                           isset($param['limit']) ? $param['limit'] : NULL,
                           isset($param['column_append']) ? $param['column_append'] : NULL
                          );
        
        return $biz->fetchResult();
    }
    
    public function getRows($param = array()){
        $this->res_array = inst("select","db");
        $this->res_array->selectData(
                               "*",
                               $this->table,
                               isset($param['where']) ? $param['where'] : NULL,
                               isset($param['sorttype']) ? $param['sorttype'] : NULL,
                               isset($param['limit']) ? $param['limit'] : NULL,
                               isset($param['column_append']) ? $param['column_append'] : NULL
                              );
        
        return $this->dbResult_array();
    }

    public function getJointRows($param = array()){
        $this->res_array = inst("select","db");
        $this->res_array->selectJoin(
                               "*",
                               $this->table,
                               isset($param['table2']) ? $param['table2'] : NULL,
                               isset($param['where']) ? $param['where'] : NULL,
                               isset($param['sorttype']) ? $param['sorttype'] : NULL,
                               isset($param['limit']) ? $param['limit'] : NULL,
                               isset($param['column_append']) ? $param['column_append'] : NULL
                              );
        
        return $this->dbResult_array();
    }
    
    public function pageRow($param = array()){
        return $this->paginationCore(
                                "*",
                                $this->table,
                                isset($param['where']) ? $param['where'] : NULL,
                                isset($param['order']) ? $param['order'] : "ORDER BY user_id DESC",
                                isset($param['append']) ? $param['append'] : NULL,
                                isset($param['items']) ? $param['items'] : 20
                            );
    }
    
    public function updateRow($data,$where,$append=NULL){
        if(!inst("altar","db")->updateTable($this->table,$data,$where,$append)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    public function storeRow($data){
        if(!inst("insert","db")->insertData($this->table, $data)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}