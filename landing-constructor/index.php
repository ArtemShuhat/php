<!DOCTYPE html>
<html>


<head>
	<meta charset="UTF-8">
	<title>Landing-page constructor</title>
</head>

<body>
	<form enctype="multipart/form-data" action="controller/controller.php" method="post">
		<h2>Landing-page constructor</h2>
		<h3>Title сторінки*</h3>
		<input type="input" name="title" value="" placeholder="Уведіть title сторінки" class="design" required />
		<h3>Заголовок сторінки *</h3>
		<input type="input" name="header" value="" placeholder=" Уведіть заголовок сторінки " class="design" required />
		<h3>Текст сторінки*</h3>
		<textarea name="text" value="" placeholder=" Уведіть текст сторінки " class="design" required></textarea>
		<h3>Генерація</h3>
		<input type="submit" name="submitB" value="Сгенерувати Landing" class="design" id="ok" />
		<h3>Результат</h3>
		<a href='landing/index.html' class="design" target="_blank"> Переглянути результат у новому вікні </a>
	</form>
	<iframe width="800" height="400" src="landing/index.html"></iframe>
	<p>* поля, обов'язкові до заповнення </p>
</body>

</html>