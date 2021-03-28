<?php 
namespace App\Controllers;
use App\Models\BranchModel;
use App\Models\ClientModel;
use CodeIgniter\Controller;

class ClientCrud extends Controller
{
    // show clients list
    public function index(){
        $branchModel = new BranchModel();
        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->orderBy('id', 'DESC')->findAll();
        $data['branches'] = $branchModel->orderBy('id', 'DESC')->findAll();
        return view('client_view', $data);
    }


      // show add client form
    public function createClient(){
        $branchModel = new BranchModel();
        $data['branches'] = $branchModel->orderBy('id', 'DESC')->findAll();
        if (count($data['branches'])==0) {
           return view('branch_message');
        };
        return view('new_client', $data);
    }
 
    // insert data into database
    public function storeClient() {
        $clientModel = new ClientModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'branch_id'  => $this->request->getVar('branch_id'),
            'balance'  => $this->request->getVar('balance'),
        ];
        $clientModel->insert($data);
        return $this->response->redirect('/client-list');
    }

    // show single client
    public function singleClient($id = null){
        $clientModel = new ClientModel();
        $branchModel = new BranchModel();
        $data['client_obj'] = $clientModel->where('id', $id)->first();
        $data['branches'] = $branchModel->orderBy('id', 'DESC')->findAll();
        return view('edit_client', $data);
    }

    // update client data
    public function updateClient(){
        $clientModel = new ClientModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'branch_id'  => $this->request->getVar('branch_id'),
            'balance'  => $this->request->getVar('balance'),
        ];
        $clientModel->update($id, $data);
        return $this->response->redirect('/client-list');
    }
 
    // delete client
    public function deleteClient($id = null){
        $clientModel = new ClientModel();
        $data['client'] = $clientModel->where('id', $id)->delete($id);
        return $this->response->redirect('/client-list');
    }    



    // Balance transfer
    public function transferBalance(){

        $clientModel = new ClientModel();
        $data['clients'] = $clientModel->orderBy('id', 'DESC')->findAll();
        return view('transfer_balance', $data);
    }

     // update client data
    public function updateClientBalance(){
        $clientModel = new ClientModel();
        $id = $this->request->getVar('client_id_from');
        $data = [
            'balance'  => $this->request->getVar('new_balance'),
        ];

        $id2 = $this->request->getVar('client_id_to');
        $data2 = [
            'balance'  => $this->request->getVar('actual_balance'),
        ];
        $clientModel->update($id, $data);
        $clientModel->update($id2, $data2);
        return $this->response->redirect('/client-list');
    }

    

}