<div id="empty"></div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<div id="footer" class="container">
<footer>
<?php
	switch($_COOKIE['Language'])
	{
		case 'pl':
			echo '2016 | science-formulas.com &copy; &nbsp; &nbsp; &nbsp; &nbsp;autor:&nbsp;Bartosz&nbsp;Salwiczek';
			break;
		default:
			echo '2016 | science-formulas.com &copy; &nbsp; &nbsp; &nbsp; &nbsp;author: Bartosz Salwiczek';
			break;
	}
?>
</footer>
</div>
