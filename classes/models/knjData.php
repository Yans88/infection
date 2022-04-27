<?php 
/**
 * 賢者データのモデルクラス
 * Model class of KNJ data
 */
class KnjData{
    /**
     * Class Info from Knj
     *
     * @var array 
     */  
    public $classes;
    /**
     * Close Info from Knj
     *
     * @var array 
     */  
    public $closes;
    /**
     * disorder Info from Knj
     *
     * @var array 
     */  
    public $disorders;
    /**
     * InnerItem Info from Knj
     *
     * @var array 
     */  
    public $inner_items;
    /**
     * Inst Info from inst.json
     *
     * @var array 
     */  
    public $insts;
  
    public function __construct(Array $classes, Array $closes, Array $disorders, Array $inner_items, Array $insts){
        foreach($classes as $val){
            if(!$val instanceof HolidayInfo){
                throw new Exception('Invalid Data classes');
            }
        }
        $this->classes  = $classes;

        foreach($closes as $val){
            if(!$val instanceof GradeDefinitionInfo){
                throw new Exception('Invalid Data closes');
            }
        }
        $this->closes = $closes;

        foreach($disorders as $val){
            if(!$val instanceof AttendanceInfo){
                throw new Exception('Invalid Data disorders ');
            }
        }
        $this->disorders  = $disorders;

        foreach($insts as $val){
            if(!$val instanceof Setting_Inst){
                throw new Exception('Invalid Data inst');
            }
        }
        $this->insts  = $insts;

        foreach($inner_items as $val){
            if(!$val instanceof Knj_Inner_Item){
                throw new Exception('Invalid Data inner_item');
            }
        }
        $this->inner_items = $inner_items;
    }
}



?>