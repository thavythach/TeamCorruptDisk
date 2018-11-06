@extends('layouts.app')

@section('content')
  <main role="main">
        <div class="container">
          <p>Jake Redmond, Rachel Gilligan, Nick Bigger, Thavy Thach<br>
          Database Management<br>
          Professor Chiu<br>
          October 31, 2018<br>
          <center>Project Proposal: UpCrate</center><br>
            A dynamic file sharing web application built on the php-apache architecture.<br>
            <br>
            <br>
    
            <b>Intro:</b>
            Our client's requirements include being able to share files that are located on their local computer with other computers across the world. This includes the ability to securely share access to certain users and groups, or keep files private, while maintaining the files on our server. Our proposed solution uses a database to hold all of these files for each user and information relating to access and visibilty for certain users so that this goal can be achieved.
            <br>
            <br>
            <b>Use Cases</b>: As a user, I’d like to…<br></p>
          <ul>
            <li>...create an account, and have that information stored securely via encryption on the database.</li>
            <li>...update my password after account creation, have the updated password encryted, and any trace of the old password removed.</li>
            <li>...delete my account and any personal information associated with it at any time.</li>
            <li>...upload files to the server, and determine if they can be publically viewed or not.</li>
            <li>...download files I've previously uploaded, allowing me to aquire a copy of the data without modifying it in the database.</li>
            <li>...see the list of all files I have access to, organized by my files and files shared with me.</li>
            <li>...update, delete, or rename files that I have uploaded to the database previosuly.</li>
            <li>...specify other users as being able to see specific documents from my collection, and have the server remember that they have access.</li>
            <li>...be able to get a shareable link to download the document from the server, and have it sendable to others via standard communication methods such as email or social media.</li>
            <li>...have the ability to be a part of a 'group', which has access to a number of documents and all members of the group will have unrestricted access to these documents.</li>
            <li>...see a list of all publicly viewable documents and be able to access any given document from this list.</li>
          </ul>
          <br>
          <br>
          <b>Gantt Chart:</b>
          <center><img src="{{ asset('img/gantt.png')}}" width="1000px" height=500px></center>
          <br>
          <br>
          <b>Proposed Relational Database Schema:</b>
          <center><img src="{{ asset('img/UML.png')}}" width="1000px" height=800px></center>
          <br>
          <br>
        </div>
      </main>
    @endsection