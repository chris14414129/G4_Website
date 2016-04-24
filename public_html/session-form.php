<?php 
	$sessions = new DatabaseTable($pdo, 'sessions', 'session_id');
	
	if (isset($_POST['submit'])) {
		
		 $sessions->save($_POST['ses']);
		 $ses = $_POST['ses'];
		 
	}
	
	if (isset($_POST['delSes'])) {
		
		$sessions->delete('session_id', $_POST['id']);
		
	}
?> 
<h3>Add a new Session or Edit an Existing Session Details<h3>
<h6>*Only select ID to Edit</h6>

	<form method="POST">
		
		<label>Session ID*</label>
		<input type="text" name="ses[session_id]" list="students"/>
		<datalist id="students" name="ses[session_id]"
		value="<?php if (isset($ses['session_id']))
			 echo $ses['session_id'] ?>"/>
			<?php sesID($pdo); ?>
		</datalist>
	
		<label>Code*</label>
		 <input type="text" name="ses[ses_code]"
		 value="<?php if (isset($ses['ses_code']))
		 echo $ses['ses_code'] ?>" />

		<label>Name*</label>
		 <input type="text" name="ses[ses_name]"
		 value="<?php if (isset($ses['ses_name']))
		 echo $ses['ses_name'] ?>" />
		
		<label>Module ID*</label>
		<select name="ses[mod_id]"
			 value="<?php if (isset($ses['mod_id']))
			 echo $ses['mod_id'] ?>"/>
			<option></option>
			<?php modID($pdo); ?>
		</select>
		
		<label>Tutor ID*</label>
		<select name="ses[tutor_id]"
			 value="<?php if (isset($ses['tutor_id']))
			 echo $ses['tutor_id'] ?>"/>
			<option></option>
			<?php tutID($pdo); ?>
		</select>
	 
		<label>Time*</label>
		<input type="text" name="ses[time]" placeholder="00:00:00"
		 value="<?php if (isset($ses['time']))
		 echo $ses['time'] ?>" />
	 
		<label>Day*</label>
		<input type="text" name="ses[day]"
		 value="<?php if (isset($ses['day']))
		 echo $ses['day'] ?>" />
	 
		<label>Duration*</label>
		<input type="text" name="ses[duration]"
		 value="<?php if (isset($ses['duration']))
		 echo $ses['duration'] ?>" />
	 
		<label>Room ID*</label>
		<select name="ses[room_id]"
			 value="<?php if (isset($ses['room_id']))
			 echo $ses['room_id'] ?>"/>
			<option></option>
			<?php roomID($pdo); ?>
		</select>
	 
		<input type="submit" name="submit"/>
		
	</form>
	
<!--Delete Session Form-->
	<h3>Select a Session to Delete</h3>

	<form method="POST">

		<select name="id">
			<option></option>
			<?php sesID($pdo); ?>
		</select>
		
		<input type="submit" name="delSes" value="Delete"/>
		
	</form>