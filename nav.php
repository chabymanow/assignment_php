

<nav>
    <ul class="flex flex-row w-screen h-12 bg-sky-500 justify-around items-center my-5 text-2xl">
        <li>
            <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="index.php">Home</a>
        </li>
        <li>
            <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="courses.php">Courses</a>
        </li>
        <li>
            <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="students.php">Students</a>
        </li>
        <li>
            <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="#">Staff</a>
        </li>
        <li>
            <a class="font-bolder text-stone-900 hover:font-bold hover:text-stone-700" href="addStudent.php">Add new student</a>
        </li>
        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: home.php");
            exit;
        ?>
        <li>
            <a class="py-1 px-4 rounded-lg my-2 bg-gradient-to-tl from-red-500 to-red-700 text-stone-100" href="logout.php">Logout</a>
        </li>
    <?php } ?>
    </ul>
</nav>