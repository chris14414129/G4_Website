<?php 
	$students = new DatabaseTable($pdo, 'students', 'student_id');
	
	if (isset($_POST['submit'])) {
		
		 $students->save($_POST['stud']);
		 $stud = $_POST['stud'];
		 
	}
	
	if (isset($_POST['delStud'])) {
		
		$students->delete('student_id', $_POST['id']);
		
	}
?> 
<h3>Add a new Student or Edit an Existing Student Details<h3>
<h6>*Only select ID to Edit</h6>

	<form method="POST">
		
		<label>Student ID*</label>
		<input type="text" name="stud[student_id]" list="students"/>
		<datalist id="students" name="stud[student_id]"
		value="<?php if (isset($stud['student_id']))
			 echo $stud['student_id'] ?>"/>
			<?php studID($pdo); ?>
		</datalist>
	
		<label>Firstname*</label>
		 <input type="text" name="stud[stud_fname]"
		 value="<?php if (isset($stud['stud_fname']))
		 echo $stud['stud_fname'] ?>" />

		<label>Surname*</label>
		 <input type="text" name="stud[stud_sname]"
		 value="<?php if (isset($stud['stud_sname']))
		 echo $stud['stud_sname'] ?>" />
		
		<label>Course*</label>
		<select name="stud[course]"
			 value="<?php if (isset($stud['course']))
			 echo $stud['course'] ?>"/>
			<option></option>
			<?php courses($pdo); ?>
		</select>
	 
		<label>Type*</label>
		<input type="text" name="stud[type]"
		 value="<?php if (isset($stud['type']))
		 echo $stud['type'] ?>" />
	 
		<label>Username*</label>
		<input type="text" name="stud[username]"
		 value="<?php if (isset($stud['username']))
		 echo $stud['username'] ?>" />
	 
		<label>Password*</label>
		<input type="password" name="stud[password]"
		 value="<?php if (isset($stud['password']))
		 echo $stud['password'] ?>" />
	 
		<input type="submit" name="submit"/>
		
	</form>
	
<!--Delete Student Form-->
	<h3>Select a Student to Delete</h3>

	<form method="POST">

		<select name="id">
			<option></option>
			<?php studID($pdo); ?>
		</select>
		
		<input type="submit" name="delStud" value="Delete"/>
		
	</form>