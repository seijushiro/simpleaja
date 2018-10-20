<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ServersideDT {
    var $query = NULL;
    var $column = array(); //set column field database for datatable orderable
    var $order = NULL; // default order 

    protected function ci()
    {
        return get_instance();
    }
    
    public function setQuery($str=NULL){
        $this->query = $str;
        return $this;
    }

    public function setOrder($str=NULL){
        $this->order = $str;
        return $this;
    }

 
    public function setColumn($col=array()){
        $this->column = $col;
        return $this;
    }

    private function _get_datatables_query() {                
 
        $i       = 0;
        $str     = (ISSET($_POST['search'])?$_POST['search']['value']:'');
        $where   = (($str)?" WHERE ":"");
        foreach ($this->column as $item) { // loop column 
            if($str){                 
                $where = $where.$item." like '%".$str."%' OR ";
            }
            $i++;
        }
        $where  = substr($where,0,-3); // trim last OR
        $order = ""; 
        if(isset($_POST['order'])){ // here order processing
            $order = " ORDER BY ".$this->column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
        } 
        else if(isset($this->order))
        {
            $order = " ORDER BY ".$this->order;           
        }

        return $this->query.$where.$order;        
    }

    public function get_datatables()
    {
        $str  = $this->_get_datatables_query();

        $length = (ISSET($_POST['length'])?$_POST['length']:10);
        $start = (ISSET($_POST['start'])?$_POST['start']:0);

        $limit = " LIMIT ".$start.",".$length;

        $query = $this->ci()->db->query($str.$limit);
        return $query->result();
    }
 
    public function count_filtered()
    {
        $str  = $this->_get_datatables_query();
        return $this->ci()->db->query($str)->num_rows();
    }
 
    public function count_all()
    {
        return $this->ci()->db->query($this->query)->num_rows();
    }    
}
?>    