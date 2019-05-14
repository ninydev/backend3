
<article class="siteArticle">
	<header><h1><?=(isset($data['pageTitle'])?$data['pageTitle']:'')?></h1></header>
	<div>
        <form action="<?=(isset($data['formAction'])? $data['formAction']:'');?>" method="get">
			<div class="form-group">
				<label for="InputName">Имя</label>
				<input type="text" name="userName" class="form-control" id="InputName" aria-describedby="emailHelp" placeholder="Enter name">
				<small id="emailHelp" class="form-text text-muted">Как мы можем к Вам обращаться</small>
			</div>
			<div class="form-group">
				<label for="InputEmail">Email address</label>
				<input type="email" name="userMail" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
			</div>
			<div class="form-group">
				<label for="InputPhone">Телефон</label>
				<input type="tel" name="userPhone" class="form-control" id="InputPhone" aria-describedby="emailHelp" placeholder="Enter phone">
				<small id="emailHelp" class="form-text text-muted">Нам обязательно нужна эта информация</small>
			</div>
			<div class="form-group">
				<label for="ControlTextarea">Ваше сообщение</label>
				<textarea class="form-control" name="userMsg" id="ControlTextarea" rows="3"></textarea>
			</div>

			<input type="submit" class="btn btn-primary" name=" Отправить ">
			

			<input type="hidden" name="controller" value="contactform">
			<input type="hidden" name="action" value="send">
		</form>
	</div>
</article>