<?php
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==true)
{
?>
	<html>
		<head>
			<title> Fryst - Classic - adminpanel </title>
			<link rel="stylesheet" type="text/css" href="../css/style.css" />
			<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
		</head>
		
		<body>

			<div id='glowny'>
			
				<div id='logo'> </div>
				
				<div id='menu'> 
					<ul>
						<li class='apwiadomosci link'> <a href='index.php?wiadomosci'>  </a> </li>
						<li class='apodwiedziny link'> <a href='index.php?odwiedziny'>  </a> </li>
						<li class='apkonkursy link'> <a href='index.php?konkurs'>  </a> </li>
						<li class='apkontakt link'> <a href='index.php?kontakt'> </a> </li>
						<li class='apuczestnicy link'> <a href='index.php?uczestnicy'> </a> </li>
						<li class='apwyloguj link'> <a href='index.php?wyloguj'> </a> </li>
					</ul>
				</div>
				
				<div id='srodekpanel'> 	
		<?php
					if(isset($_GET['wiadomosci']))
					{
						include('wiadomosci.php');
					}
					else if(isset($_GET['kontakt']))
					{
						include('kontakt.php');
					}
					else if(isset($_GET['odwiedziny']))
					{
						include('goscie.php');
					}
					else if(isset($_GET['konkurs']))
					{
						include('konkurs.php');
					}
					else if(isset($_GET['uczestnicy']))
					{
						include('uczestnicy.php');
					}
					else if(isset($_GET['wyloguj']))
					{
						include('wyloguj.php');
					}
					else 
					{
						echo 'Witam w panelu administracyjnym';
					}
		?>			<div class='czysc'></div>
				</div>
			</div>
			
		</body>
	</html>
<?php
}
else
{
	if(!isset($_POST['login']) && !isset($_POST['haslo']))
	{
?>	
		<form action='index.php' method='post'>
			<table align='center' style='margin-top: 200px; color: White; background: Red;'>
				<tr>
					<td> Login: </td>
					<td> <input type='text' name='login'> </td>
				</tr>
				<tr>
					<td> hasło: </td>
					<td> <input type='password' name='haslo'> </td>
				</tr>
				<tr>
					<td colspan='2' align='center'> <input type='submit' value='zaloguj'> </td>
				</tr>
			</table>
		</form>
<?php
	}
	else
	{
		if($_POST['login']=='hannibal' && $_POST['haslo']=='2013impala1960')
		{
			$_SESSION['login'] = 'admin';
			$_SESSION['zalogowany']=true;
			header("Refresh: 1; URL=./index.php");
		}
		else	
		{
			echo 'Logowanie nie powiodło się';
		}
	}
}

?>