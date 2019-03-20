<h1>Someday, this page will show book details</h1>

<!-- <p> Until then, enjoy this image </p> -->

<!-- <img src = "https://cdn.pixabay.com/photo/2014/06/21/08/43/rabbit-373691__340.jpg" /> -->
<br>
<h1>Information on Book: {{$res->title}}</h1>
<h2>Title: {{$res->title}}</h2>
<h2>ISBN: {{$res->isbn}}</h2>
<h2>Author's ID: {{$res->author_id}}</h2>
<h2>Publication Year: {{$res->publicationYear}}</h2a
<h2>Publisher: {{$res->publisher}}</h2>
<h2>Link to Cover Image: {{$res->localLinkToImage}}</h2>
<H2>Cover Image:</h2>
<img src = "{{$res->localLinkToImage}}"/>
