<?php
class Have{
    private int $id_need;
    private int $id_partyitem;
    private int $placement;
 
    
    public function getIdPar():int{
        return $this->id_partyitem;
    }
    public function setIdPar(int $newIdPar):void{
        $this->id_partyitem=$newIdPar;
    }

    public function getIdNeed():int{
        return $this->id_need;
    }
    
    public function setIdNeed(int $newIdNeed):void{
        $this->id_need = $newIdNeed;
    }

    public function getPlacement():int{
        return $this->placement;
    }
    
    public function setPlacement(int $newPlacement):void{
        $this->placement = $newPlacement;
    }

       }

  

