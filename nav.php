<div class="flex flex-row w-screen h-12 text-xl justify-center items-center bg-green-500">
    <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo "Welcomme " . $_SESSION["firstname"] . " " . $_SESSION["lastname"];
    }else{
        echo "You not logged in. If you want to check data, please LOGIN!";
    }?>
</div>
<nav>
    <ul class="flex flex-row w-screen h-12 bg-sky-500 justify-around items-center mb-10 text-2xl">
        <li>
            <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="index.php">Home</a>
        </li>
        <li>
            <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="courses.php">Courses</a>
        </li>
        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                if($_SESSION["adminPos"] != 4){ ?>
                <li>
                <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="students.php">Students</a>
                </li>
        <?php }else{ ?>
            <li>
                    <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="student.php?varname=<?php echo $_SESSION["id"]; ?>">My data</a>
                </li>
        <?php }} ?>
        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                if($_SESSION["adminPos"] != 4){ ?>
                <li>
                    <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="staff.php">Staff</a>
                </li>
        <?php }} ?>
        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                if($_SESSION["adminPos"] != 4){ ?>
                <li>
                    <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="sqlCode.php">SQL code</a>
                </li>
        <?php }} ?>

        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                if($_SESSION["adminPos"] == 3){ ?>
                <li>
                    <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="addStudent.php">Add new student</a>
                </li>
            <?php }} ?>
        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                ?>
        <li>
            <a class="py-1 px-4 rounded-lg my-2 bg-gradient-to-tl from-red-500 to-red-700 text-stone-100" href="logout.php">Logout</a>
        </li>
    <?php }else{
            ?>
            <li>
                <a class="py-2 px-4 text-2xl border-2 border-teal-400 bg-gradient-to-tl from-teal-500 to-teal-700 text-stone-100" href="student_login.php">Student Login</a>
                <a class="py-2 px-4 text-2xl border-2 border-teal-400 bg-gradient-to-tl from-teal-500 to-teal-700 text-stone-100" href="staff_login.php">Staff Login</a>
            </li>
        <?php } ?>
    </ul>
</nav>