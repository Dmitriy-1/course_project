<?php
class Request{

    public $id_r;
    public $id_a;
    public $id_m;
    public $id_w;
    public $id_k;
    public $date_time_recording;
    public $full_procedure_request;
    public $application_lead_time;
    public $status_request;






    function request_cont()
    {
        $this->id_w= trim($_POST['id_w']);
        $this->id_k= trim($_POST['id_k']);
        $this->date_time_recording= trim($_POST['date_time_recording']);
        $this->full_procedure_request= trim($_POST['full_procedure_request']);
        $this->application_lead_time= trim($_POST['application_lead_time']);
        $this->status_request='В работе';
    }

    function set_request(){
        $this->id_a=$_SESSION['user']->id_a;
        global $pdo;
        $sql = 'SELECT * FROM request WHERE id_a=:id_a';
        $request = $pdo->prepare($sql);
        $request->bindParam(':id_a', $this->id_a);
        $request->execute();
        $data = $request->fetchAll();
        return $data;
    }
    function set_request_admin($id_a){
        $this->id_a=$id_a;
        global $pdo;
        $sql = 'SELECT id_r FROM request WHERE id_a=:id_a';
        $request = $pdo->prepare($sql);
        $request->bindParam(':id_a', $this->id_a);
        $request->execute();
        $data = $request->fetchAll();
        return $data;
    }
    function set_request_c($id_k){
        $this->id_k=$id_k;
        global $pdo;
        $sql = 'SELECT id_r FROM request WHERE id_k=:id_k';
        $request = $pdo->prepare($sql);
        $request->bindParam(':id_k', $this->id_k);
        $request->execute();
        $data = $request->fetchAll();
        return $data;
    }




    function check_param(){
        $this->id_r = trim($_POST['id_r']);
        $this->id_a = trim($_POST['id_a']);
        $this->id_m = trim($_POST['id_m']);
        $this->id_w = trim($_POST['id_w']);
        $this->date_time_recording = trim($_POST['date_time_recording']);
        $this->full_procedure_request = trim($_POST['full_procedure_request']);
        $this->application_lead_time = trim($_POST['application_lead_time']);
        $this->status_request = trim($_POST['status_request']);
        if(trim($_POST['id_r']) && trim($_POST['id_a'])&&trim($_POST['id_m'])&&trim($_POST['id_w'])
            &&trim($_POST['date_time_recording'])&&trim($_POST['full_procedure_request'])
            &&trim($_POST['application_lead_time'])&&trim($_POST['status_request'])){
        } else {
            throw new Exception('Пожалуйста, заполните все поля.');
        }
    }



    function create_request(){
        $this->id_a=$_SESSION['user']->id_a;
       $this->id_m=$_SESSION['user']->id_m;
        global $pdo;
        $sql = 'INSERT INTO request( id_a, id_m, id_w, id_k, date_time_recording, full_procedure_request, 
            application_lead_time, status_request)
    VALUES ( :id_a, :id_m, :id_w, :id_k, :date_time_recording, :full_procedure_request,:application_lead_time, :status_request);';
        $params = [
            ':id_a' => $this->id_a,
            ':id_m' => $this->id_m,
            ':id_w' =>  $this->id_w,
            ':id_k' =>  $this->id_k,
            ':date_time_recording' =>  $this->date_time_recording,
            ':full_procedure_request' =>  $this->full_procedure_request,
            ':application_lead_time' =>  $this->application_lead_time,
            ':status_request' => $this->status_request
        ];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }

    function update_request(){
        global $pdo;
        $sql = 'UPDATE request   SET   id_m=:id_m, id_w=:id_w,status_request=:status_request,date_time_recording=:date_time_recording,
                    full_procedure_request=:full_procedure_request,application_lead_time=:application_lead_time
         
 WHERE id_r=:id_r';
        $params = [
            ':id_r' => $this->id_r,
            ':id_m' => $this->id_m,
            ':id_w' =>  $this->id_w,
            ':date_time_recording' => $this->date_time_recording,
            ':full_procedure_request' =>  $this->full_procedure_request,
            ':application_lead_time' =>  $this->application_lead_time,
            ':status_request' =>  $this->status_request
        ];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }

    function delete_request($id_k){
        $this->id_k = $id_k;
        global $pdo;
        $sql = 'DELETE FROM request WHERE id_k=:id_k ';
        $params = [
            ':id_k' => $this->id_k,

        ];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }
    function delete_request_request(){
        $this->id_r = trim($_POST['id_r']);
        global $pdo;
        $sql = 'DELETE FROM request WHERE id_r=:id_r ';
        $params = [
            ':id_r' => $this->id_r,

        ];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }
    function delete_request_request1($id_a){
        $this->id_a = $id_a;
        global $pdo;
        $sql = 'DELETE FROM request WHERE id_a=:id_a ';
        $params = [
            ':id_a' => $this->id_a,
        ];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }





}
