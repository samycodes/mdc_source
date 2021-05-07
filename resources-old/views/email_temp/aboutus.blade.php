

<head>
  <title>About Us</title>
  <meta charset="UTF-8">
  <meta name="description" content="An example of a basic HTML5 web page layout.">
 <link rel="shortcut icon" href="{{URL::asset('public/favicon_io/icon.png') }}">
</head>

<style>
    body {
  font-family: Arial;
  margin: 0;
}

h1 {
  font-size: 50px;
  text-align: center;
}

h2 {
  text-align: center;
}

nav {
  margin: auto;
  width: 100%;
  max-width: 1000px;
}

ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  width: 100%;
}

li {
  float: left;
  margin: 0;
  padding: 0;
  height: 50px;
  line-height: 50px;
  background-color: black;
  width: 25%;
  text-align: center;
}

li a {
  text-decoration: none;
  color: white;
  font-size: 20px;
}

li a:hover {
  color: lightgray;
}

#hero {
  width: 100%;
  height: 300px;
  background-color: lightgray;
  text-align: center;
  clear: both;
}

#articles {
  max-width: 1000px;
  width: 100%;
  margin: auto;
}

footer {
  background-color: lightgray;
  padding: 20px;
  text-align: center;
}
</style>

<body>

  <header>
    <!-- website title -->
    <h1>About Us</h1>
    <!-- navigation -->
   
  </header>

  <!-- hero image -->
  <section id="hero" style="background-color: white;">
    <img src="http://128.199.31.19/mdc/public/favicon_io/android-chrome-512x512.png" style="
    height: 100%;
    width: 25%;
    background-color: #00466a;
"/>
  </section>

  <!-- articles -->
  <section id="articles" class="text-center" >

    <article>
      <h2>{{ $aboutus->title }}</h2><hr>
      <p class="contain">{{ $aboutus->description }}</p>
    </article>

   

  </section>

  <!-- footer -->
  

</body>