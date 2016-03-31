<!DOCTYPE html>
<html>
	<head>
		<title>Termo de Adesão</title>
		<meta charset="UTF-8" />
		<style type="text/css">

			body{
				margin: 0px;
			}

			#bodya{
				padding: 2%;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 50px;
				width: 792px;
				height: 1122px !important;
				margin-top: 3%;
				border: 1px solid black;
			}

			#topa{
				width: 80%;
				margin-left: 10%;
				margin-top: 10px;
				height: 120px;
			}

			#left-topa{
				width: 70%;
				float: left;
				height: 120px;	
			}

			#title-topa{
				width: 100%;
				height: 20px;
				font-size: 16px;
				font-family: helvetica;
				text-decoration: underline;
				color: gray;
			}

			#text-topa{
				width: 100%;
				height: 100px;
				padding-top: 5px;
			}

			.linea{
				font-family: helvetica;
				width: 100%;
				color: gray;
				font-size: 16px;
			}

			#logo-topa{
				width: 30%;
				height: 120px;
				float: right;
				text-align: center;
				line-height: 120px;
				color: gray;
			}

			#contenta{
				width: 80%;
				margin-left: 10%;
				margin-top: 20px;
				margin-bottom: 20px;
				height: auto;
			}

			#text-contenta{
				font-family: calibri;
				text-align: justify;
			}

			#footera{
				width: 80%;
				margin-left: 10%;
				height: 200px;
			}

			#dataa{
				width: 100%;
				text-align: center;
				padding-top: 20px;
			}

			#assinaturaa{
				width: 100%;
				height: 100px;
				margin-top: 10px;
			}

			.assinaturaa{
				margin-top: 80px;
				width: 50%;
				height: 100px;
				text-align: center;
				float: left;
			}

		</style>
	</head>

	<body>
		<div id="bodya">
			<div id="topa">
				<div id="left-topa">
					<div id="title-topa"><strong> Termo de Adesão </strong></div>
					<div id="text-topa">
						<div class="linea"> {!! $investment->Company->company_name !!}</div>
						<div class="linea"> RENDA FIXA - INVESTIMENTOS PRIVADOS </div>
						<div class="linea"> CNPJ N. {!! $investment->company->present()->cnpjCompany !!} </div>
					</div>
				</div>
				<div id="logo-topa"> logo </div>
			</div>

			<div id="contenta">
				<div id="text-contenta">
					{!! $investment->Client->name !!}, inscrito(a) no {!! $investment->Client->type == 'j' ? 'CNPJ: ' : 'CPF: ' !!} n.º
					{!! $investment->Client->type == 'j' ? $investment->Client->Legal->present()->cnpjLegal : $investment->Client->Physical->present()->cpfPhysical !!},
					pretendendo assumir a condição de Cotista da 1a. Emissão de Nota Promissória da investida acima indicada, vem, pelo presente instrumento, manifestar
					expressamente a adesão ao Prospecto da citada emissão, declarando nesta oportunidade que:
					<ol>
						<li>
							Está ciente de que a emissão é gerida através de mandato por GILBERTO SERPA GRIEBELER, administrador de empresas, inscrito perante o CRA/PR sob o n. 1356,
							portador do CPF/MF sob n.º 112.297.649-68,. e juridicamente estruturada pela A. AUGUSTO GRELLERT ADVOGADOS ASSOCIADOS, inscrita no CNPJ sob n.º
							06.912.751/0001-60;
						</li>
						<li>
							Recebeu, antes de assinado o presente Termo de Adesão, uma cópia do Prospecto e da Ficha Cadastral, bem como da Nota Promissória, nos termos da legislação
							vigente. Conhece e reconhece como válidas e obrigatórias as suas normas, aderindo formalmente, nesse ato, as suas disposições, que assumem a condição jurídica
							de cláusulas contratuais mutuamente vinculantes;
						</li>
						<li>
							Tem ciência de que o relatório de liquidez da emissora será atualizado mensalmente e que referido documento estará disponível no endereço da sua sede, sendo
							que demais informações poderão ser obtidas rede mundial de computadores, no endereço www.alavancabrasil.com.br;
						</li>
						<li>
							Tem ciência da política de investimento desse veículo e do grau de risco desse tipo de aplicação financeira; reconheço que as aplicações realizadas na emissora
							não possuem a garantia do gestor, do estruturador jurídico, nem mesmo do Fundo Garantidor de Créditos (FGC);
						</li>
						<li>
							Está ciente de que os recursos a serem investidos na emissora deverão ser creditados na conta corrente da emitente sob n.º
							{!! $investment->Invoice->Billet->account !!}, mantida junto à agência {!! $investment->Invoice->Billet->agency !!} do Banco
							{!! $investment->Invoice->Billet->name !!}, exclusivamente através do pagamento do Boleto Bancário emitido e recebido
							neste ato, ao qual fica a liquidação vinculada à validade do investimento ora aderido e de todas as demais disposições;
						</li>
						<li>
							Tem pleno conhecimento das disposições da Lei n. 9613/98 (crimes de lavagem de dinheiro) e legislação complementar, estando ciente de que as operações no
							mercado financeiro estão sujeitas a controle do Banco Central do Brasil e da Comissão de Valores Mobiliários - CVM, que podem solicitar informações sobre as
							movimentações de recursos realizadas pelos investidores.
						</li>
					</ol>
				</div>
			</div>

			<div id="footera">
				<div id="dataa"> Curitiba {!! dateLocate() !!} </div>
				<div id="assinaturaa">
					<div class="assinaturaa">
						<div class="line-footera">---------------------------------------</div>
						<div class="id-footera">[ IDENTIFICAÇÃO DO INVESTIDOR ]</div>
						<div class="id-footera">[ NUMERO CPF/CNPJ ]</div>
					</div><div class="assinaturaa">
						<div class="line-footera">---------------------------------------</div>
						<div class="id-footera">[ IDENTIFICAÇÃO DO INVESTIDOR ]</div>
						<div class="id-footera">[ NUMERO CPF/CNPJ ]</div>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>