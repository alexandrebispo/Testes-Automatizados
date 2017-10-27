#Formulário básico
==================

Nessa fase, você deverá criar uma classe(s) que seja responsável por gerar um formulário HTML de forma totalmente dinâmica.

Uma vez que você criar o objeto de seu formulário, você poderá chamar métodos para adicionar um novo campo, especificando seu tipo, entre outros;

Essa classe deverá possuir um método chamado render, esse método terá o objetivo de gerar o código HTML do formulário, baseado nos campos adicionados anteriormente.

Não deixe de tentar utilizar os conceitos de patterns e design aprendidos até o momento, para que o projeto possa evoluir de forma mais estruturada.


Formas de usar:
--------------
	Instancie um objeto do tipo form.
	Instacie objeto do tipo label, input, select, textarea, button.
		Passando exatamente os paramentos para cada um deles:
			- label: For
			- input: type, name, value, placeholder
			- select: value => O valor e o texto do option serão sempre os mesmos.
			- textarea: cols, name, rows, placeholder
			- button: type, name, value
	Adicionar o objeto do tipo label, input, select, textarea ou button a um metodo addElement do objeto form.
	E por fim, chamar o metodo render() do objeto form


	Como demostrado no exemplo abaixo:

	``````````````````````````````````
	$form = new Education\Form\Form();
		$label1 = new Education\Form\Label("Pessoa Fisica ");
		$input1 = new Education\Form\Input("radio", "fisica", "pessoa fisica", "Pessoa Física");
	$form->addElement($label1);
	$form->addElement($input1);
		$label2 = new Education\Form\Label("Pessoa Juridica ");
		$input2 = new Education\Form\Input("radio", "Juridica", "pessoa jurídica", "Pessoa Jurídica");
	$form->addElement($label2);
	$form->addElement($input2);
		$label3 = new Education\Form\Label("Nome: ");
		$input3 = new Education\Form\Input("text", "Nome", "", "Nome");
	$form->addElement($label3);
	$form->addElement($input3);
		$label4 = new Education\Form\Label("Sobrenome: ");
		$input4 = new Education\Form\Input("text", "Sobrenome", "", "Sobrenome");
	$form->addElement($label4);
	$form->addElement($input4);
		$label5 = new Education\Form\Label("E-mail: ");
		$input5 = new Education\Form\Input("text", "email", "", "E-mail");
	$form->addElement($label5);
	$form->addElement($input5);	
		$label6 = new Education\Form\Label("CPF/CNPJ: ");
		$input6 = new Education\Form\Input("text", "cpf_cnpj", "", "digite aqui seu cpf ou cnpj");
	$form->addElement($label6);
	$form->addElement($input6);	
		$label7 = new Education\Form\Label("Sexo: ");
		$select1 = new Education\Form\Select();
			$select1->addOptions("Indefinido");
			$select1->addOptions("Masculino");
			$select1->addOptions("Feminino");
	$form->addElement($label7);
	$form->addElement($select1);
		$textArea1 = new Education\Form\TextArea(33, "texto_de_cadastro", 10, "Escreva Aqui!");
	$form->addElement($textArea1);

	`````````````````````````````


	OBS:

	- Na indução de tipo, apenas coloque a barra invertida (\) quando o tipo for class;
	
========================================================================================================


#Funcionalidades
----------------

Agora que você criou um formulário que é montado dinâmicamente, vamos adicionar mais funcionalidades nele:

- Para cada campo adicionado ao formulário, deve ser possível renderiza-lo separadamente. Você deve criar um método “createField()” e este deve receber parâmetros para a criação do campo (poderemos ter vários tipos de campos).

- Todos os nossos forms agora deverão depender de uma classe chamada “Validator”, que será responsável pela validação dos dados do formulário. Esta classe dependerá de outra classe chamada de “Request”, que representará uma requisição do usuário.

- Crie 4 instancias deste form com os campos que você quiser e renderize. Implementaremos as classes “Validator” e “Request” em exemplos posteriores.

	Restrições & dicas

		- Toda a implementação deve ser feita usando OO (sem uso de funções)
		- Não é permitido usar métodos e atributos estáticos
		- Não é permitido usar os patterns Singleton e/ou Registry
		- Procure fazer classes pequenas.
		- Classes com +300 linhas não serão permitidas
		- Procure fazer métodos pequenos. Métodos com +100 linhas não serão permitidos
		- Use muitas interfaces para confiar na comuniçação/contrato dos seus objetos.
		- Separe as classes em namespaces.

===============================================================================================================================================================================

#Fieldsets
----------

Agora que seu form possui elementos que são renderizados separadamente, vamos fazer o mesmo para um elemento em especial: o fieldset.

Você deve ser capaz de criar um formulário onde chamando o método "createField()" da fase anterior, seja possível você criar fieldsets e popular esses fieldsets com campos, usando mesmo método. 

===============================================================================================================================================================================

#Populate

Nessa fase você deve criar um formulário de cadastro de produto contendo os seguintes campos:

Nome: Texto
Valor: Texto
Descrição: Texto
Categoria: Select, com as opções vindo dinâmicamente de um banco de dados sqlite.

Você deverá ser capaz de popular esse formulário com dados vindo de um array, no momento da exibição do formulário.

Algo como: $form->popular($dados);

Ao popular o formulário você deve exibir mensagens de erro para as seguintes situações:

- Caso o nome do produto não esteja no array ou esteja vazio;
- Caso o valor do produto não seja numérico
- Caso a descrição contenha +200 caracteres.

No seu formulário também deve ser permitido exibir os erros ao topo do formulário em forma de lista (ul) OU cada erro anexado ao campo que ele se refere OU mostrar os erros em forma de lista ao rodapé do formulário.

Estas mensagens de erro devem ser exibidas assim que o formulário é populado.

Recomendacoes:

- Procure usar todos os patterns que foram ensinados até agora para que seu código fique mais organizado
- Faça métodos e classes pequenos

===============================================================================================================================================================================
Cobertura das principais classes
--------------------------------

Baseado no que foi passado até o momento, pegue suas principais classes de seu projeto: Formulário Dinâmico, realizado no capítulo anterior, e crie os testes unitários das principais classes que não possuem nenhuma dependência.

Observações:
- Não se esqueça de validar os tipos das classes no caso de as mesmas implementarem alguma interface.
- Todos os testes obrigatoriamente devem passar
- Valide e trate os dados de entrada nos métodos
- Utilize o composer

=================
Testes unitários
-----------------

Agora você já deve ter criado os testes das principais classes de seu sistema, agora chegou a hora de fazer os testes unitários em TODAS as classes.

Lembrando que o teste unitário, testa a unidade, logo, se uma classe depende de outra, você deverá utilizar recursos como Mocks, para manipular os resultados a seu favor, para facilitar o processo de teste.

Faça uma revisão para garantir que todos os pontos da sua classe estão testados, principalmente os dados de entrada, que devem ser validados também por testes.


Pendencias
----------

	- Criar os testes da classe option
	- Criar os testes do model
