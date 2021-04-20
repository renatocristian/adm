<?php
session_start();
include_once("config/conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id, nome, email, niveis_acesso_id, setor, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['setor'] = $row_usuario['setor'];
				$_SESSION['niveis_acesso_id'] = $row_usuario['niveis_acesso_id'];
			
				
				if($_SESSION['niveis_acesso_id'] == "0"){
					header("Location: tisaude/administrativo.php");
				}elseif($_SESSION['niveis_acesso_id'] == "1"){
					header("Location: adm/administrativo.php");
				}elseif($_SESSION['niveis_acesso_id'] == "2"){
					header("Location: user/alvorada/administrativo.php");
				}elseif($_SESSION['niveis_acesso_id'] == "3"){
					header("Location: user/analandia/administrativo.php");
				}elseif($_SESSION['niveis_acesso_id'] == "4"){
					header("Location: user/tereza/administrativo.php");
				}elseif($_SESSION['niveis_acesso_id'] == "5"){
					header("Location: user/gabriela/administrativo.php");				
			    }elseif($_SESSION['niveis_acesso_id'] == "6"){
				header("Location: user/brotinho/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "7"){
				header("Location: user/ouroverde/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "8"){
				header("Location: user/eunice/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "9"){
				header("Location: user/sagrado/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "10"){
				header("Location: user/fatima/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "11"){
				header("Location: user/valedosol/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "12"){
				header("Location: user/cta/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "13"){
				header("Location: user/crh/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "14"){
					header("Location: user/crm/administrativo.php");
			    }elseif($_SESSION['niveis_acesso_id'] == "15"){
					header("Location: user/amej/administrativo.php");
				}	
				
		    }else{
				$_SESSION['msg'] = "
				
				<div class=\"alert alert-danger\" role=\"alert\">
                   Login e senha incorrentos !
                  </div>
				
				
				";
				header("Location: index.php");
			}
		}
	}else{
		$_SESSION['msg'] = "
		
		
		
		        <div class=\"alert alert-danger\" role=\"alert\">
                   Login e senha incorrentos !
                  </div>
		
		
		
		
		";
		header("Location: index.php");
	}
}else{
	$_SESSION['msg'] = "
	
	  <div class=\"alert alert-danger\" role=\"alert\">
                   Página não encontrada !
                  </div>
		
	
	
	
	";
	header("Location: index.php");
}


?>



