<?php 
namespace App\Models;
use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $table = 'branch';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name', 'address'];
}