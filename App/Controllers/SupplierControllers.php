<?php
namespace App\Controllers;
use App\Model\ArticlesModel;
use App\Html\Form;
use App\Html\BootstrapForm;

	class SupplierControllers extends Controller {

	    public function __construct()
        {
            parent::__construct();
            $this->loadModel('Supplier');		
        }

        public function index() {
			$articles = $this->Articles->load();

			$this->rander('articles/index', compact('articles'));
		}

		public function model() {
			$suppliers = $this->Supplier->all();

			$rs = "";

			foreach ($suppliers as $supplier) {
				$rs .= "<tr>
				  <td><button  supplier_select_id='".$supplier->id."' class='supplier_select btn btn-primary btn-xs' onclick='selectSupplier(this, event);'>Select</button></td>
		          <td class='supplier-name'>".$supplier->name."</td>
		          <td class='supplier-city'>".$supplier->city."</td>
		          <td class='supplier-adress'>".$supplier->adress."</td>
		          </tr>
				";
			}

			return $rs;
		}

	}


	/*

	$('.supplier_name_info').text($(tr).('.supplier_name').text());
	$('.supplier_city_info').text($(tr).('.supplier_city').text());
	$('.supplier_adress_info').text($(tr).('.supplier_adress').text()); */