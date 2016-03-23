<!DOCTYPE html>
<html>
	<head>
		<title>Termo de Adesão</title>
		<meta charset="UTF-8">
		<style type="text/css">

			body{
				margin: 0px;
			}

			#body{
				padding: 2%;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 50px;
				width: 792px;
				height: 1122px;
				margin-top: 3%;
				border: 1px solid black;
			}

			#top{
				width: 80%;
				margin-left: 10%;
				margin-top: 10px;
				height: 120px;
			}

			#left-top{
				width: 70%;
				float: left;
				height: 120px;	
			}

			#title-top{
				width: 100%;
				height: 20px;
				font-size: 16px;
				font-family: helvetica;
				text-decoration: underline;
				color: gray;
			}

			#text-top{
				width: 100%;
				height: 100px;
				padding-top: 5px;
			}

			.line{
				font-family: helvetica;
				width: 100%;
				color: gray;
				font-size: 16px;
			}

			#logo-top{
				width: 30%;
				height: 120px;
				float: right;
				text-align: center;
				line-height: 120px;
				color: gray;
			}

			#content{
				width: 80%;
				margin-left: 10%;
				margin-top: 20px;
				margin-bottom: 20px;
				height: auto;
			}

			#text-content{
				font-family: calibri;
				text-align: justify;
			}

			#footer{
				width: 80%;
				margin-left: 10%;
				height: 200px;
			}

			#data{
				width: 100%;
				text-align: center;
				padding-top: 20px;
			}

			#assinatura{
				width: 100%;
				height: 100px;
				margin-top: 10px;
			}

			.assinatura{
				margin-top: 80px;
				width: 50%;
				height: 100px;
				text-align: center;
				float: left;
			}

		</style>
	</head>

	<body>
		<div id="body">
			<div id="top">
				<div id="left-top">
					<div id="title-top"><strong> Termo de Adesão </strong></div>
					<div id="text-top">
						<div class="line"> {!! $investment->Company->company_name !!}</div>
						<div class="line"> RENDA FIXA - INVESTIMENTOS PRIVADOS </div>
						<div class="line"> CNPJ N. 18.097.471/0001-25 </div>
					</div>
				</div>
				<div id="logo-top"> logo </div>
			</div>

			<div id="content">
				<div id="text-content">
					[IDENTIFICAÇÃO DO INVESTIDOR], inscrito(a) no CPF/CNPJ n.º [NUMERO DO CPF/CNPJ], pretendendo assumir a condição de Cotista da 1a. Emissão de Nota Promissória da investida acima indicada, vem, pelo presente instrumento, manifestar expressamente a adesão ao Prospecto da citada emissão, declarando nesta oportunidade que: 
					<ol>
						<li>
							Está ciente de que a emissão é gerida através de mandato por GILBERTO SERPA GRIEBELER, administrador de empresas, inscrito perante o CRA/PR sob o n. 1356,  portador do CPF/MF sob n.º 112.297.649-68,. e juridicamente estruturada pela A. AUGUSTO GRELLERT ADVOGADOS ASSOCIADOS, inscrita no CNPJ sob n.º 06.912.751/0001-60;  
						</li>
						<li>
							Recebeu, antes de assinado o presente Termo de Adesão, uma cópia do Prospecto e da Ficha Cadastral, bem como da Nota Promissória, nos termos da legislação vigente. Conhece e reconhece como válidas e obrigatórias as suas normas, aderindo formalmente, nesse ato, as suas disposições, que assumem a condição jurídica de cláusulas contratuais mutuamente vinculantes; 
						</li>
						<li>
							Tem ciência de que o relatório de liquidez da emissora será atualizado mensalmente e que referido documento estará disponível no endereço da sua sede, sendo que demais informações poderão ser obtidas rede mundial de computadores, no endereço www.alavancabrasil.com.br; 
						</li>
						<li>
							Tem ciência da política de investimento desse veículo e do grau de risco desse tipo de aplicação financeira; reconheço que as aplicações realizadas na emissora não possuem a garantia do gestor, do estruturador jurídico, nem mesmo do Fundo Garantidor de Créditos (FGC);
						</li>
						<li>
							Está ciente de que os recursos a serem investidos na emissora deverão ser creditados na conta corrente da emitente sob n.º [NUMERO DA CONTA CORRENTE], mantida junto à agência [NUMERO DA AGENCIA] do Banco [NOME E NUMERO DO BANCO], exclusivamente através do pagamento do Boleto Bancário emitido e recebido neste ato, ao qual fica a liquidação vinculada à validade do investimento ora aderido e de todas as demais disposições;
						</li>
						<li>
							Tem pleno conhecimento das disposições da Lei n. 9613/98 (crimes de lavagem de dinheiro) e legislação complementar, estando ciente de que as operações no mercado financeiro estão sujeitas a controle do Banco Central do Brasil e da Comissão de Valores Mobiliários - CVM, que podem solicitar informações sobre as movimentações de recursos realizadas pelos investidores. 
						</li>
					</ol>
				</div>
			</div>

			<div id="footer">
				<div id="data"> [LOCAL E DATA]  </div>
				<div id="assinatura">
					<div class="assinatura">
					<div class="line-footer">---------------------------------------</div>
					<div class="id-footer">[ IDENTIFICAÇÃO DO INVESTIDOR ]</div>
					<div class="id-footer">[ NUMERO CPF/CNPJ ]</div>
				</div>
				<div id="assinatura">
					<div class="assinatura">
					<div class="line-footer">---------------------------------------</div>
					<div class="id-footer">[ IDENTIFICAÇÃO DO INVESTIDOR ]</div>
					<div class="id-footer">[ NUMERO CPF/CNPJ ]</div>
				</div>
			</div>
		</div>
	</body>
</html>