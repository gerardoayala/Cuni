<?php 
require_once("models/config.php");
	$function = $_POST['func'];

switch ($function) {
    case "save-participant":
     if(!empty($_POST))
        {
          if(saveParticipant($_POST['name'],$_POST['lastname'],$_POST['school'],$_POST['campus'],$_POST['mat'],$_POST['email'],$_POST['phone'])){
                $student = $mysqli->insert_id;
                if(findAvailableTicket($_POST['ticket'])){
                   foreach (findAvailableTicket($_POST['ticket']) as $v1) {
                    if(assignTicketStudent($student,$v1['id'])){
                        if(desactivateTicket($v1['id'])){
                          echo "Success";
                        }
                      }
                  }
                  
                }   
          }
        }
    break;
    case "update-pay-ticket":
       if(!empty($_POST))
        {
            if(updatePayTicket($_POST['pay'],$_POST['idticket'])){
                echo "Success";
            }else{
                 echo "Failure";
            }
        }
    break;
    case "university-save":
        if(!empty($_POST))
        {
            if(saveUniversity($_POST['name'])){
                echo "Success";
            }else{
                 echo "Failure";
            }
        }
      break;
    case "university-delete":
        if(!empty($_POST))
        {
            if(deleteUniversity($_POST['id'])){
                echo "Success";
            }else{
                 echo "Failure";
            }
        }
      break;
    case "university-edit":
        if(!empty($_POST))
        {
            if(editUniversity($_POST['name'],$_POST['id'])){
                echo "Success";
            }else{
                 echo "Failure";
            }
        }
      break;
          case "ticket-save":
        if(!empty($_POST))
        {
            if(saveTicket($_POST['name'],$_POST['price'],$_POST['qty'],$_POST['act'])){
                if(populateTicket($_POST['qty'],$mysqli->insert_id)){
                 echo "Success";
                }else{
                 echo "No Populate";
                }
            }else{
                 echo "Failure";
            }
        }
      break;
    case "ticket-delete":
        if(!empty($_POST))
        {
            if(deleteTicket($_POST['id'])){
                echo "Success";
            }else{
                 echo "Failure";
            }
        }
      break;
    case "ticket-edit":
        if(!empty($_POST))
        {
            if(editTicket($_POST['name'],$_POST['price'],$_POST['qty'],$_POST['act'],$_POST['id'])){
                echo "Success".$_POST['qty'];
            }else{
                 echo "Failure";
            }
        }
      break;
  }

          