<section id="works"></section>
<div class="container">
  <div class="row centered mt mb">
    <div class="col-lg-8 col-lg-offset-2">
      <h4>Interstellar</h4>
      <p>“Love isn’t something we invented.
It’s observable, powerful, it has to mean something...
Love is the one thing we’re capable of perceiving that transcends dimensions of time and space.”<br />- Brand</p>
    </div>
    <div class="col-lg-10 col-lg-offset-1 mt">
      <?php
      foreach ($photoInfoAry as $info):
      ?>
      <a href="https://drive.google.com/thumbnail?id=<?=$info['id']?>&sz=w1200">
          <img class="img-responsive" src="https://drive.google.com/thumbnail?id=<?=$info['id']?>&sz=w1200">
      </a>
      <br>
      <?php
      endforeach;
      ?>
    </div>

  </div>
</div>
