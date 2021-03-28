<?php 
namespace App\Controllers;
use App\Models\BranchModel;
use App\Models\ClientModel;
use CodeIgniter\Controller;

class ReportCrud extends Controller
{
    // show clients and branches
    public function index(){
        $branchModel = new BranchModel();
        $clientModel = new ClientModel();
        $data['branches'] = $branchModel->orderBy('id', 'DESC')->findAll();
        $data['client_obj'] = $clientModel->orderBy('balance', 'DESC')->findAll();;

        return view('report_view', $data);
    }
    

    public function report(){
        $branchModel = new BranchModel();
        $clientModel = new ClientModel();
        $data['branches'] = $branchModel->orderBy('id', 'DESC')->findAll();
        $data['client_obj'] = $clientModel->orderBy('balance', 'DESC')->findAll();;

        return view('report_view2', $data);
    }

}