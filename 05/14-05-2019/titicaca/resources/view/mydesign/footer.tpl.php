<footer>
	<div class="row">
		<div class="col-4">
			<button type="button" class="btn btn-primary btn-sm">
					Вы посетили сайт <span class="badge badge-light"><?=$_COOKIE['Count'];?></span>
					<a href="index.php?clearVisit=1"><span class="badge badge-light text-danger">X</span></a>
			</button>
		</div>
		<div class="col-4 align-item-center">
			<ul id="icoSocial">
				<a href="http://www.facebook.com"><li id="icoFB"></li></a>  
				<a href="http://www.facebook.com"><li id="icoIN"></li></a>
				<a href="http://www.facebook.com"><li id="icoTW"></li></a>
			</ul>
		</div>
		<div class="col-4 align-item-right">
		<?php
			echo $data["footerMenu"];
		?>
		© Gololobov Sergey IT STEP 2018
		</div>
	</div>
</footer>

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->

