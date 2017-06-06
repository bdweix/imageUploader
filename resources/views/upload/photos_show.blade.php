<html>
  <head>
    <style>
          div.gallery {
              margin: 5px;
              border: 1px solid #ccc;
              float: left;
              width: 180px;
          }

          div.gallery:hover {
              border: 1px solid #777;
          }

          div.gallery img {
              width: 100%;
              height: auto;
          }

          div.desc {
              padding: 15px;
              text-align: center;
          }
    </style>
  </head>
  <body>
    @foreach($urls as $url)
        <div class="gallery">
          <a target="_blank" href="{{$url->filename}}">
            <img src="{{$url->filename}}" alt="Fjords" width="300" height="200">
          </a>
          <div class="desc">{{$url->id}}</div>
        </div>
    @endforeach
  </body>
</html>
