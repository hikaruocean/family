<!-- Static navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="/">Chang</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li <?php echo $bag->req->uri == "" ? 'class="active"' : ''?>><a href="/">Home</a></li>
        <li <?php echo $bag->req->uri == "/wedding" ? 'class="active"' : ''?>><a href="/wedding" class="smoothscroll">Wedding</a></li>
        <li <?php echo $bag->req->uri == "/portrait" ? 'class="active"' : ''?>><a href="/portrait" class="smoothscroll">Portrait</a></li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
</div>
