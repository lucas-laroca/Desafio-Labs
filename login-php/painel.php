<!DOCTYPE html>
<html lang="pt-br">
<?php
include('verifica_login.php');
include_once('conexao.php');
?>
<script type="text/javascript" language="javascript">
 $(document) .ready(function() {
     $('#listar-colaborador') .DataTable({
         "processing" : true,
         "serverSide" : true,
         "ajax" : {
             "url" : "conexao.php",
             "type": "POST"
         }
     });
 } );
 </script>
<head>
	<meta charset="UTF-8">
	<title>Formulário de contato</title>
	<link rel="stylesheet" href="css/bulma.min.css">    
</head>
<body>
	<section class="section">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-half">
                    <h3><img src="MMLabs_dark (1).png" width="250px" height="250px" id="img"></h3>
					<h1 class="title has-text-centered">Agenda Colaboradores - MMLabs</h1>
                    <?php
                        if (isset($_SESSION['msg']))
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    ?>
					<form action="colaborador.php" method="POST">
						<div class="field">
							<label class="label">Nome</label>
							<div class="control">
								<input name="nome" class="input" type="text" placeholder="Seu nome" required name=nome/>                                
							</div>
						</div>
						<div class="field">
							<label class="label">Email *</label>
							<div class="control">
								<input name="email" class="input" type="email" placeholder="Seu email" required name=email/>
							</div>
						</div>
						<div class="field">
							<label class="label">Cargo</label>
							<div class="control">
								<div class="select is-fullwidth">
									<select name="cargo">
										<option>Desenvolvedor Junior</option>
										<option>Desenvolvedor Pleno</option>
										<option>Desenvolvedor Senior</option>
                                        <option>Analista de Dados</option>
                                        <option>Gerente de Projetos</option>
                                        <option>Supervisor de TI</option>
                                        <option>Gerente de TI</option>
                                        <option>Tester</option>
                                        <option>Estagiário</option>
									</select>
								</div>
							</div>
						</div>
						<div class="field">
							<label class="label">Telefone</label>
							<div class="control">
								<textarea name="telefone" class="input" placeholder="(00) 00000-0000" maxlength="15" required name=telefone></textarea>
							</div>
						</div>
						<div class="field is-grouped">
							<div class="control">
								<button class="button is-link is-medium">Salvar</button>
							</div>
					</form>
                    <div class="right-center">
								<button id="agenda" style="float: right;" class="button is-link is-medium" >Agenda</button>
							</div>
						</div>
                        <div class="right"> 
                        <h2><a href="logout.php">Sair</a></h2>
                        </div>
                    </div>
				</div>
			</div>
            <div></div>
            <table id="listar-colaborador" border="3"> 
        <tr> 
          <td>ID Colaborador</td>  
          <td>Nome</td> 
          <td>Email</td> 
          <td>Cargo</td> 
          <td>Telefone</td> 
        </tr> 
        <?php foreach($dados as $valores){ ?>
            <tr> 
                <td> <?php echo $valores[0]; ?></td>
                <td> <?php echo $valores[1]; ?></td>
                <td> <?php echo $valores[2]; ?></td>
                <td> <?php echo $valores[3]; ?></td>
                <td> <?php echo $valores[4]; ?></td>
            </tr>  
        <?php } ?>       
        </table>
        </div>
        </div>
        </table>
	</section>
</body>
</html>
