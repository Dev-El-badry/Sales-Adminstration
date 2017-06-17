<?php
namespace App\Controllers;
use App\Model\ArticlesModel;
use App\Html\Form;
use App\Html\BootstrapForm;
use App\Upload;

	class ArticlesControllers extends Controller {

	    public function __construct()
        {
            parent::__construct();
            $this->loadModel('Articles');
            $this->loadModel('Category');
            $this->loadModel('Unit');
            $this->loadModel('Tva');
            $this->loadModel('Supplier');		
        }

        public function search() {
        	$filter = '';

			if (isset($_POST['ref']) && $_POST['ref'] !='') 
				$filter .= " AND ref like '%{$_POST['ref']}%'";
			
			if (isset($_POST['desig']) && $_POST['desig'] !='') 
				$filter .= " AND desig like '%{$_POST['desig']}%'";

			if (isset($_POST['category_id']) && $_POST['category_id'] != '') 
				$filter .= " AND category_id = {$_POST['category_id']}";

			if (isset($_POST['unit_id']) && $_POST['unit_id'] != '') 
				$filter .= " AND unit_id = {$_POST['unit_id']}";

			if (isset($_POST['suplier_id']) && $_POST['suplier_id'] != '') 
				$filter .= " AND suplier_id = {$_POST['suplier_id']}";

			if (isset($_POST['trv']) && $_POST['trv'] != '') 
				$filter .= " AND trv = {$_POST['trv']}";




			$articles = $this->Articles->load($filter);

			$res = '';
			foreach($articles as $article) { 
       			
       			$res = '<tr>
		          <td>'.$article->id.'</td>
		          <td>'.$article->ref.'</td>
		          <td>'.$article->desig.'</td>
		          <td>'.$article->Tva.'</td>
		          <td>'.$article->supplier_name.'</td>
		          <td>'.$article->cat_name.'</td>
		          <td>'.$article->unit.'</td>
		          <td>
		            <a href="" class="btn btn-danger btn-xs" id_art="'.$article->id .'" onclick="deleteArt(this, event);">Delete</a>
		            <a href="?p=articles/edit&id='.$article->id.'" class="btn btn-primary btn-xs">Edit</a>
		            <a href="" class="btn btn-success btn-xs">Show</a>
		          </td>
		        </tr>';
		         }

			return $res;
		}

        public function index() {
			$articles = $this->Articles->load();

			$categories = $this->Category->extractData('id', 'name');
			$units = $this->Unit->extractData('id', 'unit');
			$tva = $this->Tva->extractData('trv', 'trv');
			$suppliers = $this->Supplier->extractData('id', 'name');

			$form = new BootstrapForm($_POST);

			$this->rander('articles/index', compact('form', 'articles', 'categories', 'units', 'tva', 'suppliers'));
		}

		public function delete() {
			if (isset($_POST['id_art'])) {
				$res = $this->Articles->delete($_POST['id_art']);

				if ($res) {
					return 1;
				} else {
					return 0;
				}
			}
		}

		public function add() {
			if (! empty($_POST)) {
				$thumb_name = $this->Articles->max() + 1 . '.jpg' ;
				$params = [
					'ref' 			=> $_POST['ref'],
					'desig' 		=> $_POST['desig'],
					'category_id' 	=> $_POST['category_id'],
					'unit_id' 		=> $_POST['unit_id'],
					'tvr' 			=> $_POST['tvr'],
					'suplier_id'	=> $_POST['suplier_id'],
					'created_by'	=> 1,
					'updated_by'	=> 1
				];

				if (isset($_FILES['thumb'])) {
					$params['thumb'] = $thumb_name;
				}


				$res = $this->Articles->create($params);
				if ($res && isset($_FILES['thumb'])) {
					Upload::one(
					$_FILES['thumb'],
					$thumb_name,
					ROOT.'/Public/images/'
					);
				}
			}

			$categories = $this->Category->extractData('id', 'name');
			$units = $this->Unit->extractData('id', 'unit');
			$tva = $this->Tva->extractData('trv', 'trv');

			$form = new BootstrapForm($_POST);
			$this->rander('articles/edit', compact('form', 'categories', 'units', 'tva'));
		}

		public function edit() {
			$id = $_GET['id'];

			if (isset($_POST) && !empty($_FILES)) {
				$this->Articles->update($id, [
					'ref' 			=> $_POST['ref'],
					'desig' 		=> $_POST['desig'],
					'category_id' 	=> $_POST['category_id'],
					'unit_id' 		=> $_POST['unit_id'],
					'tvr' 			=> $_POST['tvr'],
					'suplier_id'	=> $_POST['suplier_id'],
					'thumb'			=> $_FILES['thumb']['name'],
					'created_by'	=> 1,
					'updated_by'	=> 1
					]);
			}


			$categories = $this->Category->extractData('id', 'name');
			$units = $this->Unit->extractData('id', 'unit');
			$tva = $this->Tva->extractData('trv', 'trv');

			$article = $this->Articles->find($id);

			$form = new BootstrapForm($article);
			$this->rander('articles/edit', compact('form', 'categories', 'units', 'tva'));
		}
	}