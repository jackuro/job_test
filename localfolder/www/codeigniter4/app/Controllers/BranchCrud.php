<?php 
namespace App\Controllers;
use App\Models\BranchModel;
use CodeIgniter\Controller;

class BranchCrud extends Controller
{
    // show branches list
    public function index(){
        $branchModel = new BranchModel();
        $data['branches'] = $branchModel->orderBy('id', 'DESC')->findAll();
        return view('branch_view', $data);
    }

    // show add branch form
    public function create(){
        return view('new_branch');
    }

 
    // insert data into database
    public function store() {
        $branchModel = new BranchModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'address'  => $this->request->getVar('address'),
        ];
        $branchModel->insert($data);
        return $this->response->redirect('/branch-list');
    }

    // show single branch
    public function singleBranch($id = null){
        $branchModel = new BranchModel();
        $data['branch_obj'] = $branchModel->where('id', $id)->first();
        return view('edit_branch', $data);
    }

    // update branch data
    public function update(){
        $branchModel = new BranchModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'address'  => $this->request->getVar('address'),
        ];
        $branchModel->update($id, $data);
        return $this->response->redirect('/branch-list');
    }
 
    // delete branch
    public function delete($id = null){
        $branchModel = new BranchModel();
        $data['branch'] = $branchModel->where('id', $id)->delete($id);
        return $this->response->redirect('/branch-list');
    }    
}