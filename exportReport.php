<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once 'db.php';
$users = $db -> query("select * from users");
$admins= $db -> query("select * from users where role='Admin'");
$students= $db -> query("select * from users where role='Student'");
$profs= $db -> query("select * from users where role='Professor'");

$excel = "
<table>
<tr>
<th>Total User Number:</th>
<td>".$users->num_rows."</td>
</tr>
<tr>
<th>Total Admin Number:</th>
<td>".$admins->num_rows."</td>
</tr>
<tr>
<th>Total Student Number:</th>
<td>".$students->num_rows."</td>
</tr>
<tr>
<th>Total Professor Number:</th>
<td>".$profs->num_rows."</td>
</tr>
<tr></tr>
</table>
";

$excel .="
		<table>
			<thead>
				<tr>
					<th>User E-mail</th>
					<th>User Name</th>
					<th>User Surname</th>
					<th>User Phone</th>
					<th>User University</th>
					<th>User Role</th>
				</tr>
			<tbody>
	";

while($row = $users->fetch_row()) {
    $u_mail = $row[0];
    $u_name = $row[1];
    $u_surname = $row[2];
    $u_phone = $row[3];
    $u_uni = $row[6];
    $role = $row[8];

    $excel .="
    <tr>
        <td>".$u_mail."</td>
        <td>".$u_name."</td>
        <td>".$u_surname."</td>
        <td>".$u_phone."</td>
        <td>".$u_uni."</td>
        <td>".$role."</td>
    </tr>";
}

$excel .="</tbody>
		</table>";

echo $excel;
?>