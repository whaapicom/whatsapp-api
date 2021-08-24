<?php

class WhaAPI {
    private $instanceId;
    private $apiKey;

    function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    function setInstance($instanceId) {
        $this->instanceId = $instanceId;
    }

    function request($endpoint,$method,$params=[]) {
        $ch = curl_init();
        $g = "";
        if ($method  == 'GET' && count($params) != 0) {
            $g = '&'.http_build_query($g);
        }

        curl_setopt($ch, CURLOPT_URL,"https://s2.wha-api.com/Instance".$this->instanceId.'/'.$endpoint.'?token='.$this->apiKey.$g);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            if (count($params) != 0) {
                curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($params));
            }
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $result = curl_exec($ch);
        curl_close ($ch);
        return $result;
    }

    function me() {
        return json_decode($this->request('me','GET'));
    }

    function CheckAuth() {
        return json_decode($this->request('CheckAuth','GET'));
    } 

    function Webhook($params=[]) {
        if ($params!=[]){
            return json_decode($this->request('Webhook','POST',$params));
        } else{
            return json_decode($this->request('Webhook','GET'));
        }
        
    }
    function DeleteSession() {
        return json_decode($this->request('DeleteSession','GET'));
    }

    function ClearData() {
        return json_decode($this->request('DeleteSession','GET'));
    }

    function Dialogs() {
        return json_decode($this->request('DeleteSession','GET'));
    }
    
    function ReadChat($params=[]) {
        return json_decode($this->request('ReadChat','POST',$params));
    }
    
    function DeleteMessage($params=[]) {
        return json_decode($this->request('DeleteMessage','POST',$params));
    }

    function CreateGroup($params=[]) {
        return json_decode($this->request('CreateGroup','POST',$params));
    }

    function LeaveGroup($params=[]) {
        return json_decode($this->request('LeaveGroup','POST',$params));
    }

    function addGroupParticipant($params=[]) {
        return json_decode($this->request('addGroupParticipant','POST',$params));
    }

    function removeGroupParticipant($params=[]) {
        return json_decode($this->request('removeGroupParticipant','POST',$params));
    }

    function setGroupAdmin($params=[]) {
        return json_decode($this->request('setGroupAdmin','POST',$params));
    }

    function typing($params=[]) {
        return json_decode($this->request('typing','POST',$params));
    }

    function UnreadChat($params=[]) {
        return json_decode($this->request('UnreadChat','POST',$params));
    }

    function unpinChat($params=[]) {
        return json_decode($this->request('UnreadChat','POST',$params));
    }

    function forwardMessage($params=[]) {
        return json_decode($this->request('UnreadChat','POST',$params));
    }

    function recording($params=[]) {
        return json_decode($this->request('recording','POST',$params));
    }

    function Messages($params=[]) {
        return json_decode($this->request('Messages','GET',$params));
    }

    function sendMessage($params=[]) {
        return json_decode($this->request('sendMessage','POST',$params));
    }
    
    function sendFile($params=[]) {
        return json_decode($this->request('sendFile','POST',$params));
    }

    function sendLocation($params=[]) {
        return json_decode($this->request('sendLocation','POST',$params));
    }

    function sendVCard($params=[]) {
        return json_decode($this->request('sendVCard','POST',$params));
    }
    
    function profileImage($params=[]) {
        return json_decode($this->request('profileImage','POST',$params));
    }

    function checkPhone($params=[]) {
        return json_decode($this->request('checkPhone','POST',$params));
    }

    function lastSeen($params=[]) {
        return json_decode($this->request('lastSeen','POST',$params));
    }

    function contactBlock($params=[]) {
        return json_decode($this->request('contactBlock','POST',$params));
    }

    function blockList() {
        return json_decode($this->request('blockList','GET'));
    }
}

?>
