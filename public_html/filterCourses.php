<div class="filter">
	<form method="POST">
		<table>
				<select name="courses">
					<option></option>
					<?php courses($pdo); ?>
				</select>
			<input type="submit" name="filter">
		</table>
	</form>
</div>