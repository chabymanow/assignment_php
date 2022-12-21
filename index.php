<?php session_start(); ?> 
<div class="flex flex-col h-screen">
    <div><?php include "header.php"; ?></div>
  <div class="flex flex-row gap-5 w-[80%] self-center justify-center min-h-[80%] h-[80%] flex-grow items-center">
    <div class="flex flex-col w-[50%] mx-10">
        <span class="text-7xl mb-24 displayName -rotate-12">Csaba Jega-Szabo</span>
        <span class="text-5xl mb-10">Student ID: HE20889</span>
        <span class="text-3xl mb-10">BSc (Hon) Computing and BEng Software Engineering Foundation Year</span>
        <span class="text-xl mb-5">MODULE CODE: <span class="font-bold text-2xl">SWE4203</span> | MODULE TITLE:	<span class="font-bold text-2xl">Databases | Assignment 2</span></span>

        <div class="text-3xl leading-10">
            This web page was created to demonstrate the database defined in the assignment in action.
            The database running in the background is the basis of the assignment, the login and the entire data movement, storage and retrieval are based on it.
        </div>
    </div>
    <div class="w-[40%] h-[100%] items-center">
        <img class="w-full h-full self-center rounded-full" src="digital.jpg" />
    </div>

  </div>
  <?php @ require_once ("footer.php"); ?>
</div>