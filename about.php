<?php session_start(); ?>
<div class="flex flex-col h-screen">
<div><?php include "header.php"; ?></div>
<div class="flex flex-col flex-grow">
    <div class="flex flex-row w-[60%] justify-between self-center borderr-2">
        <div class="flex flex-col max-w-[50%]">
            <?php
                $school_data = mysqli_query($conn, "SELECT * FROM college");

                while($row = mysqli_fetch_array($school_data)){ ?>
                <span class="text-4xl text-center font-bolder mb-10"><?php echo $row["collegeName"]; ?></span>
                <div class="flex flex-col gap-5">
                    <div><span class="text-xl font-bold">Address: </span><span class="text-xl"><?php echo $row["collegeAddress"]; ?></span></div>
                    <div><span class="text-xl font-bold">Email: </span><span class="text-xl"><?php echo $row["collegeEmail"]; ?></span></div>
                    <div><span class="text-xl font-bold">Phone number: </span><span class="text-xl"><?php echo $row["collegePhoneNumber"]; ?></span></div>
                    <div><span class="text-xl font-bold">Principal: </span><span class="text-xl"> Mr. Xavier J. Goldenberg</span></div>
                    <hr />
                    <div>
                        <span class="text-3xl text-sky-800 font-bold mb-10 mt-14">Our Mission</span>
                        <div class="break-words">Culpa cillum nostrud sit do in in nulla occaecat qui magna adipisicing incididunt ut. Amet enim ipsum cillum laborum in. Officia quis proident do in proident. Ut non ipsum labore et velit magna consectetur duis in. Sit ullamco culpa quis Lorem id id dolore ad ad eiusmod tempor non. Veniam excepteur reprehenderit elit aliqua ut consequat cupidatat irure id culpa voluptate consectetur tempor. Aliquip labore elit anim qui.</div>
                    </div>
                    <div>
                        <span class="text-3xl text-sky-800 font-bold mb-10 mt-14">Our Vision and Values</span>
                        <div class="break-words">Et proident non excepteur in fugiat voluptate velit do cupidatat. Ullamco cupidatat magna eiusmod veniam mollit. Voluptate pariatur enim pariatur exercitation pariatur ipsum veniam laboris esse irure.</div>
                    </div>
                    <div>
                        <span class="text-3xl text-sky-800 font-bold mb-10 mt-14">Our Values</span>
                        <div class="break-words">Dolor nostrud magna mollit non amet. Irure nostrud adipisicing adipisicing nulla non amet amet eu incididunt sunt veniam. Cupidatat cillum proident minim veniam quis incididunt quis adipisicing Lorem. Commodo et id dolor consectetur sit incididunt nulla ex consequat amet elit pariatur. Commodo anim esse dolor sint amet laborum elit dolor. Ut amet et consequat et dolore proident sint ullamco voluptate elit ullamco. Fugiat elit enim sint aliqua.</div>
                    </div>
                </div>
                <?php };
            ?>
        </div>
        <div>
            <div class="text-4xl text-center font-bolder">Contact us</div>
                <form class="flex flex-col mt-10">
                    <label class="text-lg mb-3" for="name" >Name:</label>
                    <input class="h-10 rounded-lg text-lg px-2 mb-8" type="text" name="name" size="45"/>

                    <label class="text-lg mb-3" for="email" >Email:</label>
                    <input class="h-10 rounded-lg text-lg px-2 mb-8" type="email" name="email" size="45"/>

                    <label class="text-lg mb-3" for="subject" >Subject:</label>
                    <input class="h-10 rounded-lg text-lg px-2 mb-8" type="text" name="subject" size="45"/>

                    <label class="text-lg mb-3" for="message" >Message:</label>
                    <textarea class="rounded-lg text-lg px-2 mb-8" type="text" name="message" rows="10" cols="45"></textarea>

                    <input class="px-6 py-4 rounded-xl bg-gradient-to-tr from-sky-700 to-sky-900 text-sky-100 text-2xl cursor-pointer shadow-lg" type="submit" value="Send" />
                </form>
        </div>
    </div>
    
</div>
<div><?php @ require_once ("footer.php"); ?></div>
    
