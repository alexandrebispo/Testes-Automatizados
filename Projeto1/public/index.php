<?php 

	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	
	define('CLASS_DIR', '../src');
	set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
	spl_autoload_register();
?>

<!DOCTYPE html>
<html lang="PT-Br">
<head>
	<meta charset="UTF-8">
	<title>Formulário</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<meta name = "format-detection" content = "telephone=no" />
	<!--CSS-->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<!--JS-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		body{
			margin: 0;
			padding: 0;

		}

		.container{
			margin: 5% auto;
			font-family: sans-serif;
			font-size: 14px;
			color: #444;
		}

		form{
			margin: 5% 0 0 0;
			font-family: sans-serif;
			font-size: 14px;
			color: #444;
		}

		input{
			margin-bottom: 10px;
		}

		select{
			margin-bottom: 08px;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<?php 

			// Nome: Texto
			// Valor: Texto
			// Descrição: Texto
			// Categoria: Select, com as opções vindo dinâmicamente de um banco de dados sqlite.

			$request = new Education\Http\Request();
			$validator = new Education\Validation\Validator($request);

			$form1 = new Education\Form\Form($validator);
			$inputNome = new Education\Form\Input(['type' => 'text', 'name' => 'nome']);
			$inputValor = new Education\Form\Input(['type' => 'text', 'name' => 'valor']);
			$inputdesc = new Education\Form\Input(['type' => 'text', 'name' => 'descricao']);
			$inputSubmit = new Education\Form\Input(['type' => 'submit','name' => 'Enviar', 'value' => 'Enviar']);
			//$button = new Education\Form\Button(['type' => 'submit', 'text' => 'enviar', 'value' => 'enviando', 'name' => 'botao']);
			$select = $form1->createField('select', ['name' => "categoria"]);


			$form1->addField($inputNome);
			$form1->addField($inputValor);
			$form1->addField($inputdesc);


			$db = Education\Model\Connect::getInstance();
			$selectDb = new Education\Model\Select($db);
			$op = $selectDb->getOptions();

			foreach ($op as $key => $value) {
				$option = $form1->createField('option', ['value' => $value['id'], 'text' => $value['select']]);
				$select->addOption($option);
			}

			$form1->addField($select);

			$form1->addField($inputSubmit);
			//$form1->addField($button);

			$fieldDefs = array(
			    'nome' => 'Alexandre',
			    'valor' => '35',
			    'descricao' => 'Sapato preto',
			);
			
			$form1->populate($fieldDefs);
			$form1->getValidator()->addRule(array('element' => $inputNome, 'rules' => array(array('rule' => 'is_required'))));
			$form1->getValidator()->addRule(array('element' => $inputValor, 'rules' => array(array('rule' => 'is_numeric'))));
			$form1->getValidator()->addRule(array('element' => $inputdesc, 'rules' => array(array('rule' => 'max_length', 'params' => array('max' => 200)))));
			$form1->render();
			?>
			</div>
		</div>
			

	</div>
</body>
</html>
