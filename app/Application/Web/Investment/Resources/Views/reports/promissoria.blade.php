<!DOCTYPE html>
<html>
	<head>
		<title>Ficha de Cadastro</title>
		<meta charset="UTF-8">
		<style type="text/css">

			body{
			margin: 0px;
			}

			#body{
				padding: 5%;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 50px;
				width: 792px;
				height: 1122px;
				margin-top: 3%;
			}

			#body-border{
				border: 1px solid black;
				padding: 10px 10px 10px 10px;
				margin-bottom: 10px;

			}

			.mmmm-botton{
				margin-bottom: 10px;
			}

			#promissoria{
				width: 97,5%;
				margin-left: 2,5%;
				height: 501px;
			}

			#top{
				width: 100%;
				height: 80px;
				border: 1px solid black;
				margin-bottom: 1%;
			}

			#logo{
				width: 14%;
				height: 80px;
				float: left;
				text-align: center;
				line-height: 80px;
				border-right: 1px solid black;
			}

			#top-two-collun{
				width: 29%;
				height: 80px;
				float: left;
				text-align: center;
				line-height: 80px;
				border-right: 1px solid black;
				font-size: 26px;
			}

			#top-tree-collun{
				width: 19%;
				height: 80px;
				float: left;
				border-right: 1px solid black;
			}

			.title-top{
				padding-top: 10px !important;
				padding-left: 5px;
				padding-bottom: 10px;
				border-bottom: 1px solid black;
			}

			.body-top{
				padding-top: 10px;
				padding-left: 5px;
			}

			#top-for-collun{
				width: 37%;
				float: left;
			}

			#pro-body{
				margin-top: 5px;
				margin-bottom: 5px;
				width: 100%;
				height: 329px;
				border: 1px solid black;
			}

			.content{
				width: 99%;
				height: auto;
				border-bottom: 1px solid black;
				padding-left: 10px;
				padding-top: 4px;
				padding-bottom: 4px;

			}

			.line{
				margin-top: 1px;
			}

			#content-finish{
				width: 99%;
				height: auto;
				padding-left: 10px;
				padding-top: 4px;
				padding-bottom: 4px;

			}

			.content-collun{
				width: 60%;
				float: left;
			}

			.content-collun-two{
				width: 40%;
				float: left;
			}

			#footer{
				width: 100%;
				height: 50px;
				margin-top: 5px;
				border: 1px solid black;
			}

			.footer-collun{
				width: 15%;
				margin-left: 5%;
				padding-top: 5px;
				float: left;
			}

			#semvalor{
				margin-top: 100px;
				position: absolute;
				font-size: 150px;
				-webkit-transform: rotate(325deg);
				-moz-transform: rotate(325deg);
				-o-transform: rotate(325deg);
				writing-mode: lr-tb;
				filter: alpha(opacity = 20);
				opacity: 0.2;
			}


		</style>
	</head>

	<body>
		<div id="body">
			<div id="body-border">
				<div id="promissoria">
					<div id="top">
						<div id="logo"><strong> Logo </strong></div>
						<div id="top-two-collun"><strong> Nota Promissória </strong></div>
						<div id="top-tree-collun">
							<div class="title-top"><strong> Proposta : </strong>  {!! $investment->id !!} </div>
							<div class="body-top"><strong> Única </strong></div>
						</div>
						<div id="top-for-collun">
							<div class="title-top"><strong> Valor R$ : </strong>  {!! number_format($investment->value,2,'.',',') !!}  </div>
							<div class="body-top"><strong> Ultimo Venc : </strong> {!! $investment->present()->more361 !!} </div>
						</div>
					</div>
					<div id="pro-body">
						<div class="content">
							<div class="line"><strong> Credor(a) : {!! $investment->Company->name !!} </strong> </div>
							<div class="line"><strong> Endereço : </strong> {!! $investment->Company->Location->present()->addressFull !!}</div>
							<div class="line"><strong> CPNJ a sua ordem : </strong> {!! $investment->Company->present()->cnpjCompany !!} </div>
							<div class="line"><strong> Fone : </strong> {!! $investment->Company->present()->phoneCompany !!} </div>
						</div>
						<div class="content">
							<div class="line"><strong> Empreendimento : </strong> {!! $investment->Company->company_name !!} </div>
						</div>
						<div class="content">
							<div class="line"><strong></strong>
								Ao(s) {!! $investment->present()->moreThreesixone !!} Pagarei à {!! $investment->Client->name !!}; {!! $investment->Client->type == 'j' ? 'CNPJ' : 'CPF' !!}
								n° {!! $investment->Client->type == 'j' ? $investment->Client->Legal->present()->cnpjLegal : $investment->Client->Physical->present()->cpfPhysical !!}
								por está unica via de nota promissoria a quantia de <strong>{!! valorPorExtenso($investment->value) !!}</strong>, em moeda corrente deste pais, na praça
								do PARANÁ .
							</div>
						</div>
						<div class="content">
							<div class="line"><strong> Emitente : </strong>  </div>
							<div class="line"><strong> Nome : </strong> {!! $investment->Client->type == 'f' ? $investment->Client->name : $investment->Client->Legal->company_name !!} </div>
							<div class="line"><strong> Endereço : </strong>
								{!! $investment->Client->type == 'f' ? $investment->Client->Location->present()->addressFull : $investment->Client->Legal->Client->Location->present()->addressFull !!}
							</div>
							<div class="line"><strong> Fone : </strong> {!! $investment->Client->present()->phoneClient !!} </div>
						</div>
						<div id="content-finish">
							<div class="content-collun"><strong> Esta nota promissoria è sujeita a reajustes o seu vencimento de acordo com o indice pactuado em contrato. </strong></div>
							<div class="content-collun-two"><strong> Assinatura : </strong></div>
						</div>
					</div>
					
					Produto : 
					<div id="footer">
						<div class="line">
							<div class="footer-collun"> Prod. <br> 1</div>
							<div class="footer-collun"> Descrição. <br> Casas Diversos</div>
							<div class="footer-collun"> n°. <br> 145</div>
							<div class="footer-collun"> Boleto. <br> {{-- }{!! $investment->Invoice()->first()->id !!} --}}</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mmmm-botton">
				X -------------------------------------------------------------------------------------------------------------------------------------------------
			</div>
			<div id="body-border">

			<!-- div id="sem-img"> <img src="semvalor.png" /></div -->
				<div id="semvalor"> Sem Valor. </div>

				<div id="promissoria">
					<div id="top">
						<div id="logo"><strong> Logo </strong></div>
						<div id="top-two-collun"><strong> Nota Promissória </strong></div>
						<div id="top-tree-collun">
							<div class="title-top"><strong> Proposta : </strong>  {!! $investment->id !!} </div>
							<div class="body-top"><strong> Única </strong></div>
						</div>
						<div id="top-for-collun">
							<div class="title-top"><strong> Valor R$ : </strong>  {!! number_format($investment->value,2,'.',',') !!}  </div>
							<div class="body-top"><strong> Ultimo Venc : </strong> {!! $investment->present()->more361 !!} </div>
						</div>
					</div>
					<div id="pro-body">
						<div class="content">
							<div class="line"><strong> Credor(a) : {!! $investment->Company->name !!} </strong> </div>
							<div class="line"><strong> Endereço : </strong> {!! $investment->Company->Location->present()->addressFull !!}</div>
							<div class="line"><strong> CPNJ a sua ordem : </strong> {!! $investment->Company->present()->cnpjCompany !!} </div>
							<div class="line"><strong> Fone : </strong> {!! $investment->Company->present()->phoneCompany !!} </div>
						</div>
						<div class="content">
							<div class="line"><strong> Empreendimento : </strong> {!! $investment->Company->company_name !!} </div>
						</div>
						<div class="content">
							<div class="line"><strong></strong>
								Ao(s) {!! $investment->present()->moreThreesixone !!} Pagarei à {!! $investment->Client->name !!}; {!! $investment->Client->type == 'j' ? 'CNPJ' : 'CPF' !!}
								n° {!! $investment->Client->type == 'j' ? $investment->Client->Legal->present()->cnpjLegal : $investment->Client->Physical->present()->cpfPhysical !!}
								por está unica via de nota promissoria a quantia de <strong>{!! valorPorExtenso($investment->value) !!}</strong>, em moeda corrente deste pais, na praça
								do PARANÁ .
							</div>
						</div>
						<div class="content">
							<div class="line"><strong> Emitente : </strong>  </div>
							<div class="line"><strong> Nome : </strong> {!! $investment->Client->name !!} </div>
							<div class="line"><strong> Endereço : </strong> {!! $investment->Client->Location->present()->addressFull !!} </div>
							<div class="line"><strong> Fone : </strong> {!! $investment->Client->present()->phoneClient !!} </div>
						</div>
						<div id="content-finish">
							<div class="content-collun"><strong> Esta nota promissoria è sujeita a reajustes o seu vencimento de acordo com o indice pactuado em contrato. </strong></div>
							<div class="content-collun-two"><strong> Assinatura : </strong></div>
						</div>
					</div>

					Produto :
					<div id="footer">
						<div class="line">
							<div class="footer-collun"> Prod. <br> 1</div>
							<div class="footer-collun"> Descrição. <br> Casas Diversos</div>
							<div class="footer-collun"> n°. <br> 145</div>
							<div class="footer-collun"> Boleto. <br> {{-- }{!! $investment->Invoice()->first()->id !!} --}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>