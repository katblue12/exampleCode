<?php

class Mhave extends Have{


//** I USE A FOREACH LOOP TO USE THE ORDER OF THE PREVIOUS FOREACH IN THE ONE FOLLOWING. 
//** I THEN GIVE THE LIST ITEMS AN ALIAS  
//** I STOCK THE TYPE IN A VARIABLE ALLOWING THE FACTORISATION OF THE FUNCTION FOR FUTURE USE 
//** AS THE ENTITY HAVE IS RELATIONAL I USE INNER JOIN TO RETRIEVE THE INFORMATION FROM ASSOCIATED ENTITIES */
public function readHave($bdd,$type,$vis,$onep,$twop,$threep){
        try{    
                $partyitem=$bdd->prepare("SELECT DISTINCT have.id_partyitem,name_partyitem,image_partyitem,
                                    description_partyitem,id_type_partyitem 
                                    FROM have
                                    INNER JOIN partyitem ON partyitem.id_partyitem = have.id_partyitem
                                    WHERE visibility_partyitem =?  AND id_type_partyitem= ?
                                    ORDER BY have.id_partyitem ASC");
                                    $partyitem->bindparam(1, $vis, PDO::PARAM_INT);
                                    $partyitem->bindparam(2, $type, PDO::PARAM_INT);
                $partyitem->execute();
                $item = $partyitem->fetchAll(PDO::FETCH_OBJ);
        foreach($item as $details){
                $one=$bdd->prepare("SELECT have.id_partyitem, name_need AS one FROM have 
                                    INNER JOIN partyitem ON partyitem.id_partyitem = have.id_partyitem 
                                    INNER JOIN need ON need.id_need = have.id_need 
                                    WHERE $details->id_partyitem AND id_type_partyitem = ? AND placement = ?");  
                                    $one->bindparam(1, $type, PDO::PARAM_INT);
                                    $one->bindparam(2, $onep, PDO::PARAM_INT);    
                            }
                $one->execute();
                $first = $one->fetchAll(PDO::FETCH_OBJ);
        foreach($first as $next){
                $two=$bdd->prepare("SELECT have.id_partyitem, name_need AS two 
                                    FROM have 
                                    INNER JOIN partyitem  ON partyitem.id_partyitem = have.id_partyitem 
                                    INNER JOIN need ON need.id_need = have.id_need 
                                    WHERE $next->id_partyitem AND id_type_partyitem = ? AND placement = ?");
                                    $two->bindparam(1, $type, PDO::PARAM_INT);
                                    $two->bindparam(2, $twop, PDO::PARAM_INT);    
                            }
                $two->execute();
                $second = $two->fetchAll(PDO::FETCH_OBJ);
        foreach($second as $last){
                $three=$bdd->prepare("SELECT have.id_partyitem, name_need AS three 
                                    FROM have
                                    INNER JOIN partyitem ON partyitem.id_partyitem = have.id_partyitem 
                                    INNER JOIN need ON need.id_need = have.id_need 
                                    WHERE $last->id_partyitem AND id_type_partyitem = ? AND placement = ?");
                                    $three->bindparam(1, $type, PDO::PARAM_INT);
                                    $three->bindparam(2, $threep, PDO::PARAM_INT);    
                            }
                $three->execute();
                $third = $three->fetchAll(PDO::FETCH_OBJ);
//** NOW THAT I HAVE THE INFORMATION I USE THE ARRAY FUNCTION TO EXIT THE FUNCTION
//** AS THE PHP RETURN FUNCTION WILL ONLY ALLOW THE RETURN OF ONE VARIABLE 
//** THIS ALSO GIVES ME A BETTER ORGANISATION WHEN THE API ENCODES THIS INTO JSON WHICH IS INDEXED*/ 
                $objectComplete = array($item,$first,$second,$third);
                return $objectComplete;
        }       
        catch(exception $e){
            die('error:'.$e->getMessage());
        }  
    }
}