<h2>Вхід на сайт</h2>
		%message_auth%
				<form name = "auth" action="function.php" method= "post">
					<table>
						<tr>
							<td>Логін</td>
							<td >
								<input type="text" name = "login">
							</td>
						</tr>
						<tr>
							<td>Пароль</td>
							<td>
								<input type="password" name = "password">
							</td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="submit" name="logIn" value="Увійти">
							</td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<a href="#">Зареєструватися</a>
							</td>
						</tr>
					</table>
				</form>