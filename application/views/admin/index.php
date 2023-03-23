<!DOCTYPE html>
<html lang="en" class="dashboard">

<head>
  <meta charset="UTF-8">
  <title>Simple Flat Admin Template</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>

      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic);
@import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css);
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

body {
  background: #f1f2f7;
  font-family: 'Open Sans', arial, sans-serif;
  color: darkslategray;
}

body.login {
  background-color: white;
  max-width: 500px;
  margin: 10vh auto;
  padding: 1em;
  height: auto;
}

/* general utility classes */
.warn {
  color: lightsalmon;
}

/* header */
header[role=banner] {
  background: white;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
}
header[role=banner] h1 {
  margin: 0;
  font-weight: 300;
  padding: 1rem;
}
header[role=banner] h1:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: .6em;
  color: turquoise;
}
header[role=banner] .utilities {
  width: 100%;
  background: slategray;
  color: #ddd;
}
header[role=banner] .utilities li {
  border-bottom: solid 1px rgba(255, 255, 255, 0.2);
}
header[role=banner] .utilities li a {
  padding: .7em;
  display: block;
}

/* header */
.utilities a:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: .6em;
}

.logout a:before {
  content: "";
}

.users a:before {
  content: "";
}

nav[role=navigation] {
  background: #2a3542;
  color: #ddd;
  /* icons */
}
nav[role=navigation] li {
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
nav[role=navigation] li a {
  color: #ddd;
  text-decoration: none;
  display: block;
  padding: .7em;
}
nav[role=navigation] li a:hover {
  background-color: rgba(255, 255, 255, 0.05);
}
nav[role=navigation] li a:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: .6em;
}
nav[role=navigation] .dashboard a:before {
  content: "";
}
nav[role=navigation] .write a:before {
  content: "";
}
nav[role=navigation] .edit a:before {
  content: "";
}
nav[role=navigation] .comments a:before {
  content: "";
}
nav[role=navigation] .users a:before {
  content: "";
}

/* current nav item */
.current, .dashboard .dashboard a, .write .write a, .edit .edit a, .comments .comments a, .users .users a {
  background-color: rgba(255, 255, 255, 0.1);
}

footer[role=contentinfo] {
  background: slategray;
  color: #ddd;
  font-size: .8em;
  text-align: center;
  padding: .2em;
}

/* panels */
.panel {
  background-color: white;
  color: darkslategray;
  -webkit-border-radius: .3rem;
  -moz-border-radius: .3rem;
  -ms-border-radius: .3rem;
  border-radius: .3rem;
  margin: 1%;
}
.panel > h2, .panel > ul {
  margin: 1rem;
}

/* typography */
a {
  text-decoration: none;
  color: inherit;
}

h2,
h3,
h4 {
  font-weight: 300;
  margin: 0;
}

h2 {
  color: #1eb6a7;
}

b {
  color: lightsalmon;
}

.hint {
  color: lightslategray;
}

/* lists */
ul, li {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

main li {
  position: relative;
  padding-left: 1.2em;
  margin: .5em  0;
}
main li:before {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  left: 0;
  top: .3em;
  border-left: solid 10px #dde;
  border-top: solid 5px transparent;
  border-bottom: solid 5px transparent;
}

/* forms */
form input, form textarea, form select {
  width: 100%;
  display: block;
  border: solid 1px #dde;
  padding: .5em;
}
form input:after, form textarea:after, form select:after {
  content: "";
  display: table;
  clear: both;
}
form input[type=checkbox], form input[type=radio] {
  display: inline;
  width: auto;
}
form label, form legend {
  display: block;
  margin: 1em 0 .5em;
}
form input[type=submit] {
  background: turquoise;
  border: none;
  border-bottom: solid 4px #21ccbb;
  padding: .7em 3em;
  margin: 1em 0;
  color: white;
  text-shadow: 0 -1px 0 #21ccbb;
  font-size: 1.1em;
  font-weight: bold;
  display: inline-block;
  width: auto;
  -webkit-border-radius: .5em;
  -moz-border-radius: .5em;
  -ms-border-radius: .5em;
  border-radius: .5em;
}
form input[type=submit]:hover {
  background: khaki;
  border: none;
  border-bottom: solid 4px #eadc5f;
  padding: .7em 3em;
  margin: 1em 0;
  color: white;
  text-shadow: 0 -1px 0 #eadc5f;
  font-size: 1.1em;
  font-weight: bold;
  display: inline-block;
  width: auto;
  -webkit-border-radius: .5em;
  -moz-border-radius: .5em;
  -ms-border-radius: .5em;
  border-radius: .5em;
}

/* feedback */
.error {
  background-color: #ffe9e0;
  border-color: #ffc4ad;
}

label.error {
  padding: .2em .5em;
}

.feedback {
  background: #fcfae6;
  color: #857a11;
  margin: 1em;
  padding: .5em .5em .5em 2em;
  border: solid 1px khaki;
}
.feedback:before {
  content: "";
  font-family: fontawesome;
  color: #e4d232;
  margin-left: -1.5em;
  margin-right: .5em;
}
.feedback li:before {
  border-left-color: #f6f0b9;
}
.feedback.error {
  background: #ffe9e0;
  color: #942a00;
  margin: 1em;
  padding: .5em .5em .5em 2em;
  border: solid 1px lightsalmon;
}
.feedback.error:before {
  content: "";
  font-family: fontawesome;
  color: #ff5714;
  margin-left: -1.5em;
  margin-right: .5em;
}
.feedback.error li:before {
  border-left-color: #ffc4ad;
}
.feedback.success {
  background: #98eee6;
  color: #08322e;
  margin: 1em;
  padding: .5em .5em .5em 2em;
  border: solid 1px turquoise;
}
.feedback.success:before {
  content: "";
  font-family: fontawesome;
  color: #1aa093;
  margin-left: -1.5em;
  margin-right: .5em;
}
.feedback.success li:before {
  border-left-color: #6ce7db;
}

/* tables */
table {
  border-collapse: collapse;
  width: 96%;
  margin: 2%;
}

th {
  text-align: left;
  font-weight: 400;
  font-size: 13px;
  text-transform: uppercase;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  padding: 0 10px;
  padding-bottom: 14px;
}

tr:not(:first-child):hover {
  background: rgba(0, 0, 0, 0.1);
}

td {
  line-height: 40px;
  font-weight: 300;
  padding: 0 10px;
}

@media screen and (min-width: 600px) {
  html, body {
    height: 100%;
  }

  header[role=banner] {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99;
    height: 75px;
  }
  header[role=banner] .utilities {
    position: absolute;
    top: 0;
    right: 0;
    background: transparent;
    color: darkslategray;
    width: auto;
  }
  header[role=banner] .utilities li {
    display: inline-block;
  }
  header[role=banner] .utilities li a {
    padding: .5em 1em;
  }

  nav[role=navigation] {
    position: fixed;
    width: 200px;
    top: 75px;
    bottom: 0px;
  }

  main[role=main] {
    margin: 75px 0 40px 200px;
  }
  main[role=main]:after {
    content: "";
    display: table;
    clear: both;
  }

  .panel {
    margin: 2% 0 0 2%;
    float: left;
    width: 96%;
  }
  .panel:after {
    content: "";
    display: table;
    clear: both;
  }

  .box, .onethird, .twothirds {
    padding: 1rem;
  }

  .onethird {
    width: 33.333%;
    float: left;
  }

  .twothirds {
    width: 66%;
    float: left;
  }

  footer[role=contentinfo] {
    clear: both;
    margin-left: 200px;
  }
}
@media screen and (min-width: 900px) {
  footer[role=contentinfo] {
    position: fixed;
    width: 100%;
    bottom: 0;
    left: 0px;
    margin: 0;
  }

  .panel {
    width: 47%;
    clear: none;
  }
  .panel.important {
    width: 96%;
  }
  .panel.secondary {
    width: 23%;
  }
}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <li class="users"><a href="#">My Account</a></li>
    <li class="logout warn"><a href="">Log Out</a></li>
  </ul>
</header>

<nav role="navigation">
  <ul class="main">
    <li class="dashboard"><a href="#">Dashboard</a></li>
    <li class="write"><a href="#">Write Post</a></li>
    <li class="edit"><a href="#">Edit Posts</a></li>
    <li class="comments"><a href="#">Comments</a></li>
    <li class="users"><a href="#">Manage Users</a></li>
  </ul>
</nav>

<main role="main">
  <section class="panel important">
    <h2>Welcome to Your Dashboard </h2>
    <ul>
      <li>Important panel that will always be really wide Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
      <li>Aliquam tincidunt mauris eu risus.</li>
      <li>Vestibulum auctor dapibus neque.</li>
    </ul>
  </section>
  <section class="panel">
    <h2>Posts</h2>
    <ul>
      <li><b>2458 </b>Published Posts</li>
      <li><b>18</b> Drafts.</li>
      <li>Most popular post: <b>This is a post title</b>.</li>
    </ul>
  </section>
  <section class="panel">
    <h2>Chart</h2>
    <ul>
      <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
      <li>Aliquam tincidunt mauris eu risus.</li>
      <li>Vestibulum auctor dapibus neque.</li>
    </ul>
  </section>
  <section class="panel important">
    <h2>Write a post</h2>
    <form action="#">
      <div class="twothirds">
        <label for="name">Text Input:</label>
        <input type="text" name="name" id="name" placeholder="John Smith" />

        <label for="textarea">Textarea:</label>
        <textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>

      </div>
      <div class="onethird">
        <legend>Radio Button Choice</legend>

        <label for="radio-choice-1">
          <input type="radio" name="radio-choice" id="radio-choice-1" value="choice-1" /> Choice 1
        </label>

        <label for="radio-choice-2">
          <input type="radio" name="radio-choice" id="radio-choice-2" value="choice-2" /> Choice 2
        </label>


        <label for="select-choice">Select Dropdown Choice:</label>
        <select name="select-choice" id="select-choice">
          <option value="Choice 1">Choice 1</option>
          <option value="Choice 2">Choice 2</option>
          <option value="Choice 3">Choice 3</option>
        </select>


        <div>
          <label for="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox" /> Checkbox
          </label>
        </div>

        <div>
          <input type="submit" value="Submit" />
        </div>
      </div>
    </form>
  </section>
  <section class="panel">
    <h2>feedback</h2>
    <div class="feedback">This is neutral feedback Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, praesentium. Libero perspiciatis quis aliquid iste quam dignissimos, accusamus temporibus ullam voluptatum, tempora pariatur, similique molestias blanditiis at sunt earum neque.</div>
    <div class="feedback error">This is warning feedback
<ul>
  <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
  <li>Aliquam tincidunt mauris eu risus.</li>
  <li>Vestibulum auctor dapibus neque.</li>
</ul>  </div>
    <div class="feedback success">This is positive feedback</div>

  </section>
  <section class="panel ">
    <h2>Table</h2>
    <table>
      <tr>
        <th>Username</th>
        <th>Posts</th>
        <th>comments</th>
        <th>date</th>
      </tr>
      <tr>
        <td>Pete</td>
        <td>4</td>
        <td>7</td>
        <td>Oct 10, 2015</td>

      </tr>
      <tr>
        <td>Mary</td>
        <td>5769</td>
        <td>2517</td>
        <td>Jan 1, 2014</td>
      </tr>
    </table>
  </section>

</main>
<footer role="contentinfo">Easy Admin Style by Melissa Cabral</footer>
  
  

    <script  src="<?= base_url('admin/js/index.js'); ?>"></script>




</body>

</html>
