<?php
namespace Home\Controller;
use Think\Controller;
class TicketController extends Controller {
    public function get_ticket() {
        $db = M('Orderticket');
        $condit['ot_id'] = array('eq',$_REQUEST['ot_id']);
        $result = $db->where($condit)->select();

        if($result) {
            $this->ajaxReturn($result);
        }
    }
    public function ticket_return(){
        $db = M('Orderticket');
        $condit_orderT['ot_id'] = array('eq',$_REQUEST['ot_id']);
        $condit_member['m_id'] = array('eq',$_REQUEST['m_id']);
        $orderT = $db->where($condit_orderT)->select();
        $result = $db->where($condit_orderT)->delete();
        if($result) {
        	$db = M('Member');
        	$result = $db->where($condit_member)->setInc('cash',$orderT[0]['cost']);
        	if($result) {
        		$this->ajaxReturn($result);
        	}
        }
    }
    public function food_return(){
        $db = M('Orderfood');
        $condit_orderF['of_id'] = array('eq',$_REQUEST['of_id']);
        $condit_member['m_id'] = array('eq',$_REQUEST['m_id']);
        $orderF = $db->where($condit_orderF)->select();
        $result = $db->where($condit_orderF)->delete();
        if($result) {
            $db = M('Member');
            $result = $db->where($condit_member)->setInc('cash',$orderF[0]['food_cost']);
            if($result) {
                $this->ajaxReturn($result);
            }
        }
    }
}