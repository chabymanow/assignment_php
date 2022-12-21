<?php session_start(); ?> 
<div class="flex flex-col h-screen">
    <div><?php include "header.php"; ?></div>
    <div class="flex flex-col flex-grow">
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        include_once 'database.php';

        $staffMembers = mysqli_query($conn,
            "SELECT * FROM staff
            INNER JOIN staff_phone on staff.staffID = staff_phone.staffID
            -- GROUP BY staff.staffID
        ");

        ?>
        <h1 class="text-center text-3xl font-bold underline">Staff of the school</h1>
        <div class="flex justify-center">
<table class="m-5 text-stone-800 text-lg">
  
  <tr class="text-xl bg-sky-900 text-sky-100 p-12">
    <th>First name</th>
    <th>Last name</th>
    <th>Address</th>
    <th>Staff phone</th>
    <th>Staff email</th>
    <th>Position</th>
    <th>Title</th>
    <th>Admin rule</th>
    <th>Photo</th>
    <th></th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($staffMembers)) {
    $ID = $row["staffID"];
    $emails = mysqli_query($conn, "SELECT * FROM staff_emails WHERE staffID='$ID'");

?>
<tr>
  <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $row["staff_firstName"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $row["staff_lastName"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-48"><?php echo $row["staff_address"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-32"><?php echo $row["staff_phone"]; ?></td>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28">
        <?php
            while($email = mysqli_fetch_array($emails)) {
                echo $email["staff_email"] . "\n";
        } ?>
    </td>
    <?php
        if($row["is_admin"] == 1){
            $admin = mysqli_query($conn, "SELECT * FROM administrator WHERE staffID='$ID'");
            while($admin_data = mysqli_fetch_array($admin)) {
                $adminRole = $admin_data["admin_rule"];
                $roleRes = mysqli_query($conn, "SELECT * FROM roles WHERE roleID = '$adminRole'");
                $roleData = mysqli_fetch_array($roleRes);
                ?>
                <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $admin_data["department"]; ?></td>
                <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $admin_data["admin_position"]; ?></td>
                
                <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28 cursor-pointer hover-text">
                    <span class="tooltip-text" id="bottom"><?php echo $roleData["role_desc"]; ?></span>
                    <?php if($admin_data["admin_rule"] == 1){ echo "Reader"; } ?>
                    <?php if($admin_data["admin_rule"] == 2){ echo "Editor"; } ?>
                    <?php if($admin_data["admin_rule"] == 3){ echo "Root admin"; } ?>
                </td>
            <?php }
        }
    ?>
    <?php
        if($row["is_admin"] == 0){
            $admin = mysqli_query($conn, "SELECT * FROM academics WHERE staffID='$ID'");
            while($admin_data = mysqli_fetch_array($admin)) { ?>
                
                <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $admin_data["qualification"]; ?></td>
                <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28"><?php echo $admin_data["staff_title"]; ?></td>
                <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-28 cursor-pointer hover-text"><?php echo "Teacher" ?>
                    <span class="tooltip-text" id="bottom">Teacher: teach the given course.</span>
                </td>
            <?php }
        }
    ?>
    <td class="px-2 py-2 mr-2 border-b-2 border-sky-200 w-32">
        <img src="<?php echo $row["staff_photo"]?>" />
    </td>
</tr>
<?php
$i++;
}?>

</table>
<?php }else{ ?>
  <div>You are not logged in. You do not have right to see this page</div>
<?php } ?></div>
</div>
    <div><?php @ require_once ("footer.php"); ?></div>
    </div>
</div>